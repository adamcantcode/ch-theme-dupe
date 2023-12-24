<?php
$image = get_field('image');
?>

<div class="grid grid-cols-2 lg:grid-cols-6 gap-sp-5">
  <div class="col-span-2 lg:col-span-1">
    <h2>Meet our providers</h2>
    <?php include(get_template_directory() . '/includes/button-group.php'); ?>
  </div>
  <?php if (have_rows('providers')) : ?>
    <?php while (have_rows('providers')) : the_row(); ?>
      <div class="bg-white rounded-[6px] py-sp-4 px-sp-3">
        <img src="<?= get_sub_field('headshot')['sizes']['featured-large']; ?>" alt="<?= get_sub_field('headshot')['alt']; ?>" class="object-cover rounded-[50%] aspect-square mb-sp-6">
        <p class="font-heading-serif mb-[10px] text-[14px] leading-[1.4]"><?= get_sub_field('name'); ?></p>
        <p class="mb-0 text-[14px] leading-[1.4]"><?= get_sub_field('title'); ?></p>
      </div>
    <?php endwhile; ?>
  <?php endif; ?>
</div>