<?php
$image = get_field('image');
?>
<div class="relative w-full h-full lg:block noshow">
  <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="absolute bottom-0 -left-1/4">
</div>