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
                <?php if (get_row_index() === 1) :  ?>
                  <h2 class="text-h4-base font-heading mt-sp-14">In their words</h2>
                <?php else : ?>
                  <p class="text-h4-base mt-sp-14">In their words</p>
                <?php endif; ?>
                <p class="text-h1-base font-heading-serif">“<?= $pull_quote; ?>”</p>
                <p><?= $full_quote; ?></p>
                <p class="mb-0 lg:mb-sp-14">— <?= $age; ?> Client</p>
              </div>
              <div class="relative order-1 lg:order-2 mt-sp-14 lg:mt-auto mb-sp-8 lg:mb-0">
                <img src="<?= $illo['url']; ?>" alt="<?= $illo['alt']; ?>" class="object-cover">
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      <div class="absolute bottom-0 lg:mb-sp-12 w-[50px] mb-sp-8">
        <div class="absolute left-0 z-10 lg:bottom-0 swiper-button-prev-testimonial">
          <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="rotate-180">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3431 0.278417L16.7071 6.32784C17.0976 6.69906 17.0976 7.30094 16.7071 7.67216L10.3431 13.7216C9.95262 14.0928 9.31946 14.0928 8.92893 13.7216C8.53841 13.3504 8.53841 12.7485 8.92893 12.3773L13.5858 7.95058H0V6.04942H13.5858L8.92893 1.62273C8.53841 1.25151 8.53841 0.64964 8.92893 0.278417C9.31946 -0.0928058 9.95262 -0.0928058 10.3431 0.278417Z" fill="#161A3D" />
          </svg>
        </div>
        <div class="absolute right-0 z-10 lg:bottom-0 swiper-button-next-testimonial">
          <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3431 0.278417L16.7071 6.32784C17.0976 6.69906 17.0976 7.30094 16.7071 7.67216L10.3431 13.7216C9.95262 14.0928 9.31946 14.0928 8.92893 13.7216C8.53841 13.3504 8.53841 12.7485 8.92893 12.3773L13.5858 7.95058H0V6.04942H13.5858L8.92893 1.62273C8.53841 1.25151 8.53841 0.64964 8.92893 0.278417C9.31946 -0.0928058 9.95262 -0.0928058 10.3431 0.278417Z" fill="#161A3D" />
          </svg>
        </div>
      </div>
    </div>
  <?php endif; ?>
</div>