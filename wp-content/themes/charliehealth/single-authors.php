<?php
get_header();

$bio      = get_field('bio');
$email    = get_field('email');
$twitter  = get_field('twitter');
$facebook = get_field('facebook');
$linkedin = get_field('linkedin');

$image = get_the_post_thumbnail_url();

if ($image) {
  $imageID = get_post_thumbnail_id();
  $imageSrcset = wp_get_attachment_image_srcset($imageID, 'medium');
  $imageAlt = get_post_meta($imageID, '_wp_attachment_image_alt', true);
}

?>

<main class="site-main lg:mt-[68px] mt-0">
  <section class="!pb-0 section">
    <div class="container">
      <h1 class="mb-sp-12">Authors</h1>
      <div class="grid lg:gap-32 gap-sp-8 md:grid-cols-2">
        <img src="<?= $image; ?>" srcset="<?= $imageSrcset; ?>" alt="<?= $imageAlt; ?>" class="object-cover w-full rounded-md aspect-square">
        <div>
          <h2><?= get_the_title(); ?></h2>
          <?= $bio; ?>
          <div class="social">
            <?php if ($twitter) : ?>
              <a href="<?= $twitter; ?>" target="_blank">
                <img src="<?= site_url() . '/wp-content/themes/charliehealth/resources/images/social-logos/twitter.svg'; ?>" class="w-[25px] h-[25px]" />
              </a>
            <?php endif; ?>
            <?php if ($facebook) : ?>
              <a href="<?= $facebook; ?>" target="_blank">
                <img src="<?= site_url() . '/wp-content/themes/charliehealth/resources/images/social-logos/facebook.svg'; ?>" class="w-[25px] h-[25px]" />
              </a>
            <?php endif; ?>
            <?php if ($linkedin) : ?>
              <a href="<?= $linkedin; ?>" target="_blank">
                <img src="<?= '/wp-content/themes/charliehealth/resources/images/social-logos/linkedin.svg'; ?>" class="w-[25px] h-[25px]" />
              </a>
            <?php endif; ?>
            <!-- TODO add email -->
          </div>
        </div>
      </div>
      <div class="divider lg:mt-sp-16 md:mt-sp-12 mt-sp-8"></div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <h2 class="mb-sp-12">Articles by <?= get_the_title(); ?></h2>
      <?php
      $args = array(
        'post_type' => 'post',
        'meta_query' => array(
          array(
            'key' => 'by_author', // name of custom field
            'value' => get_the_ID(), // matches exactly "123", not just 123. This prevents a match for "1234"
            'compare' => 'LIKE'
          )
        )
      );
      $query = new WP_Query($args);
      var_dump($query);
      if ($query->have_posts()) {
        while ($query->have_posts()) {
          $query->the_post();
          // Display or process the posts here
          the_title();
        }
        wp_reset_postdata();
      } else {
        // No posts found
      }
      ?>
    </div>
  </section>
</main>

<?php
get_footer();
