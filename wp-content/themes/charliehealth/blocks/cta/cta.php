<?php
$heading = get_field('heading');
$subhead = get_field('subhead');
$link = get_field('link');

if (empty($link)) {
  $link = [
    'url' => site_url() . '/form',
    'title' => 'Get started',
    'target' => '_blank',
  ];
}
?>

<div class="flex justify-center rounded-sm bg-cream lg:p-sp-14 p-sp-10 mb-sp-6">
  <div class="flex flex-col items-center justify-center text-center max-w-[37.5rem]">
    <img src="<?= site_url(); ?>/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg" alt="Charlie Health shield logo" class="w-[3rem] mb-sp-5">
    <h2 class="text-darkest-blue lg:text-[2.5rem] text-h2-lg lg:leading-tight mb-sp-5 font-heading-serif"><?= $heading; ?></h2>
    <p class="text-darkest-blue"><?= $subhead; ?></p>
    <div class="flex justify-center w-full">
      <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" class="ch-button button-primary-dark"><?= $link['title']; ?></a>
    </div>
  </div>
</div>