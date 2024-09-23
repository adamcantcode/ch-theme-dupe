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
$className = 'videos-testimonial-block';
if (!empty($block['className'])) {
  $className .= ' ' . esc_attr($block['className']);
}
if (!empty($block['align'])) {
  $className .= ' align' . esc_attr($block['align']);
}
?>

<?php if (have_rows('testimonials')) :  ?>
  <div class="swiper swiper-videos-testimonial-no-quote">
    <div class="container swiper-wrapper">
      <?php while (have_rows('testimonials')) : the_row(); ?>
        <?php
        $video     = get_sub_field('video_code');
        $name      = get_sub_field('name');
        $title     = get_sub_field('title');
        $pullQuote = get_sub_field('pull_quote');
        $linkedIn  = get_sub_field('linkedin');

        if (!empty($pullQuote) && substr($pullQuote, -1) !== '.') {
          // Add a period to the end of the string
          $pullQuote .= '.';
        }
        ?>
        <div class="!h-auto swiper-slide mb-sp-12">
          <div class="pb-sp-8">
            <div class="videos-testimonials-video">
              <div style="padding:177.78% 0 0 0;position:relative;" class="mb-base5-2"><iframe src="https://player.vimeo.com/video/<?= $video; ?>?&autoplay=0&loop=1&muted=1&autopause=1" frameborder="0" allow="autoplay; fullscreen; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="portrait" class="rounded-sm careers-video-js"></iframe></div>
              <script src="https://player.vimeo.com/api/player.js"></script>
            </div>
          </div>
          <div class="flex">
            <div class="h-0.5 bg-primary basis-[100%]"></div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>
    <div class="mb-sp-5 lg:mb-0">
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