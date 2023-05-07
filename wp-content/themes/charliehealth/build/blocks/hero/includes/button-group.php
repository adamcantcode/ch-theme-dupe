<?php if ($buttons !== 'none') : ?>
  <div class="flex gap-x-4">
    <a href="<?= isset($linkUrl) ?: '#'; ?>" class="ch-button button-primary"><?= isset($linkText) ?: 'Get Started'; ?></a>
    <?php if ($buttons === 'double') : ?>
      <a href="tel:+" class="ch-button button-secondary">1 (555) 555-5555</a>
    <?php endif; ?>
  </div>
<?php endif; ?>