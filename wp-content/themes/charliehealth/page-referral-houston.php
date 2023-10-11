<?php
/*
Template Name: Referral - Houston
Template Post Type: page
*/
?>

<?php get_header(); ?>

<?php

$title = get_the_title();

if (strpos($title, "Referrals &#8211; ") === 0) {
  $title = str_replace("Referrals &#8211; ", "", $title);
} else {
  $title = $title;
}
?>

<section class="section">
  <div class="container">
    <div><?= get_field('form_code'); ?></div>
  </div>
</section>

<?php get_footer(); ?>