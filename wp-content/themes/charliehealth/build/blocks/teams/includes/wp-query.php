<?php
if ($entireDivision) {
  $postID = get_the_id();
} else {
  $postID = $post;
}
$title = get_field('job_title', $postID);
?>
<div class="grid justify-items-start gap-sp-1">
  <div class="cursor-pointer" data-modal-id="<?= get_the_id($postID); ?>">
    <img src="<?= get_the_post_thumbnail_url($postID); ?>" alt="" class="rounded-[50%] mb-5">
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