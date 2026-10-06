<?php
/**
 * Compact enquiry form.
 * Demo build: submission is validated and acknowledged client-side only.
 * In the CMS build this posts to /contact/submit.php and is stored in `enquiries`.
 *
 * @var string|null $preselect  corporate|social|focus|partnership|other
 * @var string|null $context    e.g. the service name the visitor is viewing
 */
$preselect ??= '';
$context   ??= '';
$options = ['corporate' => 'Corporate Solutions', 'social' => 'Social Solutions', 'focus' => 'Focus Areas', 'partnership' => 'Partnership', 'other' => 'Other'];
$fid = 'f' . substr(md5($context . $preselect), 0, 6);
?>
<form class="enquiry-form" data-demo-form novalidate>
  <?php if ($context): ?><input type="hidden" name="context" value="<?= e($context) ?>"><?php endif; ?>
  <div class="form-grid">
    <div class="field">
      <label for="<?= $fid ?>-name">Name <span>*</span></label>
      <input id="<?= $fid ?>-name" name="name" type="text" autocomplete="name" required>
    </div>
    <div class="field">
      <label for="<?= $fid ?>-org">Organization</label>
      <input id="<?= $fid ?>-org" name="organization" type="text" autocomplete="organization">
    </div>
    <div class="field">
      <label for="<?= $fid ?>-email">Email <span>*</span></label>
      <input id="<?= $fid ?>-email" name="email" type="email" autocomplete="email" required>
    </div>
    <div class="field">
      <label for="<?= $fid ?>-phone">Phone</label>
      <input id="<?= $fid ?>-phone" name="phone" type="tel" autocomplete="tel">
    </div>
    <div class="field field-full">
      <label for="<?= $fid ?>-interest">I'm interested in</label>
      <select id="<?= $fid ?>-interest" name="interest">
        <?php foreach ($options as $val => $label): ?>
        <option value="<?= $val ?>"<?= $val === $preselect ? ' selected' : '' ?>><?= e($label) ?></option>
        <?php endforeach; ?>
      </select>
    </div>
    <div class="field field-full">
      <label for="<?= $fid ?>-msg">Message</label>
      <textarea id="<?= $fid ?>-msg" name="message" rows="3" placeholder="Tell us briefly about your initiative"><?= $context ? e("I'd like to know more about {$context}.") : '' ?></textarea>
    </div>
  </div>
  <div class="form-actions">
    <button class="btn btn-navy" type="submit">Send Enquiry <?= icon('arrow', 'icon icon-sm') ?></button>
    <p class="form-msg" role="status" aria-live="polite"></p>
  </div>
</form>
