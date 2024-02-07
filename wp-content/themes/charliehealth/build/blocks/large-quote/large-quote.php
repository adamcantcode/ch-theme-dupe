<?php
$person = get_field('person');
$quote = get_field('quote');
$customImage = get_field('custom_image');
$reverse = get_field('direction');
$order = 'lg:order-1';
$imageOrder = 'lg:order-2';
$grid = 'lg:grid-cols-[1.33fr_1fr]';


if ($reverse) {
  $order = 'lg:order-2';
  $imageOrder = 'lg:order-1';
  $grid = 'lg:grid-cols-[1fr_1.33fr]';
}
if ($customImage) {
  $image = $customImage['url'];
  $alt = $customImage['alt'];
} else {
  $image = get_the_post_thumbnail_url($person);
  $thumbnailID = get_post_thumbnail_id($person);
  $alt = get_post_meta($thumbnailID, '_wp_attachment_image_alt', true);
}
?>
<div class="grid items-center grid-cols-1 lg:gap-sp-16 gap-sp-8 <?= $grid; ?>">
  <div class="<?= $imageOrder; ?>">
    <img src="<?= $image; ?>" alt="<?= $alt; ?>" class="object-cover w-full rounded-md aspect-square">
  </div>
  <div class="<?= $order; ?>">
    <p class="text-h3-base"><?= get_the_title($person); ?></p>
    <p class="mb-base5-6"><?= get_field('job_title', $person); ?></p>
    <p class="text-h2-base font-heading-serif">“<?= $quote; ?>”</p>
  </div>
</div>