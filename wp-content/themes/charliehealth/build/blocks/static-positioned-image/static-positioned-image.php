<?php
$image = get_field('image');
$x = get_field('x_position');
$y = get_field('y_position');
?>
<div class="relative w-full h-full lg:block noshow min-h-[1px]">
  <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="absolute" style="left: <?= $x; ?>%; bottom:<?= $y; ?>%">
</div>