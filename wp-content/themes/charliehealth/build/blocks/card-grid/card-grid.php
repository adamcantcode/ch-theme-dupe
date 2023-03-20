<?php
$numbers = get_field('card_grid_numbers');
$borderStyle = get_field('card_grid_border_style');
$horizontalScroll = get_field('card_grid_horizontal_scroll');

if ($horizontalScroll === true) {
  $scrollClasses = 'overflow-auto w-full max-w-[80rem]';
  $gridClasses = 'grid items-center grid-flow-col gap-3 lg:gap-6 lg:grid-cols-3';
  $borderClasses = 'grid items-center grid-flow-col gap-3 lg:gap-6 lg:grid-cols-3';
} else {
  $scrollClasses = '';
  $gridClasses = 'grid items-center grid-cols-1 gap-4 lg:gap-6 lg:grid-cols-3';
  $borderClasses = 'grid items-center grid-cols-1 gap-4 lg:gap-6 lg:grid-cols-3';
}
?>
<?php if (have_rows('card_grid_cards')) : ?>
  <div class="<?= $scrollClasses; ?>">
    <div class="<?= $gridClasses; ?>">
      <?php while (have_rows('card_grid_cards')) : the_row();
        $title = get_sub_field('card_grid_title');
        $details = get_sub_field('card_grid_details');
      ?>
        <div class="w-[calc(100vw-2.5rem)] lg:w-full">
          <?php if ($borderStyle === 'gradient') : ?>
            <div class="bg-gradient-to-r from-purple-gradient-start to-purple-gradient-end p-[1px] rounded-md">
            <?php endif; ?>
            <!-- TODO Update border color -->
            <div class="rounded-md bg-light-purple<?= $borderStyle === 'gradient' ? '' : ' border'; ?>">
              <div class="p-sp-4 md:p-sp-6 lg:p-sp-8">
                <?php if ($numbers) : ?>
                  <h2 class="text-h2-lg mb-sp-5"><?= get_row_index(); ?></h2>
                <?php endif; ?>
                <?php if ($title) : ?>
                  <h3 class="mb-sp-5 last:mb-0"><?= $title; ?></h3>
                <?php endif; ?>
                <?php if ($details) : ?>
                  <p class="last:mb-0"><?= $details; ?></p>
                <?php endif; ?>
              </div>
            </div>
            <?php if ($borderStyle === 'gradient') : ?>
            </div>
          <?php endif; ?>
        </div>
      <?php endwhile; ?>
    </div>
  </div>
<?php endif; ?>