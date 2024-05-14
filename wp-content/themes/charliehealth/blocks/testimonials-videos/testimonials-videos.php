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

<section <?= $anchor ?: ''; ?>class="<?= $className; ?> section">
  <div class="container">
    <div class="grid lg:grid-cols-[1fr_2fr] grid-cols-1 gap-base5-4">
      <div class="lg:w-[410px]">
        <InnerBlocks />
      </div>
      <div>
        <?php if (have_rows('testimonials')) :  ?>
          <div class="swiper swiper-videos-testimonial">
            <div class="container lg:px-sp-10 swiper-wrapper px-[20px]">
              <?php while (have_rows('testimonials')) : the_row(); ?>
                <?php
                $video     = get_sub_field('video_code');
                $name      = get_sub_field('name');
                $title     = get_sub_field('title');
                $pullQuote = get_sub_field('pull_quote');
                $linkedIn  = get_sub_field('linkedin');
                ?>
                <div class="!h-auto swiper-slide mb-sp-12">
                  <div class="grid gap-sp-8 pb-sp-8 lg:grid-cols-[3fr_4.5fr]">
                    <div class="videos-testimonials-video">
                      <div style="padding:177.78% 0 0 0;position:relative;" class="mb-base5-2"><iframe src="https://player.vimeo.com/video/<?= $video; ?>?&autoplay=0&loop=1&muted=1&autopause=1" frameborder="0" allow="autoplay; fullscreen; clipboard-write" style="position:absolute;top:0;left:0;width:100%;height:100%;" title="portrait" class="rounded-sm careers-video-js"></iframe></div>
                      <script src="https://player.vimeo.com/api/player.js"></script>
                    </div>
                    <div class="videos-testimonials-panel">
                      <div>
                        <p class="text-h3-base font-heading lg:mb-base5-10 pb-base5-6">“<?= $pullQuote; ?>”</p>
                        <p class="text-h3-base mb-base5-1"><?= $name; ?></p>
                        <p class="mb-base5-1"><?= $title; ?></p>
                        <?php if ($linkedIn) : ?>
                          <div class="relative inline-block">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none" viewBox="0 0 25 25">
                              <path fill="#161A3D" d="M23.1494 0H1.8457C.825195 0 0 .805664 0 1.80176V23.1934C0 24.1895.825195 25 1.8457 25h21.3037C24.1699 25 25 24.1895 25 23.1982V1.80176C25 .805664 24.1699 0 23.1494 0ZM7.41699 21.3037H3.70605V9.37012h3.71094V21.3037ZM5.56152 7.74414c-1.1914 0-2.15332-.96191-2.15332-2.14844 0-1.18652.96192-2.14843 2.15332-2.14843 1.18653 0 2.14844.96191 2.14844 2.14843 0 1.18164-.96191 2.14844-2.14844 2.14844ZM21.3037 21.3037h-3.706v-5.8008c0-1.3818-.0245-3.164-1.9288-3.164-1.9287 0-2.2216 1.5088-2.2216 3.0664v5.8984H9.74609V9.37012h3.55471V11.001h.0488c.4932-.9375 1.7041-1.92873 3.5059-1.92873 3.7549 0 4.4482 2.47073 4.4482 5.68363v6.5478Z" />
                            </svg>
                            <a href="<?= $linkedIn; ?>" target="_blank" class="stretched-link"></a>
                          </div>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                  <div class="flex">
                    <div class="h-0.5 bg-primary basis-[100%]"></div>
                  </div>
                </div>
              <?php endwhile; ?>
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
      </div>
    </div>
  </div>
</section>