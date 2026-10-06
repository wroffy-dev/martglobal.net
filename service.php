<?php
/** Service detail page: /{category}/{slug} */
require_once __DIR__ . '/includes/functions.php';

$service = get_service($_GET['slug'] ?? '');
// Category in the URL must match the service's category (prevents duplicate URLs).
if (!$service || $service['category'] !== ($_GET['category'] ?? '')) {
    http_response_code(404);
    include __DIR__ . '/404.php';
    exit;
}

$cat       = get_category($service['category']);
$other_cat = get_category(other_category($service['category']));
$related   = get_services($service['related_services']);
$projects  = get_projects($service['related_projects']);
$siblings  = array_filter(get_services_by_category($service['category']), fn($s) => $s['slug'] !== $service['slug']);

$page_title       = $service['seo_title'];
$page_description = $service['seo_description'];
$page_image       = $service['hero_image'];
$page_path        = $service['category'] . '/' . $service['slug'];
$current_nav      = $service['category'];
include __DIR__ . '/includes/header.php';

$cross_text = $service['category'] === 'corporate'
    ? 'Our work often connects corporate strategy with large-scale social implementation.'
    : 'Our social impact work is strengthened by our research, strategy and business innovation capabilities.';
?>

<section class="page-hero page-hero-service" style="--img:url('<?= e($service['hero_image']) ?>')">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb">
      <a href="<?= e(url()) ?>">Home</a><span>/</span>
      <a href="<?= e(url($cat['slug'])) ?>"><?= e($cat['title']) ?></a><span>/</span>
      <span><?= e($service['name']) ?></span>
    </nav>
    <span class="badge badge-<?= e($cat['slug']) ?>"><?= e(strtoupper($cat['name'])) ?></span>
    <h1><?= e($service['name']) ?></h1>
    <p class="page-hero-text"><?= e($service['intro']) ?></p>
    <div class="hero-actions">
      <a class="btn btn-yellow" href="#enquiry">Discuss Your Requirement <?= icon('arrow', 'icon icon-sm') ?></a>
      <a class="btn btn-ghost" href="#how-else">See related <?= e(strtolower($other_cat['title'])) ?></a>
    </div>
  </div>
</section>

<!-- In-page pills keep the other pillar one tap away -->
<div class="service-subnav">
  <div class="container subnav-inner">
    <a href="#what-we-do">What We Do</a>
    <a href="#approach">Our Approach</a>
    <a href="#impact-areas">Impact</a>
    <a href="#related-projects">Projects</a>
    <a href="#how-else" class="subnav-cross"><span class="dot dot-<?= e($other_cat['slug']) ?>"></span><?= e($other_cat['title']) ?></a>
  </div>
</div>

<!-- WHAT WE DO -->
<section class="section" id="what-we-do">
  <div class="container two-col">
    <div class="reveal">
      <p class="eyebrow">What We Do</p>
      <h2><?= e($service['short_description']) ?></h2>
      <?php foreach ($service['full_description'] as $para): ?>
      <p><?= e($para) ?></p>
      <?php endforeach; ?>
    </div>
    <aside class="offer-card reveal">
      <h3>Key offerings</h3>
      <ul class="check-list">
        <?php foreach ($service['offerings'] as $o): ?>
        <li><?= icon('check', 'icon icon-sm') ?><?= e($o) ?></li>
        <?php endforeach; ?>
      </ul>
      <div class="offer-also">
        <small>Also in <?= e($cat['title']) ?></small>
        <?php foreach ($siblings as $s): ?>
        <a href="<?= e(service_url($s)) ?>"><?= e($s['name']) ?></a>
        <?php endforeach; ?>
      </div>
    </aside>
  </div>
</section>

<!-- APPROACH -->
<section class="section section-light" id="approach">
  <div class="container">
    <div class="section-head reveal">
      <p class="eyebrow">Our Approach</p>
      <h2><?= e(implode(' → ', array_column($service['approach'], 0))) ?></h2>
    </div>
    <ol class="steps steps-<?= count($service['approach']) ?>">
      <?php foreach ($service['approach'] as $i => [$title, $text]): ?>
      <li class="step reveal">
        <span class="step-num"><?= str_pad((string) ($i + 1), 2, '0', STR_PAD_LEFT) ?></span>
        <h3><?= e($title) ?></h3>
        <p><?= e($text) ?></p>
      </li>
      <?php endforeach; ?>
    </ol>
  </div>
</section>

<!-- WHERE WE CREATE IMPACT -->
<section class="section" id="impact-areas">
  <div class="container">
    <div class="section-head reveal">
      <p class="eyebrow">Where We Create Impact</p>
      <h2>Sectors we serve</h2>
    </div>
    <ul class="sector-grid reveal">
      <?php foreach ($service['sectors'] as $sec): ?>
      <li><?= icon('spark', 'icon icon-sm') ?><?= e($sec) ?></li>
      <?php endforeach; ?>
    </ul>
  </div>
</section>

<!-- RELATED PROJECTS -->
<?php if ($projects): ?>
<section class="section section-light" id="related-projects">
  <div class="container">
    <div class="section-head reveal">
      <p class="eyebrow">Relevant Projects</p>
      <h2>Where we have done this before</h2>
    </div>
    <div class="card-grid card-grid-3">
      <?php foreach ($projects as $p) component('project-card', ['project' => $p]); ?>
    </div>
  </div>
</section>
<?php endif; ?>

<!-- HOW ELSE CAN WE HELP (cross-category) -->
<?php component('how-else', [
    'label'    => 'Explore ' . $other_cat['title'],
    'text'     => $cross_text,
    'services' => $related,
]); ?>

<!-- FOCUS AREAS -->
<section class="section section-tight section-light">
  <div class="container">
    <div class="focus-strip reveal">
      <div>
        <p class="eyebrow">Explore Our Focus Areas</p>
        <h3>Where <?= e($service['name']) ?> creates impact</h3>
      </div>
      <ul class="chip-list">
        <?php foreach (get_focus_areas($service['focus_areas']) as $fa): ?>
        <li><a class="chip" href="<?= e(url('#focus-' . $fa['slug'])) ?>"><?= icon($fa['icon'], 'icon icon-sm') ?><?= e($fa['name']) ?></a></li>
        <?php endforeach; ?>
      </ul>
    </div>
  </div>
</section>

<!-- ENQUIRY -->
<section class="section" id="enquiry">
  <div class="container contact-wrap">
    <div class="contact-info reveal">
      <p class="eyebrow">Let's Talk</p>
      <h2>Let's Talk About Your Next Initiative</h2>
      <p class="lead">Tell us what you're trying to solve. We'll help you find the right capability.</p>
    </div>
    <div class="contact-card reveal">
      <?php component('contact-form', ['preselect' => $service['category'], 'context' => $service['name']]); ?>
    </div>
  </div>
</section>

<!-- BOTTOM CTA -->
<section class="section cta-band">
  <div class="container cta-inner reveal">
    <div>
      <h2>Have a project in mind?</h2>
      <p>Let's explore how MART Global can help.</p>
    </div>
    <div class="cta-actions">
      <a class="btn btn-yellow" href="#enquiry">Discuss Your Requirement <?= icon('arrow', 'icon icon-sm') ?></a>
      <a class="btn btn-ghost" href="#how-else">Explore Other Solutions</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
