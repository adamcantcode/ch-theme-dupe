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
            <div class="flex flex-col h-full lg:grid lg:grid-cols-2">
              <div class="order-2 lg:order-1 lg:mb-sp-16">
                <h5 class="lg:mt-sp-14 mb-sp-8">In their words</h5>
                <div class="text-[56px] text-primary leading-[1.1] font-heading-serif mb-sp-8">“<?= $pull_quote; ?>”</div>
                <p><?= $full_quote; ?></p>
                <p class="mb-0 lg:mb-sp-14">— Anonymous, <?= $age; ?></p>
              </div>
              <div class="relative order-1 lg:order-2 mt-sp-14 lg:mt-0 mb-sp-4 lg:mb-0">
                <img src="<?= $illo['url']; ?>" alt="<?= $illo['alt']; ?>" class="object-contain h-full lg:absolute lg:max-w-none lg:left-1/2 lg:-translate-x-1/2">
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  <?php endif; ?>
</div>