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
      <h2 class="!mb-sp-14">Our council members</h2>
    </div>
  </div>
  <?php
  $args = array(
    'post_type'      => 'medical-reviewer',
    'posts_per_page' => -1,
    'orderby'        => 'date',
    'order'          => 'DESC',
  );

  $query = new WP_Query($args); ?>
  <?php if ($query->have_posts()) :  ?>
    <div class="swiper swiper-careers-testimonial">
      <div class="container lg:px-sp-10 swiper-wrapper px-[20px]">
        <?php while ($query->have_posts()) : $query->the_post(); ?>
          <?php
          $post     = get_the_ID();
          $image    = get_the_post_thumbnail_url($post);
          $name     = get_the_title($post);
          $pronouns = get_field('pronouns', $post);
          $title    = get_field('title', $post);
          $bio      = get_field('ccac_page_bio', $post);
          $link     = get_the_permalink($post);

          if ($image) {
            $imageID = get_post_thumbnail_id();
            $imageSrcset = wp_get_attachment_image_srcset($imageID, 'featured-large');
            $imageAlt = get_post_meta($imageID, '_wp_attachment_image_alt', true);
          } else {
            $image = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
            $imageAlt = 'Charlie Health Logo';
          }
          ?>
          <div class="!h-auto swiper-slide mb-sp-12">
            <div class="flex !h-full gap-sp-8 pb-sp-8 lg:flex-row flex-col">
              <div class="text-center bg-white p-base5-5 rounded-lg lg:basis-[33%] careers-testimonial-image self-start">
                <img src="<?= $image ?>" alt="<?= $imageAlt ?>" class="object-cover rounded-circle aspect-square mb-sp-6">
                <p class="font-heading-serif mb-base5-1"><?= $name; ?> <?= $pronouns; ?></p>
                <p><?= $title; ?></p>
              </div>
              <div class="careers-testimonials-panel lg:basis-[55%]">
                <div class="[&_*]:text-h3-base [&_*]:font-heading-serif mb-base5-4">
                  <?= $bio; ?>
                </div>
                <p><a href="<?= $link; ?>">Read more</a></p>
              </div>
            </div>
            <div class="flex swiper-careers-testimonial-border">
              <div class="h-[1.5px] bg-primary basis-[100%]"></div>
            </div>
          </div>
        <?php
          wp_reset_postdata();
        endwhile; ?>
      </div>
      <div class="container px-[20px] lg:p-0 mb-sp-5 lg:mb-0">
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
</section>