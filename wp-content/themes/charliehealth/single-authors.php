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
      <div class="grid items-center gap-y-sp-12 lg:gap-x-32 gap-sp-8 md:grid-cols-2">
        <div>
          <img src="<?= placeHolderImage() ?>" class="object-cover w-full rounded-md aspect-[4/3]">
        </div>
        <div class="flex flex-col">
          <h6>November 23, 2022</h6>
          <h3>
            <a href="#" class="text-h4">
              Our Country is Facing a Shortage of Mental Health Professionals. Here’s How it Impacts Youth.
            </a>
          </h3>
          <p>The United States is facing a shortage in mental health professional at the same time that it faces a rise in youth suicide rates and rates of adolescent mental illness.</p>
          <a href="#">Read more</a>
        </div>
        <div>
          <img src="<?= placeHolderImage() ?>" class="object-cover w-full rounded-md aspect-[4/3]">
        </div>
        <div class="flex flex-col">
          <h6 class="mb-sp-8">November 23, 2022</h6>
          <h3>
            <a href="#" class="text-h4">
              Our Country is Facing a Shortage of Mental Health Professionals. Here’s How it Impacts Youth.
            </a>
          </h3>
          <p>The United States is facing a shortage in mental health professional at the same time that it faces a rise in youth suicide rates and rates of adolescent mental illness.</p>
          <a href="#">Read more</a>
        </div>
        <div>
          <img src="<?= placeHolderImage() ?>" class="object-cover w-full rounded-md aspect-[4/3]">
        </div>
        <div class="flex flex-col">
          <h6>November 23, 2022</h6>
          <h3>
            <a href="#" class="text-h4">
              Our Country is Facing a Shortage of Mental Health Professionals. Here’s How it Impacts Youth.
            </a>
          </h3>
          <p>The United States is facing a shortage in mental health professional at the same time that it faces a rise in youth suicide rates and rates of adolescent mental illness.</p>
          <a href="#">Read more</a>
        </div>
        <div>
          <img src="<?= placeHolderImage() ?>" class="object-cover w-full rounded-md aspect-[4/3]">
        </div>
        <div class="flex flex-col">
          <h6 class="mb-sp-8">November 23, 2022</h6>
          <h3>
            <a href="#" class="text-h4">
              Our Country is Facing a Shortage of Mental Health Professionals. Here’s How it Impacts Youth.
            </a>
          </h3>
          <p>The United States is facing a shortage in mental health professional at the same time that it faces a rise in youth suicide rates and rates of adolescent mental illness.</p>
          <a href="#">Read more</a>
        </div>
      </div>
    </div>
  </section>
</main>

<?php
get_footer();
