<?php
$heading = get_field('heading');
?>

<div class="lg:mb-sp-14 mb-sp-10">
  <span class="relative z-20 self-start bg-yellow-300 rounded-lg px-sp-4 py-sp-3 text-h6 mb-sp-8">Parents</span>
  <span class="relative z-20 self-start rounded-lg px-sp-4 py-sp-3 text-h6 mb-sp-8 bg-lavender-300">Young Adults</span>
  <span class="relative z-20 self-start rounded-lg px-sp-4 py-sp-3 text-h6 mb-sp-8 bg-pale-blue-300">Teens</span>
</div>
<div class="grid grid-cols-1 lg:gap-sp-5 gap-0 lg:grid-cols-[minmax(0,_7fr)_minmax(0,_1fr)_minmax(0,_4fr)] home-testimonials relative">
  <div class="min-w-0">
    <h2 class="lg:!mb-sp-14 mb-sp-8"><?= $heading; ?></h2>
    <div class="grid gap-y-sp-4">
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
              <div class="font-heading-serif text-primary text-[20px] leading-[1.4] antialiased flex-1">“<?= get_sub_field('pull_quote'); ?>”</div>
            </div>
            <div>
              <div class="testimonial-paragraphs ml-[40px] lg:ml-0">
                <?= get_sub_field('full_quote'); ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      <?php endif; ?>
    </div>
  </div>
  <div class="min-w-0"></div>
  <?php if (have_rows('illustrations')) : ?>
    <!-- parent grid fix for swiper wrap -->
    <div class="lg:absolute lg:top-[-120px] lg:left-[60%] w-full lg:min-w-0">
      <div class="h-full swiper swiper-home-test">
        <div class="swiper-wrapper">
          <?php while (have_rows('illustrations')) : the_row(); ?>
            <div class="swiper-slide lg:!w-full">
              <img src="<?= get_sub_field('image')['sizes']['featured-large']; ?>" alt="<?= get_sub_field('image')['alt']; ?>" class="lg:max-w-[670px]">
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>