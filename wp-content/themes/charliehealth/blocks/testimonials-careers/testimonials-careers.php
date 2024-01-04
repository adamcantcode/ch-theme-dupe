<?php

/**
 * Testimonial Block Template.
 *
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'careers-testimonial-block';
if (!empty($block['className'])) {
  $className .= ' ' . esc_attr($block['className']);
}
if (!empty($block['align'])) {
  $className .= ' align' . esc_attr($block['align']);
}
?>

<section <?= $anchor ?: ''; ?>class="<?= $className; ?> testimonial-padding bg-grey-warm section-bg-js">
  <div class="section-horizontal">
    <div class="container">
      <h2><?= get_field('headline'); ?>headline</h2>
    </div>
  </div>
  <?php // if (have_rows('slides')) : 
  ?>
  <div class="swiper swiper-careers-testimonial">
    <div class="container lg:px-sp-10 swiper-wrapper">
      <?php // while (have_rows('slides')) : the_row(); 
      ?>
      <div class="swiper-slide">
        <div class="flex gap-sp-8 pb-sp-8">
          <div class="text-center bg-white p-sp-10 rounded-[6px] basis-[30%] careers-testimonial-image">
            <img src="<?= placeHolderImage(); ?>" alt="" class="object-cover rounded-[50%] aspect-square mb-sp-6">
            <p class="font-heading-serif text-[14px] leading-[1.6] mb-sp-1">Dr. Caroline Fenkel, DSW, LCSW</p>
            <p class="text-[14px] leading-[1.6] mb-0">Chief Clinical Officer & Co-Founder</p>
          </div>
          <div class="careers-testimonials-panel basis-[60%]">
            <p class="lg:text-[28px] text-[20px] leading-[1.4] mb-sp-4 font-heading-serif">Think of a time that you’ve gone out of your way to help someone else feel less alone or a time when you were feeling down and someone put out their hand to pick you back up.</p>
            <p class="text-[14px] leading-[1.4]">Now multiply those moments into thousands of interactions and imagine that healing power. That's the power of the Charlie Health Clinical Team. Amidst an epidemic of loneliness, we are the champions of an entire generation, fostering hope and saving lives.</p>
          </div>
        </div>
        <div class="flex swiper-careers-testimonial-border">
          <div class="h-[1.5px] bg-primary basis-[100%]"></div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="flex gap-sp-8 pb-sp-8">
          <div class="text-center bg-white p-sp-10 rounded-[6px] basis-[30%] careers-testimonial-image">
            <img src="<?= placeHolderImage(); ?>" alt="" class="object-cover rounded-[50%] aspect-square mb-sp-6">
            <p class="font-heading-serif text-[14px] leading-[1.6] mb-sp-1">Dr. Caroline Fenkel, DSW, LCSW</p>
            <p class="text-[14px] leading-[1.6] mb-0">Chief Clinical Officer & Co-Founder</p>
          </div>
          <div class="careers-testimonials-panel basis-[60%]">
            <p class="lg:text-[28px] text-[20px] leading-[1.4] mb-sp-4 font-heading-serif">Think of a time that you’ve gone out of your way to help someone else feel less alone or a time when you were feeling down and someone put out their hand to pick you back up.</p>
            <p class="text-[14px] leading-[1.4]">Now multiply those moments into thousands of interactions and imagine that healing power. That's the power of the Charlie Health Clinical Team. Amidst an epidemic of loneliness, we are the champions of an entire generation, fostering hope and saving lives.</p>
          </div>
        </div>
        <div class="flex swiper-careers-testimonial-border">
          <div class="h-[1.5px] bg-primary basis-[100%]"></div>
        </div>
      </div>
      <div class="swiper-slide">
        <div class="flex gap-sp-8 pb-sp-8">
          <div class="text-center bg-white p-sp-10 rounded-[6px] basis-[30%] careers-testimonial-image">
            <img src="<?= placeHolderImage(); ?>" alt="" class="object-cover rounded-[50%] aspect-square mb-sp-6">
            <p class="font-heading-serif text-[14px] leading-[1.6] mb-sp-1">Dr. Caroline Fenkel, DSW, LCSW</p>
            <p class="text-[14px] leading-[1.6] mb-0">Chief Clinical Officer & Co-Founder</p>
          </div>
          <div class="careers-testimonials-panel basis-[60%]">
            <p class="lg:text-[28px] text-[20px] leading-[1.4] mb-sp-4 font-heading-serif">Think of a time that you’ve gone out of your way to help someone else feel less alone or a time when you were feeling down and someone put out their hand to pick you back up.</p>
            <p class="text-[14px] leading-[1.4]">Now multiply those moments into thousands of interactions and imagine that healing power. That's the power of the Charlie Health Clinical Team. Amidst an epidemic of loneliness, we are the champions of an entire generation, fostering hope and saving lives.</p>
          </div>
        </div>
        <div class="flex swiper-careers-testimonial-border">
          <div class="h-[1.5px] bg-primary basis-[100%]"></div>
        </div>
      </div>
      <?php // endwhile; 
      ?>
    </div>
    <div class="container relative h-[50px] my-sp-8 noshow lg:block">
      <div class="absolute left-0 swiper-button-prev-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
          <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
          <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" class="arrow-slider-arrow" />
          <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
        </svg>
      </div>
      <div class="absolute right-0 swiper-button-next-arrow">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
          <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
          <path d="M38.0607 26.0607C38.6464 25.4749 38.6464 24.5251 38.0607 23.9393L28.5147 14.3934C27.9289 13.8076 26.9792 13.8076 26.3934 14.3934C25.8076 14.9792 25.8076 15.9289 26.3934 16.5147L34.8787 25L26.3934 33.4853C25.8076 34.0711 25.8076 35.0208 26.3934 35.6066C26.9792 36.1924 27.9289 36.1924 28.5147 35.6066L38.0607 26.0607ZM13 26.5H37V23.5H13V26.5Z" fill="#212984" class="arrow-slider-arrow" />
          <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
        </svg>
      </div>
    </div>
    <div class="max-w-[1280px] lg:mx-auto mx-sp-5 relative h-[2px] mt-sp-2">
      <div class="relative swiper-pagination"></div>
    </div>
  </div>
  <?php //endif; 
  ?>
  <!-- Slider main container -->
<?php $ctaHeadline = get_field('headline'); ?>
  <div class="section-horizontal section-bg-js-cta">
    <div class="container-sm">
      <div class="flex flex-col justify-center pin-cta-js lg:h-[50vh] lg:mt-0 mt-[200px] pb-sp-14 lg:pb-0">
        <div class="pin-cta-js-motion">
          <div class="flex justify-center rounded-sm lg:px-sp-14 lg:pt-sp-14 pb-sp-6 px-sp-6">
            <div class="flex flex-col items-center justify-center text-center max-w-[700px]">
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health shield logo" class="w-[3rem] mb-sp-5">
              <h2 class="text-darkest-blue lg:text-[2.5rem] text-h2-lg lg:leading-tight mb-sp-10 font-heading-serif"><?= $ctaHeadline; ?></h2>
              <?php include(get_template_directory() . '/includes/button-group.php'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>