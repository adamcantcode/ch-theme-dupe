<?php
$image = get_field('image');
?>

<div class="grid grid-cols-1 lg:grid-cols-6 gap-sp-5">
  <div>
    <h2>Meet our providers</h2>
    <?php include(get_template_directory() . '/includes/button-group.php'); ?>
  </div>
  <div class="bg-white rounded-[6px] py-sp-4 px-sp-3">
    <img src="https://placehold.co/400x400" alt="" class="object-cover w-full h-[162px] aspect-square mb-sp-6">
    <p class="font-heading-serif mb-[10px]">Dr. Caroline Fenkel, DSW, LCSW</p>
    <p class="mb-0">Chief Clinical Officer & Co-Founder</p>
  </div>
</div>