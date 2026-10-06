<?php
require_once __DIR__ . '/../config/config.php';
require_once __DIR__ . '/../data/content.php';
require_once __DIR__ . '/../data/clients.php';

/** HTML-escape. */
function e(?string $s): string
{
    return htmlspecialchars((string) $s, ENT_QUOTES, 'UTF-8');
}

/** Build a site URL that respects BASE_URL. */
function url(string $path = ''): string
{
    return BASE_URL . '/' . ltrim($path, '/');
}

function asset(string $path): string
{
    return url('assets/' . ltrim($path, '/'));
}

/** Asset URL with a file-modified version so browsers reload CSS/JS after every change. */
function asset_v(string $path): string
{
    $file = __DIR__ . '/../assets/' . ltrim($path, '/');
    return asset($path) . (is_file($file) ? '?v=' . filemtime($file) : '');
}

/** Absolute URL for canonical / Open Graph tags. */
function absolute_url(string $path = ''): string
{
    $scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
    $host   = $_SERVER['HTTP_HOST'] ?? 'martglobal.net';
    return $scheme . '://' . $host . url($path);
}

/* ------------------------------------------------------------------ data access
   These helpers are the only place templates read content from. Swap their
   bodies for PDO queries when the MySQL CMS is introduced. */

function get_category(string $slug): ?array
{
    global $CATEGORIES;
    return $CATEGORIES[$slug] ?? null;
}

function get_service(string $slug): ?array
{
    global $SERVICES;
    if (!isset($SERVICES[$slug])) {
        return null;
    }
    return ['slug' => $slug] + $SERVICES[$slug];
}

/** All services in a category, ordered by display_order. */
function get_services_by_category(string $category): array
{
    global $SERVICES;
    $list = [];
    foreach ($SERVICES as $slug => $s) {
        if ($s['category'] === $category) {
            $list[] = ['slug' => $slug] + $s;
        }
    }
    usort($list, fn($a, $b) => $a['display_order'] <=> $b['display_order']);
    return $list;
}

/** Resolve a list of service slugs into service records. */
function get_services(array $slugs): array
{
    return array_values(array_filter(array_map('get_service', $slugs)));
}

function get_project(string $slug): ?array
{
    global $PROJECTS;
    return isset($PROJECTS[$slug]) ? ['slug' => $slug] + $PROJECTS[$slug] : null;
}

function get_projects(?array $slugs = null): array
{
    global $PROJECTS;
    $slugs ??= array_keys($PROJECTS);
    return array_values(array_filter(array_map('get_project', $slugs)));
}

function get_focus_area(string $slug): ?array
{
    global $FOCUS_AREAS;
    return isset($FOCUS_AREAS[$slug]) ? ['slug' => $slug] + $FOCUS_AREAS[$slug] : null;
}

function get_focus_areas(?array $slugs = null): array
{
    global $FOCUS_AREAS;
    $slugs ??= array_keys($FOCUS_AREAS);
    return array_values(array_filter(array_map('get_focus_area', $slugs)));
}

/** Focus area services split into ['corporate' => [...], 'social' => [...]]. */
function focus_area_services(array $area): array
{
    $split = ['corporate' => [], 'social' => []];
    foreach (get_services($area['services']) as $s) {
        $split[$s['category']][] = $s;
    }
    return $split;
}

function service_url(array $service): string
{
    return url($service['category'] . '/' . $service['slug']);
}

function other_category(string $category): string
{
    return $category === 'corporate' ? 'social' : 'corporate';
}

/** Render a component from includes/components with local variables. */
function component(string $name, array $vars = []): void
{
    extract($vars, EXTR_SKIP);
    include __DIR__ . '/components/' . $name . '.php';
}

/** Inline SVG icon set (stroke icons, 24px grid). */
function icon(string $name, string $class = 'icon'): string
{
    $paths = [
        'search'    => '<circle cx="11" cy="11" r="7"/><path d="m20 20-3.5-3.5"/>',
        'bulb'      => '<path d="M9 18h6M10 21h4"/><path d="M12 3a6 6 0 0 0-3.6 10.8c.6.5 1 1.2 1.1 2V16h5v-.2c.1-.8.5-1.5 1.1-2A6 6 0 0 0 12 3z"/>',
        'target'    => '<circle cx="12" cy="12" r="9"/><circle cx="12" cy="12" r="5"/><circle cx="12" cy="12" r="1"/>',
        'compass'   => '<circle cx="12" cy="12" r="9"/><path d="m15.5 8.5-2 5-5 2 2-5z"/>',
        'layers'    => '<path d="m12 3 9 5-9 5-9-5z"/><path d="m3 13 9 5 9-5"/>',
        'clipboard' => '<rect x="5" y="4" width="14" height="17" rx="2"/><path d="M9 4V3h6v1M9 11h6M9 15h4"/>',
        'heart'     => '<path d="M12 20s-7-4.4-7-10a4 4 0 0 1 7-2.6A4 4 0 0 1 19 10c0 5.6-7 10-7 10z"/>',
        'link'      => '<path d="M10 14a4 4 0 0 0 5.7 0l3-3a4 4 0 0 0-5.7-5.7l-1 1"/><path d="M14 10a4 4 0 0 0-5.7 0l-3 3a4 4 0 0 0 5.7 5.7l1-1"/>',
        'leaf'      => '<path d="M5 19c8 0 14-6 14-14-8 0-14 4-14 12z"/><path d="M5 19 13 11"/>',
        'store'     => '<path d="M4 9h16l-1-4H5z"/><path d="M5 9v10h14V9M10 19v-5h4v5"/>',
        'users'     => '<circle cx="9" cy="8" r="3.5"/><path d="M3 20c0-3.3 2.7-6 6-6s6 2.7 6 6"/><path d="M16 4.5a3.5 3.5 0 0 1 0 7M18 14c2 .7 3 2.8 3 6"/>',
        'spark'     => '<path d="M12 3v4M12 17v4M3 12h4M17 12h4M6 6l2.5 2.5M15.5 15.5 18 18M6 18l2.5-2.5M15.5 8.5 18 6"/>',
        'home'      => '<path d="m3 11 9-7 9 7"/><path d="M5 10v10h14V10"/>',
        'arrow'     => '<path d="M5 12h14M13 6l6 6-6 6"/>',
        'chevron'   => '<path d="m6 9 6 6 6-6"/>',
        'phone'     => '<path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a2 2 0 0 1-2 2A16 16 0 0 1 3 6a2 2 0 0 1 2-2"/>',
        'mail'      => '<rect x="3" y="5" width="18" height="14" rx="2"/><path d="m3 7 9 6 9-6"/>',
        'pin'       => '<path d="M12 21s-7-6.2-7-12a7 7 0 0 1 14 0c0 5.8-7 12-7 12z"/><circle cx="12" cy="9" r="2.5"/>',
        'quote'     => '<path d="M7 7h4v4c0 3-1.5 5-4 6M15 7h4v4c0 3-1.5 5-4 6"/>',
        'check'     => '<path d="m5 12 5 5 9-10"/>',
        'close'     => '<path d="M6 6l12 12M18 6 6 18"/>',
        'menu'      => '<path d="M4 7h16M4 12h16M4 17h16"/>',
        'linkedin'  => '<rect x="3" y="3" width="18" height="18" rx="3"/><path d="M8 10v7M8 7v.01M12 17v-4a2 2 0 0 1 4 0v4M12 10v7"/>',
        'facebook'  => '<path d="M14 8h3V4h-3a4 4 0 0 0-4 4v3H7v4h3v6h4v-6h3l1-4h-4V8z"/>',
        'twitter'   => '<path d="M4 4l16 16M20 4 4 20"/>',
        'youtube'   => '<rect x="3" y="6" width="18" height="12" rx="3"/><path d="m10 9 5 3-5 3z"/>',
        'left'      => '<path d="m15 6-6 6 6 6"/>',
        'right'     => '<path d="m9 6 6 6-6 6"/>',
    ];
    $p = $paths[$name] ?? $paths['spark'];
    return '<svg class="' . e($class) . '" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.7" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">' . $p . '</svg>';
}
