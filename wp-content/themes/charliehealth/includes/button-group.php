<?php
$buttons = get_field('button_group_buttons');
$linkOne = get_field('button_group_link');
$linkTwo = get_field('button_group_link_two');

$linkOneLink = '';
$linkOneTitle = '';
$linkOneTarget = '';
if (!empty($linkOne)) {
  $linkOneLink = $linkOne['url'];
  $linkOneTitle = $linkOne['title'];
  $linkOneTarget = $linkOne['target'];
}

$linkTwoLink = '';
$linkTwoTitle = '';
$linkTwoTarget = '';
if (!empty($linkTwo)) {
  $linkTwoLink = $linkTwo['url'];
  $linkTwoTitle = $linkTwo['title'];
  $linkTwoTarget = $linkTwo['target'];
}
$align = '';
if ($block['align']) {
  if ($block['align'] === 'left') {
    $align = 'justify-start';
  } elseif ($block['align'] === 'right') {
    $align = 'justify-end';
  } else {
    $align = 'justify-center';
  }
}
?>
<?php if ($buttons !== 'none') : ?>
  <?php if ($buttons === 'double') : ?>
    <div class="flex gap-x-4<?= ' ' . $align ?>">
      <a href="<?= $linkOneLink ?: '/form'; ?>" class="ch-button button-primary" target="<?= $linkOneTarget ?: '_self'; ?>"><?= $linkOneTitle ?: 'Get Started'; ?></a>
      <a href="<?= $linkTwoLink ?: 'tel:+18664848218'; ?>" class="ch-button button-secondary" target="<?= $linkTwoTarget ?: '_self'; ?>"><?= $linkTwoTitle ?: '1 (866) 484-8218'; ?></a>
    </div>
  <?php endif; ?>
  <?php if ($buttons === 'primary') : ?>
    <div class="flex gap-x-4<?= ' ' . $align ?>">
      <a href="<?= $linkOneLink ?: '/form'; ?>" class="ch-button button-primary" target="<?= $linkOneTarget ?: '_self'; ?>"><?= $linkOneTitle ?: 'Get Started'; ?></a>
    </div>
  <?php endif; ?>
  <?php if ($buttons === 'secondary') : ?>
    <div class="flex gap-x-4<?= ' ' . $align ?>">
      <a href="<?= $linkTwoLink ?: 'tel:+18664848218'; ?>" class="ch-button button-secondary" target="<?= $linkOneTarget ?: '_self'; ?>"><?= $linkTwoTitle ?: '1 (866) 484-8218'; ?></a>
    </div>
  <?php endif; ?>
<?php endif; ?>