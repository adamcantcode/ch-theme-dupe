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
      <h2 class="text-[14px] leading-[1.1]">Hear from the team</h2>
    </div>
  </div>
  <?php if (have_rows('testimonials')) :  ?>
    <div class="swiper swiper-careers-testimonial">
      <div class="container lg:px-sp-10 swiper-wrapper px-[20px]">
        <?php while (have_rows('testimonials')) : the_row(); ?>
          <?php
          $image     = get_sub_field('image');
          $name      = get_sub_field('name');
          $title     = get_sub_field('title');
          $pullQuote = get_sub_field('pull_quote');
          $fullQuote = get_sub_field('full_quote');
          ?>
          <div class="!h-auto swiper-slide mb-sp-12">
            <div class="flex !h-full gap-sp-8 pb-sp-8 lg:flex-row flex-col">
              <div class="text-center bg-white p-sp-8 rounded-[6px] lg:basis-[33%] careers-testimonial-image self-start">
                <img src="<?= $image['url'] ?: placeHolderImage(); ?>" alt="<?= $image['alt']; ?>" class="object-cover rounded-[50%] aspect-square mb-sp-6">
                <p class="font-heading-serif text-[14px] leading-[1.6] mb-sp-1"><?= $name; ?></p>
                <p class="text-[14px] leading-[1.6] mb-0"><?= $title; ?></p>
              </div>
              <div class="careers-testimonials-panel lg:basis-[55%]">
                <p class="lg:text-[28px] text-[20px] leading-[1.4] mb-sp-4 font-heading-serif"><?= $pullQuote; ?></p>
                <p class="text-[14px] leading-[1.4]"><?= $fullQuote; ?></p>
              </div>
            </div>
            <div class="flex swiper-careers-testimonial-border">
              <div class="h-[1.5px] bg-primary basis-[100%]"></div>
            </div>
          </div>
        <?php endwhile; ?>
      </div>
      <div class="container px-[20px] lg:p-0">
        <div class="w-[50px] relative">
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
    </div>
  <?php endif;  ?>
  <!-- Slider main container -->
  <?php $ctaHeadline = get_field('headline'); ?>
  <div class="section-horizontal section-bg-js-cta">
    <div class="container-sm">
      <div class="flex flex-col justify-center pin-cta-js lg:h-[50vh] lg:mt-0 mt-sp-16 pb-sp-14 lg:pb-0">
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