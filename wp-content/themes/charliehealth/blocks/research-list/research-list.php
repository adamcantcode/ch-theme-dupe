<?php

/**
 * Sticky Split Block Template.
 *
 */

// Support custom "anchor" values.
$anchor = '';
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'sticky-split-block';
if (!empty($block['className'])) {
  $className .= ' ' . esc_attr($block['className']);
}

/** Fields */
$heading = get_field('heading');
$subhead = get_field('subhead');
$image = get_field('image');
$articles = get_field('articles');
?>
<div <?= $anchor ?: ''; ?>class="<?= $className; ?> relative grid lg:grid-cols-[1fr_2fr] lg:gap-sp-16 gap-sp-8">
  <div class="lg:sticky self-start top-[8rem]">
    <h2><?= $heading; ?></h2>
    <p><?= $subhead; ?></p>
    <?php if ($image) : ?>
      <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="lg:w-[300px] w-full">
    <?php endif; ?>
  </div>
  <div class="sticky-split-info">
    <div class="bg-primary w-full h-[1px]"></div>
    <?php if (have_rows('articles')) : while (have_rows('articles')) : the_row(); ?>
        <?php
        $link = get_sub_field('article_links');
        ?>
        <a href="<?= $link['url']; ?>" target="<?= $link['target']; ?>" class="font-heading text-[20px] leading-[1.4] mb-0 inline-block font-normal no-underline text-primary py-sp-6"><?= $link['title']; ?> <svg width="17" height="14" viewBox="0 0 17 14" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline-block align-[initial] ml-sp-2">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3431 0.278417L16.7071 6.32784C17.0976 6.69906 17.0976 7.30094 16.7071 7.67216L10.3431 13.7216C9.95262 14.0928 9.31946 14.0928 8.92893 13.7216C8.53841 13.3504 8.53841 12.7485 8.92893 12.3773L13.5858 7.95058H0V6.04942H13.5858L8.92893 1.62273C8.53841 1.25151 8.53841 0.64964 8.92893 0.278417C9.31946 -0.0928058 9.95262 -0.0928058 10.3431 0.278417Z" fill="#161A3D" />
          </svg>
        </a>
        <div class="bg-primary w-full h-[1px]"></div>
    <?php endwhile;
    endif; ?>
  </div>
</div>