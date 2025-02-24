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
// var_dump($linkOne['url']);
// var_dump($linkTwo);
?>
<?php if ($buttons !== 'none') : ?>
  <?php if ($buttons === 'double') : ?>
    <div class="flex gap-x-4">
      <a href="<?= $linkOneLink ?: '/form'; ?>" class="ch-button button-primary-ch" target="<?= $linkOneTarget ?: '_self'; ?>"><?= $linkOneTitle ?: 'Get Started'; ?></a>
      <a href="<?= $linkTwoLink ?: 'tel:+19862060414'; ?>" class="ch-button button-secondary-ch" target="<?= $linkTwoTarget ?: '_self'; ?>"><?= $linkTwoTitle ?: '1 (986) 206-0414'; ?></a>
    </div>
  <?php endif; ?>
  <?php if ($buttons === 'primary') : ?>
    <div class="flex gap-x-4">
      <a href="<?= $linkOneLink ?: '/form'; ?>" class="ch-button button-primary-ch" target="<?= $linkOneTarget ?: '_self'; ?>"><?= $linkOneTitle ?: 'Get Started'; ?></a>
    </div>
  <?php endif; ?>
  <?php if ($buttons === 'secondary') : ?>
    <div class="flex gap-x-4">
      <a href="<?= $linkTwoLink ?: 'tel:+19862060414'; ?>" class="ch-button button-secondary-ch" target="<?= $linkOneTarget ?: '_self'; ?>"><?= $linkTwoTitle ?: '1 (986) 206-0414'; ?></a>
    </div>
  <?php endif; ?>
<?php endif; ?>