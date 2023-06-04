<?php
/*
Template Name: Referral - No Front
Template Post Type: page
*/
?>

<?php get_header(); ?>

<main id="primary" class="site-main mt-[68px]">
  <section class="section">
    <div class="container">
      <div class="grid lg:grid-cols-2">
        <h1><?= get_the_title(); ?></h1>
        <p>Charlie Health welcomes the opportunity to partner with you to provide excellent care to your patients.</p>
      </div>
    </div>
  </section>
  <section class="section-horizontal">
    <div class="container">
      <div class="divider"></div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <div><?= get_field('form_code'); ?></div>
    </div>
  </section>
</main>

<?php get_footer(); ?>