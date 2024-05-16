<?php
get_header();

$name      = get_the_title();
$pronouns  = get_field('pronouns');
$title     = get_field('title');
$creds     = get_field('credentials');
$bio       = get_field('author_page_bio');
$expertise = get_field('areas_of_expertise');

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

<section class="section">
  <div class="container">
    <div class="inline-block mb-base5-4">
      <h4>Clinical Content Advisory Council</h4>
      <h1>Clinical reviewers</h1>
    </div>
    <div class="grid lg:grid-cols-[3fr_9fr] gap-base5-8 mb-base5-8 mt-base5-10">
      <div>
        <img src="<?= $image; ?>" srcset="<?= $imageSrcset; ?>" alt="<?= $imageAlt; ?>" class="object-cover w-full rounded-circle aspect-square">
      </div>
      <div>
        <h2><?= $name; ?>, <?= $creds; ?> <span class="text-h4-base"><?= $pronouns; ?></span></h2>
        <h3><?= $title; ?></h3>
        <div>
          <?= $bio; ?>
        </div>
      </div>
    </div>
    <div class="rounded-md bg-grey-cool p-base5-4 lg:p-[80px]">
      <h3><?= $name; ?>'s clinical areas of expertise</h3>
      <?php if ($expertise) :
        $expertise = explode(",", $expertise);
      ?>
        <div class="flex flex-wrap justify-start gap-base5-4">
          <?php foreach ($expertise as $item) : ?>
            <div class="flex bg-white rounded-pill p-base5-3 check-list-item">
              <svg width="25" height="24" viewBox="0 0 25 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="mr-base5-2">
                <path fill-rule="evenodd" clip-rule="evenodd" d="M10.3627 18.9406L10.368 18.9459L8.95379 20.3602L2.08594 13.4923L3.50015 12.0781L8.94847 17.5264L21.4964 4.97852L22.9106 6.39273L10.3627 18.9406Z" fill="#161a3d"></path>
              </svg>
              <p class="text-primary text-h4-base"><?= ucfirst(trim($item)); ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      <?php endif; ?>
    </div>
  </div>
</section>

<?php
get_footer();
