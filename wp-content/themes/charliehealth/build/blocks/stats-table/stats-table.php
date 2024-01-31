<div class="grid grid-cols-1 lg:grid-cols-2">
  <div>
    <div class="border-b border-opacity-25 border-card-border">
      <h2 class="mb-0 text-white lg:px-sp-8 py-sp-4">National Averages</h2>
    </div>
    <?php if (have_rows('left_column')) : while (have_rows('left_column')) : the_row(); ?>
        <div class="flex items-center gap-sp-4 lg:px-sp-8 py-sp-4">
          <div class="rounded-circle bg-white aspect-square lg:h-sp-16 h-sp-14 p-sp-4 flex items-center justify-center">
            <h3 class="mb-0 leading-none text-center"><?= get_sub_field('statistic'); ?></h3>
          </div>
          <p class="mb-0 text-white"><?= get_sub_field('description'); ?></p>
        </div>
    <?php endwhile;
    endif; ?>
  </div>
  <div class="border-opacity-25 lg:border-l border-card-border">
    <div class="border-b border-opacity-25 border-card-border">
      <h2 class="mb-0 text-white lg:px-sp-8 py-sp-4">Charlie Health</h2>
    </div>
    <?php if (have_rows('right_column')) : while (have_rows('right_column')) : the_row(); ?>
        <div class="flex items-center gap-sp-4 lg:px-sp-8 py-sp-4">
          <div class="rounded-circle bg-bright-teal aspect-square lg:h-sp-16 h-sp-14 p-sp-4 flex items-center justify-center">
            <h3 class="mb-0"><?= get_sub_field('statistic'); ?></h3>
          </div>
          <p class="mb-0 text-white"><?= get_sub_field('description'); ?></p>
        </div>
    <?php endwhile;
    endif; ?>
  </div>
</div>