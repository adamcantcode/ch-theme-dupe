<?php

?>
<div class="grid grid-cols-1 lg:grid-cols-2 rounded-[12px] overflow-hidden">
  <?php if (have_rows('tables')) : while (have_rows('tables')) : the_row(); ?>
      <div class="bg-primary-200 pl-sp-12 [&:nth-child(-n+2)]:pt-sp-6 [&:nth-last-child(-n+2)]:pb-sp-6 group">
        <div class="[&_*]:text-white h-full border-b border-pale-blue-300 pr-sp-12 py-sp-6 group-[&:nth-last-child(-n+2)]:border-none [&_p]:last:mb-0 [&_ul]:last:mb-0">
          <?php if (get_row_index() === 1) : ?>
            <h3 class=""><?= get_field('left_title'); ?></h3>
          <?php endif; ?>
          <h4><?= get_sub_field('left_headline'); ?></h4>
          <?= get_sub_field('left_details'); ?>
        </div>
      </div>
      <div class="bg-white pr-sp-12 [&:nth-child(-n+2)]:pt-sp-6 [&:nth-last-child(-n+2)]:pb-sp-6 group">
        <div class="h-full border-b border-pale-blue-300 pl-sp-12 py-sp-6 group-[&:nth-last-child(-n+2)]:border-none [&_p]:last:mb-0 [&_ul]:last:mb-0">
          <?php if (get_row_index() === 1) : ?>
            <h3 class=""><?= get_field('right_title'); ?></h3>
          <?php endif; ?>
          <h4><?= get_sub_field('right_headline'); ?></h4>
          <?= get_sub_field('right_details'); ?>
        </div>
      </div>
  <?php endwhile;
  endif; ?>
</div>