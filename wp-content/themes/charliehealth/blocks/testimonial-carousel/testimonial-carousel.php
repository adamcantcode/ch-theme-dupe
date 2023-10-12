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
          $testimonial = get_sub_field('testimonial');
          $postID = $testimonial->ID;

          $anonymous = get_field('anonymous', $postID);
          if ($anonymous === false) {
            $attribution = get_field('attribution', $postID);
          } else {
            $attribution = 'Anonymous';
          }
          $pullQuote = get_field('pull-quote', $postID);
          $fullQuote = get_field('full_quote', $postID);
          $illo = get_sub_field('illustration');
          ?>
          <div class="!h-auto swiper-slide">
            <div class="grid lg:grid-cols-2">
              <div class="order-2 lg:order-1 mb-sp-16">
                <h5 class="lg:mt-sp-14 mb-sp-8">In their words</h5>
                <div class="text-[56px] text-primary leading-[1.1] font-heading-serif mb-sp-8">“<?= $pullQuote; ?>”</div>
                <p><?= $fullQuote; ?></p>
                <p class="lg:mb-0 mb-sp-14">— <?= $attribution; ?></p>
              </div>
              <div class="order-1 lg:order-2">
                <img src="<?= $illo['url']; ?>" alt="<?= $illo['alt']; ?>" class="mt-sp-14 lg:mt-0" data-swiper-parallax-scale="0.98">
              </div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  <?php endif; ?>
</div>