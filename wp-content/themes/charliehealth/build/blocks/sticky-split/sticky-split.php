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
$padding = get_field('padding');
$margin = get_field('margin');

?>
<div <?= $anchor ?: ''; ?>class="<?= $className . ' ' . $padding ?: '' . ' ' . $margin ?: ''; ?> relative grid lg:grid-cols-2 lg:gap-sp-16 gap-sp-8" style="<?= $style; ?>">
  <div class="lg:sticky self-start top-[8rem] stick-split-image">
    <img src="https://assets-global.website-files.com/62daf9ae3616b86eec143652/63093458711e96d6fe900115_new%20hp.webp" alt="#" class="rounded-md lg:max-h-full max-h-[300px] w-full object-cover">
  </div>
  <div class="sticky-split-info">
    <div class="sticky-split-info_content lg:mb-[12rem]">
      <img src="https://placehold.it/40x40" alt="#" class="sticky-split-icon">
      <h3 class="text text-h1-display">Lorem, ipsum dolor.</h3>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam, voluptas quis iusto suscipit, accusantium dolorum beatae quaerat alias quam obcaecati, quas distinctio. Unde, aliquam amet.</p>
    </div>
    <div class="sticky-split-info_content lg:mb-[12rem]">
      <img src="https://placehold.it/40x40" alt="#" class="sticky-split-icon">
      <h3 class="text text-h1-display">Lorem, ipsum dolor.</h3>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam, voluptas quis iusto suscipit, accusantium dolorum beatae quaerat alias quam obcaecati, quas distinctio. Unde, aliquam amet.</p>
    </div>
    <div class="sticky-split-info_content lg:mb-[12rem]">
      <img src="https://placehold.it/40x40" alt="#" class="sticky-split-icon">
      <h3 class="text text-h1-display">Lorem, ipsum dolor.</h3>
      <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Aperiam, voluptas quis iusto suscipit, accusantium dolorum beatae quaerat alias quam obcaecati, quas distinctio. Unde, aliquam amet.</p>
    </div>
  </div>
</div>