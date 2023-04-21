<?php
// var_dump($block);

include(get_template_directory() . '/helpers/spacing.php');

$containerWidth = get_field('container_width') ? '-' . get_field('container_width') : '';

// var_dump($containerWidth);
?>

<section <?= $anchor; ?>class="<?= $blockClasses; ?>">
  <div class="container<?= $containerWidth; ?>">
    <InnerBlocks />
  </div>
</section>