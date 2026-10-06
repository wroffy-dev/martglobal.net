<?php
/**
 * @var array $service  @var bool $with_image
 * @var string|null $aud_only  homepage audience mode this card is limited to (default|corporate|social)
 */
$with_image ??= true;
$aud_only   ??= null;
?>
<a class="service-card reveal" href="<?= e(service_url($service)) ?>"<?= $aud_only ? ' data-aud-only="' . e($aud_only) . '"' : '' ?>>
  <?php if ($with_image): ?>
  <span class="service-card-media" style="--img:url('<?= e($service['hero_image']) ?>')"></span>
  <?php endif; ?>
  <span class="service-card-body">
    <span class="service-card-top">
      <span class="service-card-icon"><?= icon($service['icon']) ?></span>
    </span>
    <strong class="service-card-title"><?= e($service['name']) ?></strong>
    <span class="service-card-text"><?= e($service['short_description']) ?></span>
    <span class="text-link">Explore <?= icon('arrow', 'icon icon-sm') ?></span>
  </span>
</a>
