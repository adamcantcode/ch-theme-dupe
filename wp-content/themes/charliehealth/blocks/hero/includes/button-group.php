<?php
$buttons = get_field('hero_buttons')['button_group_buttons'];
$linkOne = get_field('hero_buttons')['button_group_link'];
$linkTwo = get_field('hero_buttons')['button_group_link_two'];

if (!empty($linkOne)) {
  $linkOneLink = $linkOne['url'];
  $linkOneTitle = $linkOne['title'];
  $linkOneTarget = $linkOne['target'];
}
if (!empty($linkTwo)) {
  $linkTwoLink = $linkTwo['url'];
  $linkTwoTitle = $linkTwo['title'];
  $linkTwoTarget = $linkTwo['target'];
}
// var_dump($linkOne['url']);
// var_dump($linkTwo);
?>
<?php if ($buttons !== 'none') : ?>
  <?php if ($buttons === 'double') : ?>
    <div class="flex gap-x-4">
      <a href="<?= $linkOneLink ?: '/form'; ?>" class="ch-button button-primary" target="<?= $linkOneTarget ?: '_self'; ?>"><?= $linkOneTitle ?: 'Get Started'; ?></a>
      <a href="<?= $linkTwoLink ?: 'tel:+18664848218'; ?>" class="ch-button button-secondary" target="<?= $linkTwoTarget ?: '_self'; ?>"><?= $linkTwoTitle ?: '1 (866) 484-8218'; ?></a>
    </div>
  <?php endif; ?>
  <?php if ($buttons === 'primary') : ?>
    <div class="flex gap-x-4">
      <a href="<?= $linkOneLink ?: '/form'; ?>" class="ch-button button-primary" target="<?= $linkOneTarget ?: '_self'; ?>"><?= $linkOneTitle ?: 'Get Started'; ?></a>
    </div>
  <?php endif; ?>
  <?php if ($buttons === 'secondary') : ?>
    <div class="flex gap-x-4">
      <a href="<?= $linkTwoLink ?: 'tel:+18664848218'; ?>" class="ch-button button-secondary" target="<?= $linkOneTarget ?: '_self'; ?>"><?= $linkTwoTitle ?: '1 (866) 484-8218'; ?></a>
    </div>
  <?php endif; ?>
<?php endif; ?>