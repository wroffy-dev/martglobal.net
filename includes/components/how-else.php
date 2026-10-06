<?php
/**
 * Recurring "How Else Can We Help?" cross-discovery block.
 *
 * @var array  $services  service records to show (3–4)
 * @var string $text      supporting line
 * @var string|null $label eyebrow label
 * @var array|null  $aud_text homepage audience variants: [aud => [label, text]]
 */
$label ??= 'How Else Can We Help?';
?>
<section class="section how-else" id="how-else">
  <div class="container">
    <div class="section-head section-head-split reveal">
      <div>
        <p class="eyebrow"<?= !empty($aud_text) ? ' data-aud-only="default"' : '' ?>><?= e($label) ?></p>
        <?php foreach ($aud_text ?? [] as $aud => [$aud_label]): ?>
        <p class="eyebrow" data-aud-only="<?= e($aud) ?>"><?= e($aud_label) ?></p>
        <?php endforeach; ?>
        <h2>How Else Can We Help?</h2>
      </div>
      <p class="lead"<?= !empty($aud_text) ? ' data-aud-only="default"' : '' ?>><?= e($text) ?></p>
      <?php foreach ($aud_text ?? [] as $aud => [, $aud_lead]): ?>
      <p class="lead" data-aud-only="<?= e($aud) ?>"><?= e($aud_lead) ?></p>
      <?php endforeach; ?>
    </div>
    <div class="card-grid card-grid-<?= count(array_filter($services, fn($s) => ($s['aud_only'] ?? 'default') === 'default')) >= 4 ? '4' : '3' ?>">
      <?php foreach ($services as $s) component('service-card', ['service' => $s, 'aud_only' => $s['aud_only'] ?? null]); ?>
    </div>
  </div>
</section>
