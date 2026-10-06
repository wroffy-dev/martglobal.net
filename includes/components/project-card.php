<?php /** @var array $project */ ?>
<article class="project-card reveal" data-category="<?= e($project['category']) ?>">
  <div class="project-media" style="--img:url('<?= e($project['image']) ?>')">
    <span class="badge badge-<?= e($project['category']) ?>"><?= e(get_category($project['category'])['name']) ?></span>
  </div>
  <div class="project-body">
    <p class="project-meta"><?= icon('pin', 'icon icon-xs') ?> <?= e($project['location']) ?> · <?= e($project['client']) ?></p>
    <h3><?= e($project['name']) ?></h3>
    <p><?= e($project['description']) ?></p>
    <div class="project-foot">
      <span class="impact"><?= icon('check', 'icon icon-xs') ?> <?= e($project['impact']) ?></span>
      <a class="text-link" href="<?= e(url('#contact')) ?>" aria-label="Discuss a project like <?= e($project['name']) ?>">Discuss Similar Project <?= icon('arrow', 'icon icon-sm') ?></a>
    </div>
  </div>
</article>
