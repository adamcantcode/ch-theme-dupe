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
$quotes = get_field('quotes');
?>

<section <?= $anchor ?: ''; ?>class="<?= $className; ?> testimonial-padding bg-grey-warm section-bg-js">
  <?php if (have_rows('testimonials')) :  ?>
    <div class="swiper swiper-careers-testimonial <?= $quotes ? '' : 'no-quotes'; ?>">
      <div class="container lg:px-sp-10 swiper-wrapper px-[20px]">
        <?php while (have_rows('testimonials')) : the_row(); ?>
          <?php
          $image      = get_sub_field('image');
          $name       = get_sub_field('name');
          $title      = get_sub_field('title');
          $pullQuote  = get_sub_field('pull_quote');
          $fullQuote  = get_sub_field('full_quote');
          $linkedIn   = get_sub_field('linkedin');
          $instagram  = get_sub_field('instagram');
          ?>
          <div class="!h-auto swiper-slide mb-sp-12">
            <div class="flex !h-full gap-sp-8 pb-sp-8 lg:flex-row flex-col">
              <div class="text-center bg-white p-base5-5 rounded-lg careers-testimonial-image self-start <?= $quotes ? 'lg:basis-[33%]' : '' ?>">
                <img src="<?= $image['url'] ?: placeHolderImage(); ?>" alt="<?= $image['alt']; ?>" class="object-cover rounded-circle aspect-square mb-sp-6">
                <p class="font-heading-serif mb-base5-1"><?= $name; ?></p>
                <p><?= $title; ?></p>
                <?php if ($linkedIn) : ?>
                  <div class="relative inline-block mt-base5-2 ml-base5-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none" viewBox="0 0 25 25">
                      <path fill="#ADB0E1" d="M23.1494 0H1.8457C.825195 0 0 .805664 0 1.80176V23.1934C0 24.1895.825195 25 1.8457 25h21.3037C24.1699 25 25 24.1895 25 23.1982V1.80176C25 .805664 24.1699 0 23.1494 0ZM7.41699 21.3037H3.70605V9.37012h3.71094V21.3037ZM5.56152 7.74414c-1.1914 0-2.15332-.96191-2.15332-2.14844 0-1.18652.96192-2.14843 2.15332-2.14843 1.18653 0 2.14844.96191 2.14844 2.14843 0 1.18164-.96191 2.14844-2.14844 2.14844ZM21.3037 21.3037h-3.706v-5.8008c0-1.3818-.0245-3.164-1.9288-3.164-1.9287 0-2.2216 1.5088-2.2216 3.0664v5.8984H9.74609V9.37012h3.55471V11.001h.0488c.4932-.9375 1.7041-1.92873 3.5059-1.92873 3.7549 0 4.4482 2.47073 4.4482 5.68363v6.5478Z" />
                    </svg>
                    <a href="<?= $linkedIn; ?>" target="_blank" class="stretched-link"></a>
                  </div>
                <?php endif; ?>
                <?php if ($instagram) : ?>
                  <div class="relative inline-block mt-base5-2 ml-base5-2">
                    <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="none" viewBox="0 0 25 25">
                      <path fill="#ADB0E1" d="M12.5 2.25098c3.3398 0 3.7354.01464 5.0488.07324 1.2207.05371 1.8799.25879 2.3194.42969.581.22461 1.0009.49804 1.4355.93261.4395.43946.708.8545.9326 1.43555.1709.43945.376 1.10352.4297 2.31934.0586 1.31836.0733 1.71386.0733 5.04879 0 3.3399-.0147 3.7354-.0733 5.0489-.0537 1.2207-.2588 1.8798-.4297 2.3193-.2246.5811-.498 1.001-.9326 1.4355-.4394.4395-.8545.7081-1.4355.9327-.4395.1709-1.1036.3759-2.3194.4297-1.3183.0585-1.7138.0732-5.0488.0732-3.33984 0-3.73535-.0147-5.04883-.0732-1.2207-.0538-1.87988-.2588-2.31933-.4297-.58106-.2246-1.00098-.4981-1.43555-.9327-.43945-.4394-.70801-.8544-.93262-1.4355-.1709-.4395-.37597-1.1035-.42969-2.3193-.05859-1.3184-.07324-1.7139-.07324-5.0489 0-3.33981.01465-3.73532.07324-5.04879.05372-1.22071.25879-1.87989.42969-2.31934.22461-.58105.49805-1.00098.93262-1.43555.43945-.43945.85449-.708 1.43555-.93261.43945-.1709 1.10351-.37598 2.31933-.42969 1.31348-.0586 1.70899-.07324 5.04883-.07324ZM12.5 0C9.10645 0 8.68164.0146484 7.34863.0732422 6.02051.131836 5.10742.34668 4.31641.654297c-.8252.322265-1.52344.747073-2.2168 1.445313-.69824.69336-1.123048 1.3916-1.445313 2.21191-.307617.7959-.522461 1.7041-.5810548 3.03223C.0146484 8.68164 0 9.10645 0 12.5c0 3.3936.0146484 3.8184.0732422 5.1514.0585938 1.3281.2734378 2.2412.5810548 3.0322.322265.8252.747073 1.5234 1.445313 2.2168.69336.6934 1.3916 1.123 2.21191 1.4404.7959.3076 1.7041.5225 3.03223.5811 1.33301.0586 1.75781.0732 5.15135.0732 3.3936 0 3.8184-.0146 5.1514-.0732 1.3281-.0586 2.2412-.2735 3.0322-.5811.8203-.3174 1.5186-.747 2.2119-1.4404.6934-.6934 1.1231-1.3916 1.4405-2.2119.3076-.7959.5224-1.7041.581-3.0322.0586-1.3331.0733-1.7579.0733-5.1514 0-3.39357-.0147-3.81838-.0733-5.15138-.0586-1.32813-.2734-2.24121-.581-3.03223-.3077-.83008-.7325-1.52832-1.4307-2.22168-.6934-.69336-1.3916-1.123047-2.2119-1.44043-.7959-.307618-1.7041-.522461-3.0323-.581055C16.3184.0146484 15.8936 0 12.5 0Z" />
                      <path fill="#ADB0E1" d="M12.499 6.0791c-3.5449 0-6.42088 2.87598-6.42088 6.4209 0 3.5449 2.87598 6.4209 6.42088 6.4209s6.4209-2.876 6.4209-6.4209c0-3.54492-2.876-6.4209-6.4209-6.4209Zm0 10.5859c-2.2998 0-4.16502-1.8652-4.16502-4.165 0-2.2998 1.86522-4.16504 4.16502-4.16504 2.2998 0 4.1651 1.86524 4.1651 4.16504 0 2.2998-1.8653 4.165-4.1651 4.165ZM20.6738 5.8252c0 .83008-.6738 1.49902-1.499 1.49902-.8301 0-1.499-.67383-1.499-1.49902 0-.83008.6738-1.49903 1.499-1.49903.8252 0 1.499.67383 1.499 1.49903Z" />
                    </svg>
                    <a href="<?= $instagram; ?>" target="_blank" class="stretched-link"></a>
                  </div>
                <?php endif; ?>
              </div>
              <?php if ($quotes) : ?>
                <div class="careers-testimonials-panel lg:basis-[55%]">
                  <p class="text-h3-base font-heading-serif"><?= $pullQuote; ?></p>
                  <p><?= $fullQuote; ?></p>
                </div>
              <?php endif; ?>
            </div>
            <div class="flex swiper-careers-testimonial-border">
              <div class="h-[1.5px] bg-primary basis-[100%]"></div>
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
</section>