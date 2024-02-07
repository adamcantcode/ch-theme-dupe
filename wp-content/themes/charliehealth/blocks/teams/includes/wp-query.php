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
    <img src="<?= $featuredImage[0]; ?>" alt="<?= $featuredImageAltText; ?>" class="mb-5 rounded-circle">
    <p class="text-h4-base"><?= get_the_title($postID); ?></p>
    <p class="text-p-base"><?= $title; ?></p>
  </div>
</div>