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
  $imageSrcset = wp_get_attachment_image_srcset($imageID, 'featured-large');
  $imageAlt = get_post_meta($imageID, '_wp_attachment_image_alt', true);
} else {
  $image = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
  $imageAlt = 'Charlie Health Logo';
}

?>

<section class="!pb-0 section">
  <div class="container">
    <h1 class="mb-sp-12">Authors</h1>
    <div class="grid lg:grid-cols-[4.25fr_5fr] lg:gap-[10rem] gap-sp-8">
      <img src="<?= $image; ?>" srcset="<?= $imageSrcset; ?>" alt="<?= $imageAlt; ?>" class="object-cover w-full rounded-md aspect-square">
      <div>
        <h2><?= get_the_title(); ?></h2>
        <?= $bio; ?>
        <div class="social">
          <?php if ($twitter) : ?>
            <a href="<?= $twitter; ?>" target="_blank">
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/twitter.svg'); ?>" alt="Twitter logo" class="w-[25px] h-[25px]" />
            </a>
          <?php endif; ?>
          <?php if ($facebook) : ?>
            <a href="<?= $facebook; ?>" target="_blank">
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/facebook.svg'); ?>" alt="Facebook logo" class="w-[25px] h-[25px]" />
            </a>
          <?php endif; ?>
          <?php if ($linkedin) : ?>
            <a href="<?= $linkedin; ?>" target="_blank">
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/social-logos/linkedin.svg'); ?>" alt="LinkedIn logo" class="w-[25px] h-[25px]" />
            </a>
          <?php endif; ?>
          <!-- TODO add email -->
        </div>
      </div>
    </div>
  </div>
</section>
<section id="postsContainer" class="section bg-grey-warm">
  <div class="container">
    <h2 class="mb-sp-12">Articles by <?= get_the_title(); ?></h2>
    <div class="absolute invisible opacity-0 no-posts-js">
      <div class="grid items-center grid-cols-1 duration-300 rounded-md justify-items-center bg-cream lg:grid-cols-2 p-sp-4">
        <h4 class="mb-0">We couldn’t find what you’re looking for.</h4>
        <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/not-found.svg'); ?>" alt="not found icon">
      </div>
    </div>
    <div class="grid lg:grid-cols-3 transition-all duration-300 scale-[0.99] opacity-0 posts-container gap-x-sp-8 gap-y-sp-10 mb-sp-10">
      <!-- Content -->
    </div>
    <div class="pagination-container"></div>
  </div>
</section>
<section id="postsContainerResearch" class="section bg-grey-warm">
  <div class="container">
    <h2 class="mb-sp-12">Research Articles by <?= get_the_title(); ?></h2>
    <div class="absolute invisible opacity-0 no-posts-js-research">
      <div class="grid items-center grid-cols-1 duration-300 rounded-md justify-items-center bg-cream lg:grid-cols-2 p-sp-4">
        <h4 class="mb-0">We couldn’t find what you’re looking for.</h4>
        <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/not-found.svg'); ?>" alt="not found icon">
      </div>
    </div>
    <div class="grid lg:grid-cols-3 transition-all duration-300 scale-[0.99] opacity-0 posts-container-research gap-x-sp-8 gap-y-sp-10 mb-sp-10">
      <!-- Content -->
    </div>
    <div class="pagination-container-research"></div>
  </div>
</section>

<?php
get_footer();
