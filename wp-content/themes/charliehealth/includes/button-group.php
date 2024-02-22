<?php
$buttons = get_field('button_group_buttons');
$invert = get_field('button_group_invert');
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
if (isset($style)) {
  if ($style === 'full') {
    $align = 'justify-end';
  }
}
?>
<?php if ($buttons !== 'none') : ?>
  <?php if ($buttons === 'double') : ?>
    <div class="flex flex-col lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full<?= ' ' . $align ?>">
      <a href="<?= $linkOneLink ?: '/form'; ?>" class="ch-button button-primary<?= $invert ? ' inverted' : '' ?>" target="<?= $linkOneTarget ?: '_self'; ?>"><?= $linkOneTitle ?: 'Get Started'; ?></a>
      <a href="<?= $linkTwoLink ?: 'tel:+18664848218'; ?>" class="ch-button button-secondary<?= $invert ? ' inverted' : '' ?>" target="<?= $linkTwoTarget ?: '_self'; ?>"><?= $linkTwoTitle ?: '1 (866) 484-8218'; ?></a>
    </div>
  <?php endif; ?>
  <?php if ($buttons === 'primary') : ?>
    <div class="flex flex-col lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full<?= ' ' . $align ?>">
      <a href="<?= $linkOneLink ?: '/form'; ?>" class="ch-button button-primary<?= $invert ? ' inverted' : '' ?>" target="<?= $linkOneTarget ?: '_self'; ?>"><?= $linkOneTitle ?: 'Get Started'; ?></a>
    </div>
  <?php endif; ?>
  <?php if ($buttons === 'secondary') : ?>
    <div class="flex flex-col lg:flex-row gap-sp-4 lg:items-start items-stretch md:w-[unset] w-full<?= ' ' . $align ?>">
      <a href="<?= $linkOneLink ?: 'tel:+18664848218'; ?>" class="ch-button button-secondary<?= $invert ? ' inverted' : '' ?>" target="<?= $linkOneTarget ?: '_self'; ?>"><?= $linkOneTitle ?: '1 (866) 484-8218'; ?></a>
    </div>
  <?php endif; ?>
<?php endif; ?>