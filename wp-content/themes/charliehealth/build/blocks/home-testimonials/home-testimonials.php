<?php
$heading = get_field('heading');
?>

<div class="grid grid-cols-1 lg:gap-sp-5 gap-0 lg:grid-cols-[7fr_5fr] home-testimonials relative">
  <div class="min-w-0">
    <h2 class="lg:mb-sp-14 mb-sp-8"><?= $heading; ?></h2>
    <div class="grid gap-y-sp-8">
      <?php if (have_rows('testimonials')) : ?>
        <?php while (have_rows('testimonials')) : the_row(); ?>
          <?php
          $row = get_row_index();
          switch ($row) {
            case '1':
              $dotColor = 'bg-yellow-300';
              break;
            case '2':
              $dotColor = 'bg-lavender-300';
              break;
            case '3':
              $dotColor = 'bg-pale-blue-300';
              break;
            default:
              $dotColor = 'bg-yellow-300';
              break;
          }
          ?>
          <div class="grid grid-cols-1 lg:grid-cols-[2.33fr_4fr] lg:gap-sp-10 gap-sp-3">
            <div class="flex gap-x-sp-6">
              <div class="rounded-circle h-[15px] w-[15px] mt-sp-2 <?= $dotColor; ?>"></div>
              <p class="flex-1 font-heading-serif text-h4-base">“<?= get_sub_field('pull_quote'); ?>”</p>
            </div>
            <div>
              <div class="ml-[40px] lg:ml-0">
                <?= get_sub_field('full_quote'); ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
  <?php if (have_rows('illustrations')) : ?>
    <!-- parent grid fix for swiper wrap -->
    <div class="w-full lg:min-w-0">
      <div class="h-full swiper swiper-home-test">
        <div class="swiper-wrapper">
          <?php while (have_rows('illustrations')) : the_row(); ?>
            <div class="!flex items-center swiper-slide">
              <img src="<?= get_sub_field('image')['sizes']['featured-large']; ?>" alt="<?= get_sub_field('image')['alt']; ?>" class="w-full rounded-md">
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>