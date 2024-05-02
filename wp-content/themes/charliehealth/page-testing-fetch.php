<?php
/*
Template Name: Testing fetch
Template Post Type: page
*/
?>

<?php get_header(); ?>

<?php

$data = get_option('my_api_data');

?>

<script>
  const stateInsuranceData = <?= $data; ?>;
  console.log(stateInsuranceData)
</script>

<?php get_footer(); ?>