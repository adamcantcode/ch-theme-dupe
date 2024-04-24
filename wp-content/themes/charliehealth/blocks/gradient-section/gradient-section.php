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
  <InnerBlocks />
</section>