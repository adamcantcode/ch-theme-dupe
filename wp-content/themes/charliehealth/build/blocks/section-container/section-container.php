<?php
// var_dump($block);

include(get_template_directory().'/helpers/spacing.php');

// var_dump($block['style']['spacing']['padding']);
?>

<section <?= $anchor; ?>class="<?= $blockClasses; ?>">
  <div class="container">
    <InnerBlocks />
  </div>
</section>