<?php
/**
 * Recurring "How Else Can We Help?" cross-discovery block.
 *
 * @var array  $services  service records to show (3–4)
 * @var string $text      supporting line
 * @var string|null $label eyebrow label
 */
$label ??= 'How Else Can We Help?';
?>
<section class="section how-else" id="how-else">
  <div class="container">
    <div class="section-head section-head-split reveal">
      <div>
        <p class="eyebrow"><?= e($label) ?></p>
        <h2>How Else Can We Help?</h2>
      </div>
      <p class="lead"><?= e($text) ?></p>
    </div>
    <div class="card-grid card-grid-<?= count($services) >= 4 ? '4' : '3' ?>">
      <?php foreach ($services as $s) component('service-card', ['service' => $s]); ?>
    </div>
  </div>
</section>
