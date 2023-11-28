<?php
/*
Template Name: Referral - Cali
Template Post Type: page
*/
?>

<?php get_header();  ?>

<section class="section-top">
  <div class="container">
    <div class="text-center">
      <h1 class="mb-0">Charlie Cares</h1>
    </div>
  </div>
</section>
<section class="section">
  <div class="container">
    <div><?= get_field('form_code'); ?></div>
  </div>
</section>

<?php get_footer(); ?>