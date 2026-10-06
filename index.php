<?php
require_once __DIR__ . '/includes/functions.php';

$current_nav = 'home';
$body_class  = 'page-home';
include __DIR__ . '/includes/header.php';
?>

<!-- HERO -->
<section class="hero" style="--img:url('<?= e($CATEGORIES['social']['hero_image']) ?>')">
  <div class="container hero-inner">
    <div class="hero-content">
      <p class="eyebrow eyebrow-light"><span class="line"></span>MART Global Management Solutions</p>
      <h1>Leaders in Demystifying <span class="hl">Rural Markets</span> Since 1993</h1>
      <p class="hero-text" data-aud-only="default">For three decades we have helped businesses, governments and development institutions understand rural and emerging markets — and turn that understanding into strategy, innovation and impact at scale.</p>
      <p class="hero-text" data-aud-only="corporate">For three decades we have helped businesses understand rural and emerging markets — and turn that understanding into research-led strategy, new business models and on-ground activation.</p>
      <p class="hero-text" data-aud-only="social">For three decades we have helped governments, donors and foundations design and deliver programmes that improve livelihoods and create measurable impact at scale.</p>
      <div class="hero-actions">
        <a class="btn btn-yellow" href="#projects" data-aud-only="default">Explore Our Work <?= icon('arrow', 'icon icon-sm') ?></a>
        <a class="btn btn-yellow" href="#how-we-help" data-aud-only="corporate">Explore Corporate Solutions <?= icon('arrow', 'icon icon-sm') ?></a>
        <a class="btn btn-yellow" href="#how-we-help" data-aud-only="social">Explore Social Solutions <?= icon('arrow', 'icon icon-sm') ?></a>
        <a class="btn btn-ghost" href="#contact">Talk to Us</a>
      </div>
      <p class="aud-switch" data-aud-only="corporate">Showing content for businesses · <button type="button" data-aud-change>Change</button></p>
      <p class="aud-switch" data-aud-only="social">Showing content for development organisations · <button type="button" data-aud-change>Change</button></p>
    </div>
    <ul class="hero-proof">
      <li><strong>30+</strong><span>Years in rural markets</span></li>
      <li><strong>250+</strong><span>Clients served</span></li>
      <li><strong>1M+</strong><span>Lives impacted</span></li>
    </ul>
  </div>
  <a class="hero-scroll" href="#how-we-help" aria-label="Scroll to content"><span></span></a>
</section>

<!-- HOW WE CAN HELP -->
<section class="section" id="how-we-help">
  <div class="container">
    <div class="section-head center reveal">
      <p class="eyebrow">How We Can Help</p>
      <h2>One partner across the entire value chain</h2>
      <p class="lead" data-aud-only="default">From strategy and business innovation to large-scale social impact and implementation, MART Global brings together expertise across the entire value chain.</p>
      <p class="lead" data-aud-only="corporate">Research, strategy, business innovation and activation — built for companies growing in rural and emerging markets.</p>
      <p class="lead" data-aud-only="social">Large-scale implementation, programme advisory, CSR and market linkages — built for lasting social impact.</p>
    </div>

    <div class="pillars">
      <?php foreach (['corporate', 'social'] as $cat): $c = get_category($cat); ?>
      <article class="pillar pillar-<?= $cat ?> reveal" data-aud="<?= $cat ?>">
        <div class="pillar-media" style="--img:url('<?= e($c['hero_image']) ?>')"></div>
        <div class="pillar-body">
          <span class="badge badge-<?= $cat ?>"><?= e(strtoupper($c['name'])) ?></span>
          <h3><?= e($c['tagline']) ?></h3>
          <ul class="pillar-list">
            <?php foreach (get_services_by_category($cat) as $s): ?>
            <li><a href="<?= e(service_url($s)) ?>"><span class="pillar-icon"><?= icon($s['icon'], 'icon icon-sm') ?></span><?= e($s['name']) ?><?= icon('arrow', 'icon icon-sm arrow') ?></a></li>
            <?php endforeach; ?>
          </ul>
          <a class="btn btn-<?= $cat === 'corporate' ? 'navy' : 'yellow' ?>" href="<?= e(url($cat)) ?>">Explore <?= e($c['title']) ?> <?= icon('arrow', 'icon icon-sm') ?></a>
        </div>
      </article>
      <?php endforeach; ?>
      <div class="pillar-bridge" aria-hidden="true" data-aud-only="default"><span>+</span></div>
    </div>
    <p class="pillars-note reveal" data-aud-only="default">Most of our engagements draw on both. <a href="#focus-areas">See how they connect in our focus areas →</a></p>
  </div>
</section>

<!-- FOCUS AREAS -->
<?php component('focus-areas'); ?>

<!-- LANDMARK PROJECTS -->
<section class="section" id="projects">
  <div class="container">
    <div class="section-head section-head-split reveal">
      <div>
        <p class="eyebrow">Landmark Projects</p>
        <h2>Work that changed how markets reach people</h2>
      </div>
      <div class="filter" role="group" aria-label="Filter projects" data-aud-only="default">
        <button class="filter-btn is-active" data-filter="all" aria-pressed="true">All</button>
        <button class="filter-btn" data-filter="corporate" aria-pressed="false">Corporate</button>
        <button class="filter-btn" data-filter="social" aria-pressed="false">Social</button>
      </div>
    </div>
    <div class="card-grid card-grid-3 project-grid">
      <?php foreach (get_projects() as $p) component('project-card', ['project' => $p]); ?>
    </div>
  </div>
</section>

<!-- ABOUT -->
<section class="section section-light" id="about">
  <div class="container about">
    <div class="about-media reveal">
      <div class="about-img" style="--img:url('<?= e(get_focus_area('community-development')['image']) ?>')"></div>
      <div class="about-badge">
        <strong>Since 1993</strong>
        <span>Business Mind, Social Heart</span>
      </div>
    </div>
    <div class="about-content reveal">
      <p class="eyebrow">About MART Global</p>
      <h2>Strategy Meets Impact</h2>
      <p class="lead">Founded by Pradeep Kashyap — widely regarded as the father of rural marketing in India — MART began in 1993 when rural markets were still a black box.</p>
      <p>Today MART Global is a knowledge-based organisation with a global footprint. Our mission is to enable people in emerging markets to improve their quality of life by delivering innovative, high-value, end-to-end solutions through our partners.</p>
      <ul class="about-ecosystem">
        <?php foreach (['Markets', 'Businesses', 'Communities', 'Institutions', 'Government', 'Development Ecosystem'] as $x): ?>
        <li><?= icon('check', 'icon icon-sm') ?><?= e($x) ?></li>
        <?php endforeach; ?>
      </ul>
      <a class="btn btn-navy" href="#contact">Discover MART Global <?= icon('arrow', 'icon icon-sm') ?></a>
    </div>
  </div>
</section>

<!-- IMPACT NUMBERS -->
<section class="stats" id="impact">
  <div class="container">
    <div class="stats-head reveal">
      <p class="eyebrow eyebrow-light">Our Impact</p>
      <h2>Demystifying Rural India Since 1993</h2>
    </div>
    <div class="stats-grid">
      <?php foreach ($STATS as $s): ?>
      <div class="stat reveal">
        <strong><span data-count="<?= (int) $s['value'] ?>">0</span><?= e($s['suffix']) ?></strong>
        <span><?= e($s['label']) ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- HOW ELSE CAN WE HELP -->
<?php component('how-else', [
    'label'    => 'Across Business & Communities',
    'text'     => "MART Global's work often sits at the intersection of business, communities and markets.",
    'aud_text' => [
        'corporate' => ['Corporate Solutions', 'Everything we offer to help businesses succeed in rural and emerging markets.'],
        'social'    => ['Social Solutions', 'Everything we offer to help programmes deliver lasting social impact.'],
    ],
    // Default mix, plus one set per audience for the personalised homepage
    'services' => array_merge(
        array_map(fn($s) => $s + ['aud_only' => 'default'], get_services(['research-and-strategy', 'large-scale-program-implementation', 'business-model-innovation', 'csr-solutions'])),
        array_map(fn($s) => $s + ['aud_only' => 'corporate'], get_services_by_category('corporate')),
        array_map(fn($s) => $s + ['aud_only' => 'social'], get_services_by_category('social'))
    ),
]); ?>

<!-- TESTIMONIALS -->
<section class="section section-light" id="testimonials">
  <div class="container">
    <div class="section-head section-head-split reveal">
      <div>
        <p class="eyebrow">Testimonials</p>
        <h2>What our partners say</h2>
      </div>
      <div class="slider-controls">
        <button class="slider-btn" data-slide="prev" aria-label="Previous testimonial"><?= icon('left') ?></button>
        <button class="slider-btn" data-slide="next" aria-label="Next testimonial"><?= icon('right') ?></button>
      </div>
    </div>
    <div class="slider" data-slider>
      <div class="slider-track">
        <?php foreach ($TESTIMONIALS as $t) component('testimonial-card', ['t' => $t]); ?>
      </div>
    </div>
    <div class="slider-dots" data-dots></div>
  </div>
</section>

<!-- CLIENTS -->
<section class="section clients">
  <div class="container">
    <p class="clients-title reveal">Trusted by global institutions, governments and leading companies</p>
    <ul class="logo-grid reveal">
      <?php foreach ($CLIENTS as [$client_name, $client_aud]): ?>
      <li data-aud="<?= e($client_aud) ?>"><span><?= e($client_name) ?></span></li>
      <?php endforeach; ?>
    </ul>
    <p class="clients-more reveal"><a class="text-link" href="<?= e(url('clients-partners')) ?>">View all clients &amp; partners by sector <?= icon('arrow', 'icon icon-sm') ?></a></p>
  </div>
</section>

<!-- CONTACT -->
<section class="section contact-section" id="contact">
  <div class="container contact-wrap">
    <div class="contact-info reveal">
      <p class="eyebrow">Let's Talk</p>
      <h2>Let's talk about your next initiative</h2>
      <p class="lead">Tell us what you're trying to solve. We'll help you find the right capability.</p>
      <ul class="contact-list">
        <li><?= icon('phone') ?><div><small>Call</small><a href="tel:<?= e(preg_replace('/\s+/', '', SITE['phone'])) ?>"><?= e(SITE['phone']) ?></a></div></li>
        <li><?= icon('mail') ?><div><small>Email</small><a href="mailto:<?= e(SITE['email']) ?>"><?= e(SITE['email']) ?></a></div></li>
        <li><?= icon('pin') ?><div><small>Corporate Office</small><span><?= e(SITE['address']) ?></span></div></li>
      </ul>
    </div>
    <div class="contact-card reveal">
      <?php component('contact-form'); ?>
    </div>
  </div>
</section>

<?php component('audience-modal'); ?>

<?php include __DIR__ . '/includes/footer.php'; ?>
