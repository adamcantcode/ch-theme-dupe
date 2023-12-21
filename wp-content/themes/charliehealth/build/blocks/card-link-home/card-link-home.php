<?php
$link = get_field('link');
$image = get_field('image');
$subhead = get_field('subhead');
?>
<div class="grid grid-cols-1 lg:grid-cols-2 gap-sp-5">
  <div>
    <h2 class="!text-[28px] !leading-[1.1]"><span class="text-[60px] leading-[1.6] block">92%</span>of clients reported improvements in symptoms associated with depression</h2>
    <?php include(get_template_directory() . '/includes/button-group.php'); ?>
  </div>
  <div>
    <div class="bg-primary-200 rounded-[16px] grid grid-cols-[1fr_2fr] py-sp-12 px-sp-8 gap-sp-8 items-end">
      <div>
        <img src="https://placehold.co/147x190" alt="" class="rounded-[3px] shadow-[5px_5px_0_white]">
      </div>
      <div>
        <h3 class="text-white font-heading text-[28px] leading-[1.1] mb-[14px]">Charlie Health’s Annual Outcomes Report</h3>
        <p class="mb-0 text-white text-[14px] leading-[1.4]">Read more about our latest clinical research and industry-leading outcomes</p>
      </div>
    </div>
  </div>
</div>