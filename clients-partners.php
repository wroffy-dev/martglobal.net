<?php
/**
 * /clients-partners
 * Three presentation options for client review — ?layout=a|b|c (default a).
 * Remove the unused layouts once one is approved.
 */
require_once __DIR__ . '/includes/functions.php';

$layout  = in_array($_GET['layout'] ?? '', ['a', 'b', 'c'], true) ? $_GET['layout'] : 'a';
$sectors = $CLIENT_SECTORS;
$total   = array_sum(array_map(fn($s) => count($s['clients']), $sectors));

$page_title       = 'Clients & Partners | ' . SITE['name'];
$page_description = 'Businesses, governments, donors and development institutions that have partnered with MART Global across ' . count($sectors) . ' sectors.';
$page_image       = $CATEGORIES['corporate']['hero_image'];
$page_path        = 'clients-partners';
$current_nav      = 'clients';
$body_class       = 'page-clients layout-' . $layout;
include __DIR__ . '/includes/header.php';
?>

<section class="page-hero" style="--img:url('<?= e($CATEGORIES['social']['hero_image']) ?>')">
  <div class="container">
    <nav class="breadcrumb" aria-label="Breadcrumb"><a href="<?= e(url()) ?>">Home</a><span>/</span><span>Clients &amp; Partners</span></nav>
    <p class="eyebrow eyebrow-light"><span class="line"></span>Clients &amp; Partners</p>
    <h1>Trusted across business, government and development</h1>
    <p class="page-hero-text">For over three decades, leading companies, multilateral agencies, foundations and governments have partnered with MART Global to understand and transform rural and emerging markets.</p>
    <ul class="hero-proof">
      <li><strong><?= count($sectors) ?></strong><span>Sectors served</span></li>
      <li><strong><?= $total ?>+</strong><span>Partners featured</span></li>
      <li><strong>30+</strong><span>Years of partnerships</span></li>
    </ul>
  </div>
</section>

<?php if ($layout === 'a'): ?>
<!-- =============== OPTION A — Sector explorer (tabs) =============== -->
<section class="section">
  <div class="container">
    <div class="section-head reveal">
      <p class="eyebrow">Our Partners by Sector</p>
      <h2>Explore who we work with</h2>
    </div>
    <div class="cp-explorer">
      <div class="cp-tabs" role="tablist" aria-label="Sectors">
        <?php $i = 0; foreach ($sectors as $slug => $s): ?>
        <button class="cp-tab" role="tab" id="cpt-<?= e($slug) ?>" aria-controls="cpp-<?= e($slug) ?>" aria-selected="<?= $i++ === 0 ? 'true' : 'false' ?>" data-cp-tab="<?= e($slug) ?>">
          <span class="cp-tab-icon"><?= icon($s['icon'], 'icon icon-sm') ?></span>
          <span class="cp-tab-name"><?= e($s['name']) ?></span>
          <span class="cp-tab-count"><?= count($s['clients']) ?></span>
        </button>
        <?php endforeach; ?>
      </div>
      <div class="cp-panels">
        <?php $i = 0; foreach ($sectors as $slug => $s): ?>
        <div class="cp-panel" role="tabpanel" id="cpp-<?= e($slug) ?>" aria-labelledby="cpt-<?= e($slug) ?>" data-cp-panel="<?= e($slug) ?>"<?= $i++ === 0 ? '' : ' hidden' ?>>
          <div class="cp-panel-head">
            <span class="cp-panel-icon"><?= icon($s['icon']) ?></span>
            <div>
              <h3><?= e($s['name']) ?></h3>
              <p><?= e($s['description']) ?></p>
            </div>
          </div>
          <div class="cp-logo-grid">
            <?php foreach ($s['clients'] as $c) component('client-logo', ['client' => $c]); ?>
          </div>
        </div>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>

<?php elseif ($layout === 'b'): ?>
<!-- =============== OPTION B — Sector cards with filter =============== -->
<section class="section section-light">
  <div class="container">
    <div class="section-head reveal">
      <p class="eyebrow">Our Partners by Sector</p>
      <h2>Partnerships across <?= count($sectors) ?> sectors</h2>
    </div>
    <div class="cp-filter reveal" role="group" aria-label="Filter sectors">
      <button class="cp-chip is-active" data-cp-filter="all" aria-pressed="true">All sectors</button>
      <?php foreach ($sectors as $slug => $s): ?>
      <button class="cp-chip" data-cp-filter="<?= e($slug) ?>" aria-pressed="false"><?= e($s['name']) ?></button>
      <?php endforeach; ?>
    </div>
    <div class="cp-cards">
      <?php foreach ($sectors as $slug => $s): ?>
      <article class="cp-card reveal" data-cp-sector="<?= e($slug) ?>">
        <header class="cp-card-head">
          <span class="cp-card-icon"><?= icon($s['icon']) ?></span>
          <div>
            <h3><?= e($s['name']) ?></h3>
            <small><?= count($s['clients']) ?> partners</small>
          </div>
        </header>
        <p class="cp-card-text"><?= e($s['description']) ?></p>
        <div class="cp-card-logos">
          <?php foreach ($s['clients'] as $c) component('client-logo', ['client' => $c]); ?>
        </div>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php else: ?>
<!-- =============== OPTION C — Editorial sector rows =============== -->
<div class="cp-jump">
  <div class="container cp-jump-inner">
    <?php foreach ($sectors as $slug => $s): ?>
    <a href="#sector-<?= e($slug) ?>"><?= e($s['name']) ?></a>
    <?php endforeach; ?>
  </div>
</div>
<section class="section cp-rows-section">
  <div class="container">
    <?php $n = 0; foreach ($sectors as $slug => $s): $n++; ?>
    <article class="cp-row reveal" id="sector-<?= e($slug) ?>">
      <div class="cp-row-intro">
        <span class="cp-row-num"><?= str_pad((string) $n, 2, '0', STR_PAD_LEFT) ?></span>
        <h3><?= e($s['name']) ?></h3>
        <p><?= e($s['description']) ?></p>
      </div>
      <div class="cp-row-logos">
        <?php foreach ($s['clients'] as $c) component('client-logo', ['client' => $c]); ?>
      </div>
    </article>
    <?php endforeach; ?>
  </div>
</section>
<?php endif; ?>

<section class="section cta-band">
  <div class="container cta-inner reveal">
    <div>
      <h2>Let's build the next partnership</h2>
      <p>Join the organisations that trust MART Global to reach and serve rural markets.</p>
    </div>
    <div class="cta-actions">
      <a class="btn btn-yellow" href="<?= e(url('#contact')) ?>">Become a Partner <?= icon('arrow', 'icon icon-sm') ?></a>
      <a class="btn btn-ghost" href="<?= e(url('#how-we-help')) ?>">Explore Our Solutions</a>
    </div>
  </div>
</section>

<?php include __DIR__ . '/includes/footer.php'; ?>
