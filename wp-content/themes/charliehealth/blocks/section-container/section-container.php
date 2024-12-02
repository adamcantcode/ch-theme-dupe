<?php
// var_dump($block['className']);

include(get_template_directory() . '/helpers/spacing.php');

$containerWidth = get_field('container_width') ? '-' . get_field('container_width') : '';
if(get_current_blog_id() !== 1) {
  $blockClasses .= ' overflow-hidden ';
}
?>

<section <?= $anchor; ?>class="<?= $blockClasses; ?> <?= !empty($block['className']) ? $block['className'] : ''; ?>">
  <div class="container<?= $containerWidth; ?>">
    <InnerBlocks />
  </div>
</section>