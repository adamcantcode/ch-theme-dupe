<div class="grid grid-cols-1 lg:grid-cols-[8fr_4fr] gap-sp-5">
  <div>
    <InnerBlocks />
  </div>
  <div class="grid justify-end">
    <img src="<?= get_field('image')['url']; ?>" alt="<?= get_field('image')['alt']; ?>" class="max-w-[50%] lg:max-w-full ml-auto">
  </div>
</div>