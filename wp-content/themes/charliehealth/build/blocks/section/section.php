<?php
// var_dump($block);
?>

<section <?= $block['anchor'] ? 'id="' . $block['anchor'] . '"' : ''; ?> class="<?= $block['backgroundColor'] ? 'bg-' . $block['backgroundColor'] : '' ?>">
  <div class="container-small">
    <InnerBlocks />
  </div>
</section>