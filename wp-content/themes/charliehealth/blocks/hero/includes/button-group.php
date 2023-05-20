<?php
$buttons = get_field('hero_buttons')['button_group_buttons'];
$linkOne = get_field('hero_buttons')['button_group_link'];
$linkTwo = get_field('hero_buttons')['button_group_link_two'];


?>
<?php if ($buttons !== 'none') : ?>
  <?php if ($buttons === 'double') : ?>
    <div class="flex gap-x-4">
      <a href="<?= $linkOne['url'] ?: '/form'; ?>" class="ch-button button-primary"><?= $linkOne['title'] ?: 'Get Started'; ?></a>
      <a href="<?= $linkTwo['url'] ?: 'tel:+18664848218'; ?>" class="ch-button button-secondary"><?= $linkTwo['title'] ?: '1 (866) 484-8218'; ?></a>
    </div>
  <?php endif; ?>
  <?php if ($buttons === 'primary') : ?>
    <div class="flex gap-x-4">
      <a href="<?= $linkOne['url'] ?: '/form'; ?>" class="ch-button button-primary"><?= $linkOne['title'] ?: 'Get Started'; ?></a>
    </div>
  <?php endif; ?>
  <?php if ($buttons === 'secondary') : ?>
    <div class="flex gap-x-4">
      <a href="<?= $linkOne['url'] ?: '/form'; ?>" class="ch-button button-secondary"><?= $linkOne['title'] ?: 'Get Started'; ?></a>
    </div>
  <?php endif; ?>
<?php endif; ?>