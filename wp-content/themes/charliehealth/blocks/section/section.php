<?php
// var_dump($block);
?>

<section class="<?= $block['backgroundColor'] ? 'bg-' . $block['backgroundColor'] : '' ?>">
  <div class="container-small">
    <InnerBlocks />
  </div>
</section>