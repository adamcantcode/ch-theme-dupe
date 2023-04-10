<?php
// Get the current page/post ID
$currentID = get_the_ID();

// Get an array of parent pages, starting with the immediate parent
$parentPages = get_post_ancestors($currentID);
$parentPages = array_reverse($parentPages);

// For areas of care and treatment modalities
if(is_single()) {
  $postTypeDetails = get_post_type_object(get_post_type());
  $name = $postTypeDetails->labels->name;
}

if (!empty($parentPages)) : ?>
  <div class="breadcrumbs mb-sp-5 lg:mb-sp-6">
    <a href="<?= home_url(); ?>">Home</a>
    <?php
    foreach ($parentPages as $parent_id) : ?>
      <span>/</span>
      <a href="<?= get_permalink($parent_id); ?>"><?= get_the_title($parent_id); ?></a>
    <?php endforeach; ?>

    <span>/</span>
    <span><?= get_the_title(); ?></span>
  </div>
<?php elseif (is_single()) : ?>
  <div class="breadcrumbs mb-sp-5 lg:mb-sp-6">
    <a href="<?= home_url(); ?>">Home</a>
      <span>/</span>
      <a href="<?= get_post_type_archive_link(get_post_type()); ?>"><?= $name; ?></a>
    <span>/</span>
    <span><?= get_the_title(); ?></span>
  </div>
<?php endif; ?>