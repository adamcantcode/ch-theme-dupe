<?php

/**
 * Scrolling CTA
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

<section <?= $anchor ?: ''; ?>class="<?= $className; ?> bg-grey-warm section-bg-js">
  <div class="section-horizontal">
    <InnerBlocks />
  </div>
  <div class="section-horizontal section-bg-js-cta">
    <div class="container-sm">
      <div class="flex flex-col justify-center pin-cta-js lg:h-[50vh] lg:mt-0 mt-sp-16 pb-sp-14 lg:pb-0">
        <div class="pin-cta-js-motion">
          <div class="flex justify-center rounded-sm lg:px-sp-14 lg:pt-sp-14 pb-sp-6 px-sp-6">
            <div class="flex flex-col items-center justify-center text-center max-w-[700px]">
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health shield logo" class="w-[3rem] mb-sp-5">
              <h2 class="text-darkest-blue lg:text-[2.5rem] text-h2-lg lg:leading-tight mb-sp-10 font-heading-serif"><?= get_field('headline'); ?></h2>
              <?php include(get_template_directory() . '/includes/button-group.php'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>