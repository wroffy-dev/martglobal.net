<?php
/** @var array $t */
$initials = implode('', array_map(fn($w) => mb_substr($w, 0, 1), array_slice(explode(' ', $t['organization']), 0, 2)));
?>
<figure class="testimonial">
  <span class="testimonial-quote-icon"><?= icon('quote') ?></span>
  <blockquote><?= e($t['quote']) ?></blockquote>
  <figcaption>
    <span class="avatar" aria-hidden="true"><?= e(strtoupper($initials)) ?></span>
    <span>
      <strong><?= e($t['name']) ?></strong>
      <small><?= e($t['designation']) ?>, <?= e($t['organization']) ?></small>
    </span>
  </figcaption>
</figure>
