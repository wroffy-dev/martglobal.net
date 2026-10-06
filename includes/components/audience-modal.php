<?php /* Homepage-only audience picker. Choice is remembered in localStorage (see main.js). */ ?>
<div class="aud-modal" id="audModal" role="dialog" aria-modal="true" aria-labelledby="audTitle" hidden>
  <div class="aud-dialog">
    <button class="aud-close" type="button" data-aud-dismiss aria-label="Close"><?= icon('close') ?></button>
    <p class="eyebrow">Welcome to MART Global</p>
    <h2 id="audTitle">Tell us who you are</h2>
    <p class="aud-sub">We'll show you the work and solutions most relevant to you.</p>
    <div class="aud-options">
      <button class="aud-option" type="button" data-aud-choose="corporate">
        <span class="aud-option-icon"><?= icon('target') ?></span>
        <span><strong>I'm a Business</strong><small>Research, strategy, business innovation and activation</small></span>
        <?= icon('arrow', 'icon icon-sm aud-arrow') ?>
      </button>
      <button class="aud-option" type="button" data-aud-choose="social">
        <span class="aud-option-icon"><?= icon('heart') ?></span>
        <span><strong>I'm a Development Organisation</strong><small>Programme implementation, advisory, CSR and market linkages</small></span>
        <?= icon('arrow', 'icon icon-sm aud-arrow') ?>
      </button>
    </div>
    <button class="aud-skip" type="button" data-aud-dismiss>Just exploring</button>
  </div>
</div>
