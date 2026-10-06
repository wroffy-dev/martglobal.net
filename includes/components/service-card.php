<?php
/** @var array $service  @var bool $with_image */
$with_image ??= true;
?>
<a class="service-card reveal" href="<?= e(service_url($service)) ?>">
  <?php if ($with_image): ?>
  <span class="service-card-media" style="--img:url('<?= e($service['hero_image']) ?>')"></span>
  <?php endif; ?>
  <span class="service-card-body">
    <span class="service-card-top">
      <span class="badge badge-<?= e($service['category']) ?>"><?= e(get_category($service['category'])['name']) ?></span>
      <span class="service-card-icon"><?= icon($service['icon']) ?></span>
    </span>
    <strong class="service-card-title"><?= e($service['name']) ?></strong>
    <span class="service-card-text"><?= e($service['short_description']) ?></span>
    <span class="text-link">Explore <?= icon('arrow', 'icon icon-sm') ?></span>
  </span>
</a>
