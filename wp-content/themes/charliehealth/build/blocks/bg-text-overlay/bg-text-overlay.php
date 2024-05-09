<?php $image = get_field('image'); ?>
<div class="relative grid lg:grid-cols-[1.5fr_1fr] gap-base5-8">
  <div class="z-20">
    <InnerBlocks />
  </div>
  <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="lg:h-[160%] lg:right-0 lg:absolute lg:top-1/2 lg:-translate-y-1/2 z-10">
</div>