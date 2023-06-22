<div class="relative mb-sp-6 last:mb-0 lg:px-sp-16">
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
    <div class="absolute inset-0 w-full h-full noshow lg:block">
      <div class="absolute -translate-y-1/2 swiper-button-prev-arrow-carousel top-[calc(50%-26px)] left-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
          <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
          <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" class="arrow-slider-arrow" />
          <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
        </svg>
      </div>
      <div class="absolute -translate-y-1/2 swiper-button-next-arrow-carousel top-[calc(50%-26px)] right-0">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
          <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
          <path d="M38.0607 26.0607C38.6464 25.4749 38.6464 24.5251 38.0607 23.9393L28.5147 14.3934C27.9289 13.8076 26.9792 13.8076 26.3934 14.3934C25.8076 14.9792 25.8076 15.9289 26.3934 16.5147L34.8787 25L26.3934 33.4853C25.8076 34.0711 25.8076 35.0208 26.3934 35.6066C26.9792 36.1924 27.9289 36.1924 28.5147 35.6066L38.0607 26.0607ZM13 26.5H37V23.5H13V26.5Z" fill="#212984" class="arrow-slider-arrow" />
          <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
        </svg>
      </div>
    </div>
  <?php else : ?>
    <div class="min-h-[300px] bg-tag-gray flex items-center justify-center">
      <code>CAROUSEL</code>
    </div>
  <?php endif; ?>
</div>