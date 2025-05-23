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
$className = '';
if (!empty($block['align'])) {
  $className .= ' align' . esc_attr($block['align']);
}
$background = 'bg-grey-warm';
if (!empty($block['backgroundColor'])) {
  $background = 'bg-' . $block['backgroundColor'];
  if ($background === 'bg-darker-blue') {
    $blockClasses .= '[&_*]:text-white ';
  }
}
?>

<section <?= $anchor ?: ''; ?>class="<?= $className; ?> <?= $background; ?> section-bg-js">
  <div class="section-top">
    <div class="container">
      <InnerBlocks />
    </div>
  </div>
  <div class="section-bottom section-bg-js-cta">
    <div class="container">
      <div class="flex flex-col justify-center pin-cta-js lg:h-[50vh] lg:mt-0 mt-sp-16 pb-sp-14 lg:pb-0">
        <div class="pin-cta-js-motion">
          <div class="flex justify-center rounded-sm lg:px-sp-14 lg:pt-sp-14 pb-sp-6 px-sp-6">
            <div class="flex flex-col items-center justify-center text-center max-w-[720px]">
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health shield logo" class="w-[3rem] mb-sp-5">
              <p class="text-h2-base"><?= get_field('heading'); ?></p>
              <?php if (!empty(get_field('subhead'))) : ?>
                <p class="text-h3-base mb-base5-5"><?= get_field('subhead'); ?></p>
              <?php endif; ?>
              <?php include(get_template_directory() . '/includes/button-group.php'); ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>