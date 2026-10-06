<?php
require_once __DIR__ . '/includes/functions.php';
if (!headers_sent()) {
    http_response_code(404);
}
$page_title = 'Page not found | ' . SITE['name'];
include __DIR__ . '/includes/header.php';
?>
<section class="section notfound">
  <div class="container center">
    <p class="eyebrow">404</p>
    <h1>We couldn't find that page</h1>
    <p class="lead">It may have moved. Here are good places to start.</p>
    <div class="hero-actions center">
      <a class="btn btn-navy" href="<?= e(url('corporate')) ?>">Corporate Solutions</a>
      <a class="btn btn-yellow" href="<?= e(url('social')) ?>">Social Solutions</a>
    </div>
  </div>
</section>
<?php include __DIR__ . '/includes/footer.php'; ?>
