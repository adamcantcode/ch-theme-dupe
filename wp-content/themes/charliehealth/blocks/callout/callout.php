<?php
// TODO Figure out why field is not loading
$icon = get_field('callout_icon');
?>

<div class="grid items-center grid-cols-1 gap-4 md:gap-32 md:grid-cols-2 last:mb-0 md:mb-sp-14 mb-sp-12">
  <!-- <img src="<?php // site_url('/wp-content/themes/charliehealth/resources/images/icons/' . $icon . '.svg'); ?>" alt="icon of <?php // $icon; ?>" class="self-center flex-grow order-1 object-cover lg:order-2 justify-self-center"> -->
  <div class="flex-grow">
    <InnerBlocks />
  </div>
  <div class="grid justify-items-center">
    <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/computer.svg'); ?>" alt="icon of computer" class="object-cover my-sp-4">
      <?php include(get_template_directory() . '/includes/button-group.php'); ?>
  </div>
</div>