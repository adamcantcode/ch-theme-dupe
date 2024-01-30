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
          <div class="flex flex-row items-end gap-sp-2">
            <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M9.92662 19.7297L9.93197 19.735L8.50917 21.1492L1.59961 14.2814L3.02241 12.8671L8.50382 18.3155L21.1279 5.76758L22.5507 7.18179L9.92662 19.7297Z" fill="#161A3D" />
            </svg>
            <h4><?= get_sub_field('right_headline'); ?></h4>
          </div>
          <?= get_sub_field('right_details'); ?>
        </div>
      </div>
  <?php endwhile;
  endif; ?>
</div>