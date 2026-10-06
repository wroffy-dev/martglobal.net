<?php
/** /corporate and /social landing pages. */
require_once __DIR__ . '/includes/functions.php';

$cat_slug = $_GET['category'] ?? '';
$cat      = get_category($cat_slug);
if (!$cat) {
    http_response_code(404);
    include __DIR__ . '/404.php';
    exit;
}
$other    = get_category(other_category($cat_slug));
$services = get_services_by_category($cat_slug);

$page_title       = $cat['title'] . ' | ' . SITE['name'];
$page_description = $cat['intro'];
$page_image       = $cat['hero_image'];
$page_path        = $cat_slug;
$current_nav      = $cat_slug;
include __DIR__ . '/includes/header.php';
?>

<section class="page-hero" style="--img:url('<?= e($cat['hero_image']) ?>')">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb"><a href="<?= e(url()) ?>">Home</a><span>/</span><span><?= e($cat['title']) ?></span></nav>
    <span class="badge badge-<?= e($cat_slug) ?>"><?= e(strtoupper($cat['name'])) ?></span>
    <h1><?= e($cat['title']) ?></h1>
    <p class="page-hero-text"><?= e($cat['intro']) ?></p>
  </div>
</section>

<section class="section">
  <div class="container">
    <div class="section-head reveal">
      <p class="eyebrow">Our <?= e($cat['name']) ?> Capabilities</p>
      <h2><?= e($cat['tagline']) ?></h2>
    </div>
    <div class="card-grid card-grid-2">
      <?php foreach ($services as $s) component('service-card', ['service' => $s]); ?>
    </div>
  </div>
</section>

<section class="section section-tight">
  <div class="container">
    <a class="cross-banner reveal" href="<?= e(url($other['slug'])) ?>">
      <span>
        <span class="badge badge-<?= e($other['slug']) ?>"><?= e(strtoupper($other['name'])) ?></span>
        <strong><?= e($cat['cross_title']) ?></strong>
        <small><?= e($cat['cross_text']) ?></small>
      </span>
      <span class="btn btn-yellow">Explore <?= e($other['title']) ?> <?= icon('arrow', 'icon icon-sm') ?></span>
    </a>
  </div>
</section>

<?php component('focus-areas', ['heading' => 'Where Corporate and Social Meet']); ?>

<section class="section cta-band">
  <div class="container cta-inner reveal">
    <div>
      <h2>Have a project in mind?</h2>
      <p>Let's explore how MART Global can help.</p>
    </div>
    <div class="cta-actions">
      <a class="btn btn-yellow" href="<?= e(url('#contact')) ?>">Discuss Your Requirement <?= icon('arrow', 'icon icon-sm') ?></a>
      <a class="btn btn-ghost" href="<?= e(url($other['slug'])) ?>">Explore Other Solutions</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
