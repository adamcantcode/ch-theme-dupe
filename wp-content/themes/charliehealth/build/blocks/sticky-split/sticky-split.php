<?php

/**
 * Sticky Split Block Template.
 *
 */

// Support custom "anchor" values.
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'sticky-split-block';
if (!empty($block['className'])) {
  $className .= ' ' . esc_attr($block['className']);
}
if (!empty($block['align'])) {
  $className .= ' align' . esc_attr($block['align']);
}

// Get fields
$image = get_field('sticky_split_image');
?>
<div <?= $anchor ?: ''; ?>class="<?= $className; ?> relative grid lg:grid-cols-2 lg:gap-sp-16 gap-sp-8" style="<?= $style; ?>">
  <div class="lg:sticky self-start top-[8rem] stick-split-image">
    <img src="<?= $image['url'] ?>" alt="<?= $image['alt'] ?>" class="rounded-md lg:max-h-full max-h-[300px] w-full object-cover">
  </div>
  <div class="sticky-split-info">
    <?php if (have_rows('sticky_split_content')) : ?>
      <?php while (have_rows('sticky_split_content')) : the_row(); ?>
        <?php
        $icon = get_sub_field('sticky_split_icon');
        $heading = get_sub_field('sticky_split_heading');
        $details = get_sub_field('sticky_split_details');
        ?>
        <div class="sticky-split-info_content lg:mb-[12rem]">
          <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/' . $icon . '.svg'); ?>" alt="icon" class="sticky-split-icon mb-sp-8">
          <h3 class="text text-h1-display"><?= $heading; ?></h3>
          <p><?= $details; ?></p>
        </div>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
</div>