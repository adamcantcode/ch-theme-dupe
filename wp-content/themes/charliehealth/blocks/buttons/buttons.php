<?php
$style = get_field('button_group_buttons');
$linkOne = get_field('button_group_link');
$linkTwo = get_field('button_group_link_two');

if ($linkOne) {
  $linkOneUrl = $linkOne['url'];
  $linkOneTitle = $linkOne['title'];
  $linkOneTarget = $linkOne['target'] ?: '_self';
} else {
  $linkOneUrl = site_url() . '/form';
  $linkOneTitle = 'Get Started';
  $linkOneTarget = '_self';
}
if ($linkTwo) {
  $linkTwoUrl = $linkTwo['url'];
  $linkTwoTitle = $linkTwo['title'];
  $linkTwoTarget = $linkTwo['target'] ?: '_self';
} else {
  $linkTwoUrl = 'tel:+1-555-555-5555';
  $linkTwoTitle = '1 (555) 555-5555';
  $linkTwoTarget = '_self';
}
?>

<div class="flex gap-x-4">
  <a href="<?= $linkOneUrl; ?>" target="<?= $linkOneTarget; ?>" class="ch-button button-primary"><?= $linkOneTitle; ?></a>
  <?php if ($style === 'double') : ?>
    <a href="<?= $linkTwoUrl; ?>" target="<?= $linkTwoTarget; ?>" class="ch-button button-secondary"><?= $linkTwoTitle; ?></a>
  <?php endif; ?>
</div>