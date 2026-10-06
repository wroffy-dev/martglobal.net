<?php
/**
 * Page header. Set these before including (all optional):
 *   $page_title, $page_description, $page_image, $page_path, $current_nav, $body_class
 */
$page_title       ??= SITE['legal_name'] . ' | Leaders in Demystifying Rural Markets';
$page_description ??= SITE['description'];
$page_image       ??= $CATEGORIES['social']['hero_image'];
$page_path        ??= '';
$current_nav      ??= 'home';
$body_class       ??= '';
$canonical          = absolute_url($page_path);

$nav_link = static function (string $key, string $href, string $label) use ($current_nav): string {
    $active = $current_nav === $key ? ' is-active' : '';
    return '<a class="nav-link' . $active . '" href="' . e($href) . '">' . e($label) . '</a>';
};
?><!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<script>document.documentElement.classList.add('js')</script>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?= e($page_title) ?></title>
<meta name="description" content="<?= e($page_description) ?>">
<link rel="canonical" href="<?= e($canonical) ?>">
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= e(SITE['name']) ?>">
<meta property="og:title" content="<?= e($page_title) ?>">
<meta property="og:description" content="<?= e($page_description) ?>">
<meta property="og:image" content="<?= e($page_image) ?>">
<meta property="og:url" content="<?= e($canonical) ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="theme-color" content="#063563">
<link rel="icon" href="<?= e(asset('images/favicon.png')) ?>" type="image/png">
<link rel="apple-touch-icon" href="<?= e(asset('images/apple-touch-icon.png')) ?>">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="<?= e(asset('css/style.css')) ?>">
</head>
<body class="<?= e($body_class) ?>">
<a class="skip-link" href="#main">Skip to content</a>

<header class="site-header" id="siteHeader">
  <div class="container header-inner">
    <a class="brand" href="<?= e(url()) ?>" aria-label="<?= e(SITE['name']) ?> home">
      <?php include __DIR__ . '/logo.php'; ?>
    </a>

    <nav class="main-nav" aria-label="Main">
      <ul class="nav-list">
        <li><?= $nav_link('about', url('#about'), 'About') ?></li>
        <?php foreach (['corporate', 'social'] as $nav_cat): $nav_c = get_category($nav_cat); ?>
        <li class="has-mega" data-mega>
          <button class="nav-link mega-toggle<?= $current_nav === $nav_cat ? ' is-active' : '' ?>" aria-expanded="false" aria-controls="mega-<?= $nav_cat ?>">
            <?= e($nav_c['title']) ?> <?= icon('chevron', 'icon icon-xs') ?>
          </button>
          <?php component('mega-menu', ['category' => $nav_cat]); ?>
        </li>
        <?php endforeach; ?>
        <li><?= $nav_link('focus', url('#focus-areas'), 'Focus Areas') ?></li>
        <li><?= $nav_link('projects', url('#projects'), 'Projects') ?></li>
        <li><a class="nav-link" href="<?= e(SITE['knowledge_center_url']) ?>">Knowledge Center</a></li>
        <li><?= $nav_link('contact', url('#contact'), 'Contact') ?></li>
      </ul>
    </nav>

    <a class="btn btn-yellow btn-sm header-cta" href="<?= e(url('#contact')) ?>">Let's Talk <?= icon('arrow', 'icon icon-sm') ?></a>

    <button class="menu-toggle" id="menuToggle" aria-label="Open menu" aria-expanded="false" aria-controls="mobileNav">
      <?= icon('menu') ?>
    </button>
  </div>
</header>

<!-- Mobile navigation -->
<div class="mobile-nav" id="mobileNav" aria-hidden="true">
  <div class="mobile-nav-head">
    <a class="brand" href="<?= e(url()) ?>"><?php include __DIR__ . '/logo.php'; ?></a>
    <button class="menu-close" id="menuClose" aria-label="Close menu"><?= icon('close') ?></button>
  </div>
  <nav class="mobile-nav-body" aria-label="Mobile">
    <a class="m-link" href="<?= e(url()) ?>">Home</a>
    <?php foreach (['corporate', 'social'] as $nav_cat): $nav_c = get_category($nav_cat); ?>
    <div class="m-group">
      <button class="m-link m-toggle" aria-expanded="false">
        <span><?= e($nav_c['title']) ?></span><?= icon('chevron', 'icon icon-sm') ?>
      </button>
      <div class="m-sub"><div class="m-sub-inner">
        <a href="<?= e(url($nav_cat)) ?>" class="m-sub-all">All <?= e($nav_c['title']) ?></a>
        <?php foreach (get_services_by_category($nav_cat) as $nav_s): ?>
        <a href="<?= e(service_url($nav_s)) ?>"><?= e($nav_s['name']) ?></a>
        <?php endforeach; ?>
      </div></div>
    </div>
    <?php endforeach; ?>
    <a class="m-link" href="<?= e(url('#focus-areas')) ?>">Focus Areas</a>
    <a class="m-link" href="<?= e(url('#projects')) ?>">Projects</a>
    <a class="m-link" href="<?= e(SITE['knowledge_center_url']) ?>">Knowledge Center</a>
    <a class="m-link" href="<?= e(url('#about')) ?>">About</a>
    <a class="m-link" href="<?= e(url('#contact')) ?>">Contact</a>
  </nav>
  <div class="mobile-nav-foot">
    <a class="btn btn-yellow btn-block" href="<?= e(url('#contact')) ?>">Let's Talk <?= icon('arrow', 'icon icon-sm') ?></a>
    <a class="m-contact" href="tel:<?= e(preg_replace('/\s+/', '', SITE['phone'])) ?>"><?= icon('phone', 'icon icon-sm') ?> <?= e(SITE['phone']) ?></a>
  </div>
</div>
<div class="nav-backdrop" id="navBackdrop"></div>

<main id="main">
