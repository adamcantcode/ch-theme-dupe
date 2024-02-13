<?php if (have_rows('steps')) : ?>
  <div class="grid grid-cols-1 gap-sp-3">
    <?php while (have_rows('steps')) : the_row(); ?>
      <div class="grid grid-cols-1 lg:grid-cols-[2fr_5fr] lg:gap-sp-5 gap-sp-2 bg-white rounded-[6px] py-sp-4 px-sp-6 items-center">
        <h3 class="mb-0 !text-[20px] !leading-[1.4]"><?= get_sub_field('heading'); ?></h3>
        <p class="mb-0 text-[14px] !leading-[1.4]"><?= get_sub_field('description'); ?></p>
      </div>
    <?php endwhile; ?>
  </div>
<?php endif; ?>