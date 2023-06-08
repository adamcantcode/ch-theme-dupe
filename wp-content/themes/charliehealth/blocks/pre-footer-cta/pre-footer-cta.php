<?php
$image = get_field('image');
$imageUrl = $image['url'];
$imageAlt = $image['alt'];
?>

<div class="rounded-md border-gradient">
  <div class="grid items-center lg:grid-cols-2">
    <img src="<?= $imageUrl ?: placeHolderImage(600, 300); ?>" alt="<?= $imageAlt; ?>" class="object-cover w-full lg:rounded-l-md lg:rounded-tr-none rounded-t-md lg:h-[300px] h-[200px]">
    <div class="p-sp-8">
      <InnerBlocks />
    </div>
  </div>
</div>