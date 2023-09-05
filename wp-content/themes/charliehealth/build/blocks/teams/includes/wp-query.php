<?php
if ($entireDivision) {
  $postID = get_the_id();
} else {
  $postID = $post;
}
$title = get_field('job_title', $postID);
$featuredImageID = get_post_thumbnail_id();
$featuredImage = wp_get_attachment_image_src($featuredImageID, 'card-thumb');
$featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);
$featuredImageAltText = $featuredImageAltText ?: 'Headshot of ' . get_the_title($postID);
?>
<div class="grid justify-items-start gap-sp-1">
  <div>
    <img src="<?= $featuredImage[0]; ?>" alt="<?= $featuredImageAltText; ?>" class="rounded-[50%] mb-5">
    <h4 class="mb-sp-2"><?= get_the_title($postID); ?></h4>
    <h5><?= $title; ?></h5>
  </div>
  <?php /*; ?>
  <h5><?= $state; ?></h5>
  <a href="tel:+<?= $phone; ?>" class="inline-block no-underline break-all">
    <h5><?= $phone; ?></h5>
  </a>
  <a href="mailto:<?= $email; ?>" class="inline-block no-underline break-all">
    <h5><?= $email; ?></h5>
  </a>
  <?php */ ?>
</div>