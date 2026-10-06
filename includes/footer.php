</main>

<footer class="site-footer">
  <div class="container">
    <div class="footer-top">
      <div class="footer-brand">
        <a class="brand brand-light" href="<?= e(url()) ?>"><?php include __DIR__ . '/logo.php'; ?></a>
        <p><?= e(SITE['description']) ?></p>
        <div class="social-links">
          <?php foreach (SITE['social'] as $net => $href): ?>
          <a href="<?= e($href) ?>" aria-label="<?= e(ucfirst($net)) ?>" target="_blank" rel="noopener"><?= icon($net, 'icon icon-sm') ?></a>
          <?php endforeach; ?>
        </div>
      </div>

      <div class="footer-col">
        <h4>Navigate</h4>
        <ul>
          <li><a href="<?= e(url('#about')) ?>">About</a></li>
          <li><a href="<?= e(url('corporate')) ?>">Corporate</a></li>
          <li><a href="<?= e(url('social')) ?>">Social</a></li>
          <li><a href="<?= e(url('#focus-areas')) ?>">Focus Areas</a></li>
          <li><a href="<?= e(url('#projects')) ?>">Projects</a></li>
          <li><a href="<?= e(url('clients-partners')) ?>">Clients &amp; Partners</a></li>
          <li><a href="<?= e(url('#contact')) ?>">Contact</a></li>
        </ul>
      </div>

      <?php foreach (['corporate', 'social'] as $nav_cat): ?>
      <div class="footer-col">
        <h4><?= e(get_category($nav_cat)['title']) ?></h4>
        <ul>
          <?php foreach (get_services_by_category($nav_cat) as $nav_s): ?>
          <li><a href="<?= e(service_url($nav_s)) ?>"><?= e($nav_s['name']) ?></a></li>
          <?php endforeach; ?>
        </ul>
      </div>
      <?php endforeach; ?>

      <div class="footer-col footer-contact">
        <h4>Get in touch</h4>
        <ul>
          <li><?= icon('pin', 'icon icon-sm') ?><span><?= e(SITE['address']) ?></span></li>
          <li><?= icon('phone', 'icon icon-sm') ?><a href="tel:<?= e(preg_replace('/\s+/', '', SITE['phone'])) ?>"><?= e(SITE['phone']) ?></a></li>
          <li><?= icon('mail', 'icon icon-sm') ?><a href="mailto:<?= e(SITE['email']) ?>"><?= e(SITE['email']) ?></a></li>
        </ul>
        <form class="newsletter" data-demo-form novalidate>
          <label for="nl-email">Insights from rural India, in your inbox</label>
          <div class="newsletter-row">
            <input id="nl-email" type="email" name="email" placeholder="Your email" required>
            <button class="btn btn-yellow btn-sm" type="submit" aria-label="Subscribe"><?= icon('arrow', 'icon icon-sm') ?></button>
          </div>
          <p class="form-msg" role="status" aria-live="polite"></p>
        </form>
      </div>
    </div>

    <div class="footer-bottom">
      <p>&copy; <?= date('Y') ?> <?= e(SITE['legal_name']) ?>. All rights reserved.</p>
      <p class="footer-tag"><?= e(SITE['tagline']) ?> · Since <?= SITE['since'] ?></p>
    </div>
  </div>
</footer>

<script src="<?= e(asset('js/main.js')) ?>" defer></script>
</body>
</html>
