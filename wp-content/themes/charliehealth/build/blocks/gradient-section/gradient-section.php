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
if (!empty($block['className'])) {
  $className .= ' ' . esc_attr($block['className']);
}
// $background = 'bg-grey-warm';
// if (!empty($block['backgroundColor'])) {
//   $background = 'bg-' . $block['backgroundColor'];
//   if ($background === 'bg-darker-blue') {
//     $blockClasses .= '[&_*]:text-white ';
//   }
// }
?>

<section <?= $anchor ?: ''; ?>class="<?= $className; ?> bg-primary section-bg-bg-js">
  <InnerBlocks />
</section>