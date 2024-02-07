<div class="grid grid-cols-1 lg:grid-cols-2">
  <div>
    <div class="border-b border-opacity-25 border-card-border">
      <h2 class="text-white lg:px-sp-8 py-sp-4">National Averages</h2>
    </div>
    <?php if (have_rows('left_column')) : while (have_rows('left_column')) : the_row(); ?>
        <div class="flex items-center gap-sp-4 lg:px-sp-8 py-sp-4">
          <div class="flex items-center justify-center bg-white rounded-circle aspect-square lg:h-sp-16 h-sp-14 p-sp-4">
            <p class="text-center text-h4-base"><?= get_sub_field('statistic'); ?></p>
          </div>
          <p class="mb-0 text-white"><?= get_sub_field('description'); ?></p>
        </div>
    <?php endwhile;
    endif; ?>
  </div>
  <div class="border-opacity-25 lg:border-l border-card-border">
    <div class="border-b border-opacity-25 border-card-border">
      <h2 class="text-white lg:px-sp-8 py-sp-4">Charlie Health</h2>
    </div>
    <?php if (have_rows('right_column')) : while (have_rows('right_column')) : the_row(); ?>
        <div class="flex items-center gap-sp-4 lg:px-sp-8 py-sp-4">
          <div class="flex items-center justify-center rounded-circle bg-bright-teal aspect-square lg:h-sp-16 h-sp-14 p-sp-4">
            <p class="text-center text-h4-base"><?= get_sub_field('statistic'); ?></p>
          </div>
          <p class="mb-0 text-white"><?= get_sub_field('description'); ?></p>
        </div>
    <?php endwhile;
    endif; ?>
  </div>
</div>