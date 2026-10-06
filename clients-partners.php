<?php
/**
 * /clients-partners
 * Partners grouped by sector, shown as filterable sector cards.
 */
require_once __DIR__ . '/includes/functions.php';

$sectors = $CLIENT_SECTORS;
$total   = array_sum(array_map(fn($s) => count($s['clients']), $sectors));

$page_title       = 'Clients & Partners | ' . SITE['name'];
$page_description = 'Businesses, governments, donors and development institutions that have partnered with MART Global across ' . count($sectors) . ' sectors.';
$page_image       = $CATEGORIES['corporate']['hero_image'];
$page_path        = 'clients-partners';
$current_nav      = 'clients';
$body_class       = 'page-clients';
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

<!-- Sector cards with filter -->
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
