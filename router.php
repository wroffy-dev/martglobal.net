<?php
/**
 * Router for PHP's built-in server (local preview only):
 *   php -S localhost:8000 router.php
 * Mirrors the rewrite rules in .htaccess.
 */
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

if (preg_match('#^/(config|data|includes)(/|$)#', $path)) {
    http_response_code(403);
    exit('Forbidden');
}
if ($path !== '/' && is_file(__DIR__ . $path)) {
    return false; // static asset
}

$_SERVER['SCRIPT_NAME'] = '/index.php'; // keeps BASE_URL at the root

if ($path === '/' || $path === '/index.php') {
    require __DIR__ . '/index.php';
} elseif (preg_match('#^/clients-partners/?$#', $path)) {
    require __DIR__ . '/clients-partners.php';
} elseif (preg_match('#^/(corporate|social)/?$#', $path, $m)) {
    $_GET['category'] = $m[1];
    require __DIR__ . '/category.php';
} elseif (preg_match('#^/(corporate|social)/([a-z0-9-]+)/?$#', $path, $m)) {
    $_GET['category'] = $m[1];
    $_GET['slug'] = $m[2];
    require __DIR__ . '/service.php';
} else {
    require __DIR__ . '/404.php';
}
