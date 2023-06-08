<div class="mb-sp-6 last:mb-0">
  <?php if (have_rows('carousel')) : ?>
    <div class="swiper swiper-blog-carousel">
      <div class="swiper-wrapper">
        <?php while (have_rows('carousel')) : the_row(); ?>
          <div class="!h-auto swiper-slide">
            <div class="grid items-center justify-center h-full border-2 rounded-md border-purple-gradient-end p-sp-8">
              <div class="carousel-content">
                <?= get_sub_field('content'); ?>
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      <div class="!relative swiper-pagination !bottom-0 p-sp-4"></div>
    </div>
  <?php else : ?>
    <div class="min-h-[300px] bg-tag-gray flex items-center justify-center">
      <code>CAROUSEL</code>
    </div>
  <?php endif; ?>
</div>