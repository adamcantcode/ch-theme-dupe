<?php
// var_dump($block['className']);

include(get_template_directory() . '/helpers/spacing.php');

$containerWidth = get_field('container_width') ? '-' . get_field('container_width') : '';
?>

<section <?= $anchor; ?>class="overflow-hidden <?= $blockClasses; ?> <?= !empty($block['className']) ? $block['className'] : ''; ?>">
  <div class="container<?= $containerWidth; ?>">
    <InnerBlocks />
  </div>
</section>