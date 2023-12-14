<div class="grid items-center grid-cols-1 gap-sp-14 md:gap-sp-4 md:grid-cols-2">
  <div class="md:max-w-[430px]">
    <InnerBlocks />
  </div>
  <div class="flex-grow">
    <div class="grid items-start grid-cols-3 gap-sp-5 tri-grid-container">
      <?php if (have_rows('grid_item')) : while (have_rows('grid_item')) : the_row(); ?>
          <?php
          $stat    = get_sub_field('stat');
          $image   = get_sub_field('image');
          $details = get_sub_field('details');
          ?>
          <div class="grid justify-items-center<?= $stat ? ' tri-grid' : ''; ?>">
            <?php if ($stat) : ?>
              <span class="counter text-[56px] text-white leading-[1.1] font-heading-serif mb-sp-4 antialiased"><?= $stat; ?>%</span>
            <?php endif; ?>
            <?php if ($image) : ?>
              <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="mb-sp-4">
            <?php endif; ?>
            <p class="text-center text-white lg:max-w-[225px] !mb-0"><?= $details; ?></p>
          </div>
      <?php endwhile;
      endif; ?>
    </div>
  </div>
</div>