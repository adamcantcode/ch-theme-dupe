<div class="container-md">
  <div id="map"></div>
  <script type="text/javascript" src="<?= site_url('/wp-content/themes/charliehealth/blocks/region-map/mapdata.js'); ?>"></script>
  <script type="text/javascript" src="<?= site_url('/wp-content/themes/charliehealth/blocks/region-map/usmap.js'); ?>"></script>
  <script>
    simplemaps_usmap.hooks.click_state = function(id) {
      alert(simplemaps_usmap_mapdata.state_specific[id].name);
    }
  </script>
  <div>
    <?php $args = array(
      'post_type'      => 'outreach-team-member',
      'numberposts'    => -1,
      'posts_per_page' => -1,
      'order'          => 'ASC',
    );

    $query = new WP_Query($args);

    if ($query->have_posts()) :
      while ($query->have_posts()) :
        $query->the_post();
        $id = get_the_ID();
        $title = get_field('title', $id);
        $state = get_field('state', $id);
        $phone = get_field('phone', $id);
        $email = get_field('email', $id);
        $headshot = get_field('headshot', $id);
        if ($headshot) {
          $altText = $headshot['alt'];
        } else {
          $altText = 'Headshot of ' . get_the_title($id);
        } ?>
        <div class="grid justify-items-start gap-sp-1">
          <div class="cursor-pointer" data-modal-id="<?= $id; ?>">
            <img src="<?= $headshot['url'] ?: site_url('/wp-content/themes/charliehealth/resources/images/placeholder/outreach-shield.png'); ?>" alt="<?= $altText; ?>" class="rounded-circle mb-sp-4 w-[240px] hover:shadow-lg duration-300">
            <h4 class="underline"><?= get_the_title(); ?></h4>
          </div>
          <h5 class="mb-0"><?= $title; ?></h5>
          <h5 class="mb-0"></h5>
          <?php if ($phone) : ?>
            <a href="tel:+<?= $phone; ?>" class="inline-block no-underline break-all">
              <h5 class="mb-0"><?= $phone; ?></h5>
            </a>
          <?php endif; ?>
          <a href="mailto:<?= $email; ?>" class="inline-block no-underline break-all">
            <h5 class="mb-0"><?= $email; ?></h5>
          </a>
        </div>
    <?php
      endwhile;
      wp_reset_postdata();
    else :
      echo 'No posts found.';
    endif; ?>
  </div>
</div>