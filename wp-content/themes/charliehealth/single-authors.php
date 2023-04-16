<?php
get_header();

$bio      = get_field('bio');
$email    = get_field('email');
$twitter  = get_field('twitter');
$facebook = get_field('facebook');
$linkedin = get_field('linkedin');

var_dump($linkedin);

$image = get_the_post_thumbnail_url();

if ($image) {
  $imageID = get_post_thumbnail_id();
  $imageSrcset = wp_get_attachment_image_srcset($imageID, 'medium');
  $imageAlt = get_post_meta($imageID, '_wp_attachment_image_alt', true);
}

?>

<main class="site-main lg:mt-[68px] mt-0">
  <section class="section">
    <div class="container">
      <h1 class="mb-sp-12">Authors</h1>
      <div class="grid gap-32 lg:grid-cols-2">
        <div class="">
          <img src="<?= $image; ?>" srcset="<?= $imageSrcset; ?>" alt="<?= $imageAlt; ?>" class="object-cover rounded-md aspect-square">
        </div>
        <div>
          <h2><?= get_the_title(); ?></h2>
          <?= $bio; ?>
          <div class="social">
            <?php if ($twitter) : ?>
              <a href="<?= $twitter; ?>">
                <img src="<?= site_url() . '/wp-content/themes/charliehealth/resources/images/social-logos/twitter.svg'; ?>" class="w-[25px] h-[25px]" />
              </a>
            <?php endif; ?>
            <?php if ($facebook) : ?>
              <a href="<?= $facebook; ?>">
                <img src="<?= site_url() . '/wp-content/themes/charliehealth/resources/images/social-logos/facebook.svg'; ?>" class="w-[25px] h-[25px]" />
              </a>
            <?php endif; ?>
            <?php if ($linkedin) : ?>
              <a href="<?= $linkedin; ?>">
                <img src="<?= '/wp-content/themes/charliehealth/resources/images/social-logos/linkedin.svg'; ?>" class="w-[25px] h-[25px]" />
              </a>
            <?php endif; ?>
            <?php if ($instagram) : ?>
              <a href="<?= $instagram; ?>">
                <img src="<?= site_url() . '/wp-content/themes/charliehealth/resources/images/social-logos/instagram.svg'; ?>" class="w-[25px] h-[25px]" />
              </a>
            <?php endif; ?>
          </div>
        </div>
      </div>
      <div class="divider"></div>
    </div>
  </section>
  <section class="section">
    <div class="container">
    </div>
  </section>
</main>

<?php
get_footer();
