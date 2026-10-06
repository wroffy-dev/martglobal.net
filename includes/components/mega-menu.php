<?php
/** @var string $category */
$cat   = get_category($category);
$other = get_category(other_category($category));
?>
<div class="mega" id="mega-<?= e($category) ?>" role="region" aria-label="<?= e($cat['title']) ?>">
  <div class="container mega-inner">
    <div class="mega-main">
      <p class="eyebrow"><?= e($cat['title']) ?></p>
      <div class="mega-services">
        <?php foreach (get_services_by_category($category) as $s): ?>
        <a class="mega-item" href="<?= e(service_url($s)) ?>">
          <span class="mega-icon"><?= icon($s['icon']) ?></span>
          <span>
            <strong><?= e($s['name']) ?></strong>
            <small><?= e($s['short_description']) ?></small>
          </span>
        </a>
        <?php endforeach; ?>
      </div>
      <a class="text-link" href="<?= e(url($category)) ?>">View all <?= e(strtolower($cat['title'])) ?> <?= icon('arrow', 'icon icon-sm') ?></a>
    </div>

    <div class="mega-side">
      <p class="eyebrow">Explore more</p>
      <ul class="mega-links">
        <li><a href="<?= e(url('#focus-areas')) ?>">Focus Areas</a></li>
        <li><a href="<?= e(url('#projects')) ?>">Landmark Projects</a></li>
        <li><a href="<?= e(url('#how-else')) ?>">How Else Can We Help?</a></li>
      </ul>
      <a class="mega-cross" href="<?= e(url($other['slug'])) ?>">
        <span class="badge badge-<?= e($other['slug']) ?>"><?= e($other['name']) ?></span>
        <strong><?= e($cat['cross_title']) ?></strong>
        <small><?= e($cat['cross_text']) ?></small>
        <span class="text-link">Explore <?= e($other['title']) ?> <?= icon('arrow', 'icon icon-sm') ?></span>
      </a>
    </div>
  </div>
</div>
