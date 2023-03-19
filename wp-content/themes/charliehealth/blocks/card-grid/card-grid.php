<?php

?>
<?php if (have_rows('card_grid_cards')) : ?>
  <div class="overflow-auto w-full max-w-[80rem]">
    <div class="grid items-center grid-flow-col gap-3 lg:gap-6 lg:grid-cols-3">
      <?php while (have_rows('card_grid_cards')) : the_row();
        $numbers = get_sub_field('card_grid_numbers');
        $title = get_sub_field('card_grid_title');
        $details = get_sub_field('card_grid_details');
        $borderStyle = get_sub_field('card_grid_border_style');
        $horizontalScroll = get_sub_field('card_grid_horizontal_scroll');
      ?>
        <div>
          <div class="w-[calc(100vw-2.5rem)] lg:w-full">
            <div class="bg-gradient-to-r from-purple-gradient-start to-purple-gradient-end p-[1px] rounded-md">
              <div class="rounded-md bg-light-purple ">
                <div class="p-sp-4 md:p-sp-6 lg:p-sp-8">
                  <?php if ($numbers) : ?>
                    <h4 class="text-quote-medium small-line-h"><?= get_row_index(); ?></h4>
                  <?php endif; ?>
                  <?php if ($title) : ?>
                    <h3 class="mb-sp-5 last:mb-0"><?= $title; ?></h3>
                  <?php endif; ?>
                  <?php if ($details) : ?>
                    <p class="last:mb-0"><?= $details; ?></p>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
<?php endif; ?>