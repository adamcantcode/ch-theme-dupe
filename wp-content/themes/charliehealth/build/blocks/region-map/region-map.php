<?php

?>
<div class="grid lg:grid-cols-[1fr_2fr]">
  <?php
  $args = array(
    'post_type' => 'outreach-team-member',
    'meta_key'      => 'is_director',
    'meta_value'    => '1'
  );

  $query = new WP_Query($args);
  ?>
  <div class="order-2 lg:order-1">
    <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
        <?php
        $region = get_field('region', get_the_ID());
        $title = get_field('title', get_the_ID());
        $email = get_field('email', get_the_ID());
        $phone = get_field('phone', get_the_ID());
        ?>
        <div class="border rounded-md border-card-border lg:p-sp-8 p-sp-4 hover:shadow-[inset_0_0_0_2px_#1d225f] shadow-[inset_0_0_0_2px_transparent] duration-300 relative">
          <h4><a href="<?= site_url('region/' . $region[0]->post_name); ?>" class="stretched-link"><?= $region[0]->post_title; ?></a></h4>
          <h5><?= get_the_title(); ?></h5>
          <h5><a href="mailto:<?= $email; ?>" class="relative z-10"><?= $email; ?></a></h5>
          <h5 class="mb-0"><a href="tel:+<?= $phone; ?>" class="relative z-10"><?= $phone; ?></a></h5>
        </div>
    <?php endwhile;
      wp_reset_postdata();
    endif; ?>
  </div>
  <div id="map" class="order-1 lg:order-2"></div>
</div>
<script type="text/javascript" src="<?= site_url('/wp-content/themes/charliehealth/blocks/region-map/mapdata.js'); ?>"></script>
<script type="text/javascript" src="<?= site_url('/wp-content/themes/charliehealth/blocks/region-map/usmap.js'); ?>"></script>