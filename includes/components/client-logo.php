<?php
/**
 * Sample client logo: generated wordmark (mark + name).
 * Swap for <img> once approved logo files are available.
 * @var array $client [name, mark, colour]
 */
[$cl_name, $cl_mark, $cl_color] = $client;
?>
<div class="client-logo" style="--brand:<?= e($cl_color) ?>" title="<?= e($cl_name) ?>">
  <span class="client-mark"><?= e($cl_mark) ?></span>
  <span class="client-name"><?= e($cl_name) ?></span>
</div>
