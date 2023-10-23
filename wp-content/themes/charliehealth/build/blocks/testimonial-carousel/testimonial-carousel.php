<div class="relative">
  <div class="absolute -translate-y-[40%]">
    <svg width="54" height="62" viewBox="0 0 54 62" fill="none" xmlns="http://www.w3.org/2000/svg">
      <path d="M0.820824 2.83575C0.820823 1.29615 2.48749 0.333897 3.82082 1.1037L52.9361 29.4604C54.2694 30.2302 54.2694 32.1547 52.9361 32.9245L3.82083 61.2812C2.48749 62.051 0.820824 61.0888 0.820824 59.5492L0.820824 2.83575Z" fill="#F7F5F1" />
    </svg>
  </div>
  <?php if (have_rows('testimonials')) : ?>
    <div class="swiper swiper-testimonial-carousel-big">
      <div class="swiper-wrapper">
        <?php while (have_rows('testimonials')) : the_row(); ?>
          <?php
          $pull_quote = get_sub_field('pull_quote');
          $full_quote = get_sub_field('full_quote');
          $age        = get_sub_field('age');
          $illo       = get_sub_field('illustration');
          ?>
          <div class="!h-auto swiper-slide">
            <div class="flex flex-col h-full lg:grid lg:grid-cols-2 lg:gap-[10rem]">
              <div class="order-2 lg:order-1 lg:mb-sp-16 mb-sp-8">
                <h5 class="md:mt-sp-14 mb-sp-8">In their words</h5>
                <div class="text-[56px] text-primary leading-[1.1] font-heading-serif mb-sp-8">“<?= $pull_quote; ?>”</div>
                <p><?= $full_quote; ?></p>
                <p class="mb-0 lg:mb-sp-14">— <?= $age; ?> Client</p>
              </div>
              <div class="relative order-1 lg:order-2 mt-sp-14 lg:mt-0 mb-sp-8 lg:mb-0">
                <img src="<?= $illo['url']; ?>" alt="<?= $illo['alt']; ?>" class="object-contain h-full mx-auto lg:object-cover lg:absolute lg:max-w-none lg:left-[33%] lg:-translate-x-1/2">
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      <div class="absolute bottom-0 w-full lg:mb-sp-12 lg:w-fit mb-sp-4">
        <div class="absolute left-0 z-10 lg:bottom-0 swiper-button-prev-testimonial">
          <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M9 1L1 9L9 17" stroke="#161A3D" stroke-width="1.5" stroke-linejoin="round" />
          </svg>
        </div>
        <div class="absolute right-0 z-10 lg:bottom-0 swiper-button-next-testimonial">
          <svg width="10" height="18" viewBox="0 0 10 18" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path d="M1 17L9 9L1 1" stroke="#161A3D" stroke-width="1.5" stroke-linejoin="round" />
          </svg>
        </div>
        <div class="swiper-pagination"></div>
      </div>
    </div>
  <?php endif; ?>
</div>