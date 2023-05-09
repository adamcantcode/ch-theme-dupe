<?php
$person = get_field('person');
$quote = get_field('quote');
$image = get_field('image');
$reverse = get_field('reverse');
$order = 'lg:order-1';
$imageOrder = 'lg:order-2';

if($reverse) {
  $order = 'lg:order-2';
  $imageOrder = 'lg:order-1';
}
if(!$image) {
  $image = get_the_post_thumbnail_url($person);
}
?>
<div class="grid items-center grid-cols-1 lg:grid-flow-col lg:gap-sp-16 gap-sp-8">
  <div class="order-2 <?= $order; ?>">
    <h3 class="mb-sp-1"><?= get_field('job_title', $person); ?></h3>
    <h5 class="mb-sp-8"><?= get_the_title($person); ?></h5>
    <h3 class="lg:text-h1-display text-h3">“<?= $quote; ?>”</h3>
  </div>
  <div class="order-1 <?= $imageOrder; ?>">
    <img src="<?= $image; ?>" alt="Photo of Justin Weiss" class="object-cover w-full rounded-md aspect-square">
  </div>
</div>
