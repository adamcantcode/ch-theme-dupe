<?php

/**
 * NAME Block Template.
 *
 */

// Support custom "anchor" values.
if (!empty($block['anchor'])) {
  $anchor = 'id="' . esc_attr($block['anchor']) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'NAME-block';
if (!empty($block['className'])) {
  $class_name .= ' ' . esc_attr($block['className']);
}
if (!empty($block['align'])) {
  $class_name .= ' align' . esc_attr($block['align']);
}

// Get fields
$padding = get_field('padding');
$margin = get_field('margin');

?>
<section <?= $anchor ?: ''; ?>class="<?= $class_name . ' ' . $padding ?: '' . ' ' . $margin ?: ''; ?> " style="<?= $style; ?>">

</section>