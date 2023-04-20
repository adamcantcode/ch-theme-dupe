<?php
// var_dump($block);

include(get_template_directory().'/helpers/spacing.php');

// var_dump($padding);
// var_dump($margin);
?>

<section <?= $block['anchor'] ? 'id="' . $block['anchor'] . '"' : ''; ?> class="<?= $block['backgroundColor'] ? 'bg-' . $block['backgroundColor'] : '' ?> <?= $paddingClass; ?>">
  <div class="container">
    <InnerBlocks />
  </div>
</section>