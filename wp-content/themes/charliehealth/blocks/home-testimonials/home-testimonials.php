<?php
$heading = get_field('heading');
?>

<div class="mb-sp-14">
  <span class="relative z-20 self-start bg-yellow-300 rounded-lg px-sp-4 py-sp-3 text-h6 mb-sp-8">Parents</span>
  <span class="relative z-20 self-start rounded-lg px-sp-4 py-sp-3 text-h6 mb-sp-8 bg-lavender-300">Young Adults</span>
  <span class="relative z-20 self-start rounded-lg px-sp-4 py-sp-3 text-h6 mb-sp-8 bg-pale-blue-300">Teens</span>
</div>
<div class="grid grid-cols-1 gap-sp-14 lg:gap-sp-5 lg:grid-cols-[minmax(0,_7fr)_minmax(0,_1fr)_minmax(0,_4fr)] home-testimonials relative">
  <div>
    <h2 class="mb-sp-14"><?= $heading; ?></h2>
    <div class="grid gap-y-sp-2">
      <?php if (have_rows('testimonials')) : ?>
        <?php while (have_rows('testimonials')) : the_row(); ?>
          <div class="grid grid-cols-1 lg:grid-cols-[3fr_4fr]">
            <div class="flex gap-x-sp-6">
              <div class="rounded-[50%] h-[15px] w-[15px] bg-yellow-300 mt-sp-2"></div>
              <div class="font-heading-serif text-primary text-[20px] leading-[1.4] antialiased flex-1">“<?= get_sub_field('pull_quote'); ?>”</div>
            </div>
            <div>
              <div>
                <?= get_sub_field('full_quote'); ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
  <div></div>
  <?php if (have_rows('illustrations')) : ?>
    <!-- parent grid fix for swiper wrap -->
    <div class="w-full overflow-hidden">
      <div class="h-full swiper swiper-home-test">
        <div class="swiper-wrapper">
          <?php while (have_rows('illustrations')) : the_row(); ?>
            <div class="swiper-slide">
              <div class="absolute top-0 left-0">
                <img src="<?= get_sub_field('image')['sizes']['featured-large']; ?>" alt="<?= get_sub_field('image')['alt']; ?>">
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>