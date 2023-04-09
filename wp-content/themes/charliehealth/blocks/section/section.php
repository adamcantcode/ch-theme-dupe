<?php
// var_dump($block);
// TODO find a better solution
// fall back JIT
$test = 'bg-light-purple';
?>

<section <?= $block['anchor'] ? 'id="' . $block['anchor'] . '"' : ''; ?> class="<?= $block['backgroundColor'] ? 'bg-' . $block['backgroundColor'] : '' ?> ">
  <div class="container-small">
    <InnerBlocks />
  </div>
</section>