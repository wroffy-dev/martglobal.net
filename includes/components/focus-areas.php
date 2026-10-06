<?php
/**
 * "Where We Create Impact" — focus-area cards. Selecting a card reveals the
 * Corporate + Social capabilities linked to it (focus_areas <-> services).
 *
 * @var string|null $heading
 * @var string|null $subheading
 */
$heading    ??= 'Where We Create Impact';
$subheading ??= 'Many challenges sit between business and community. Our focus areas bring Corporate and Social capabilities together around the outcomes that matter.';
$areas = get_focus_areas();
?>
<section class="section section-light" id="focus-areas">
  <div class="container">
    <div class="section-head reveal">
      <p class="eyebrow">Focus Areas</p>
      <h2><?= e($heading) ?></h2>
      <p class="lead"><?= e($subheading) ?></p>
    </div>

    <div class="focus-grid" role="tablist" aria-label="Focus areas">
      <?php foreach ($areas as $i => $a): ?>
      <button class="focus-card reveal" role="tab" id="tab-<?= e($a['slug']) ?>" data-focus="<?= e($a['slug']) ?>"
              aria-selected="<?= $i === 0 ? 'true' : 'false' ?>" aria-controls="focus-panel"
              style="--img:url('<?= e($a['image']) ?>')">
        <span class="focus-card-icon"><?= icon($a['icon']) ?></span>
        <strong><?= e($a['name']) ?></strong>
        <small><?= e($a['description']) ?></small>
      </button>
      <?php endforeach; ?>
    </div>

    <div class="focus-panel reveal" id="focus-panel" role="tabpanel" aria-live="polite">
      <?php foreach ($areas as $i => $a): $split = focus_area_services($a); ?>
      <div class="focus-panel-item" data-focus-panel="<?= e($a['slug']) ?>"<?= $i === 0 ? '' : ' hidden' ?>>
        <div class="focus-panel-head">
          <h3><?= e($a['name']) ?></h3>
          <p>How MART Global helps across both capability pillars.</p>
        </div>
        <div class="focus-panel-cols">
          <?php foreach (['corporate', 'social'] as $cat): ?>
          <div class="focus-col">
            <p class="eyebrow"><span class="dot dot-<?= $cat ?>"></span><?= e(get_category($cat)['name']) ?> Capabilities</p>
            <ul>
              <?php foreach ($split[$cat] as $s): ?>
              <li><a href="<?= e(service_url($s)) ?>"><?= icon($s['icon'], 'icon icon-sm') ?><span><?= e($s['name']) ?></span><?= icon('arrow', 'icon icon-sm arrow') ?></a></li>
              <?php endforeach; ?>
            </ul>
          </div>
          <?php endforeach; ?>
        </div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>
