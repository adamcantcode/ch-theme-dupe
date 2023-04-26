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

<div class="rounded-md border-gradient">
  <div class="grid items-center lg:grid-cols-2">
    <img src="<?= placeHolderImage(600, 300); ?>" alt="" class="object-cover lg:rounded-l-md lg:rounded-tr-none rounded-t-md lg:min-h-[300px] min-h-[200px]">
    <div class="p-sp-8">
      <h4>We're building care plans as unique as you.</h4>
      <a href="#">About us</a>
    </div>
  </div>
</div>