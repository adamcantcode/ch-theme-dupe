<div class="flex gap-x-4">
  <a href="<?= isset($linkUrl) ?: '#'; ?>" class="ch-button"><?= isset($linkText) ?: 'GET ER DONE'; ?></a>
  <?php if ($buttons === 'double') : ?>
    <a href="tel:+" class="ch-button-secondary">1 (555) 555-5555</a>
  <?php endif; ?>
</div>