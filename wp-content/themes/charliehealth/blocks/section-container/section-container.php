<?php
// var_dump($block);

include(get_template_directory() . '/helpers/spacing.php');

$containerWidth = get_field('container_width') ? '-' . get_field('container_width') : '';
?>

<section <?= $anchor; ?>class="<?= $blockClasses; ?>">
  <div class="container<?= $containerWidth; ?>">
    <InnerBlocks />
  </div>
</section>