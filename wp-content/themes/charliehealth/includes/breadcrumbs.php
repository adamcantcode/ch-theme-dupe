<?php
// Get the current page/post ID
$currentID = get_the_ID();

// Get an array of parent pages, starting with the immediate parent
$parentPages = get_post_ancestors($currentID);
$parentPages = array_reverse($parentPages);

// For areas of care and treatment modalities
if (is_single()) {
  $postTypeDetails = get_post_type_object(get_post_type());
  $name = $postTypeDetails->labels->menu_name;
}

// var_dump($postTypeDetails);

if (!empty($parentPages)) : ?>
  <div class="breadcrumbs mb-sp-5 lg:mb-sp-6">
    <a href="<?= home_url(); ?>">Home</a>
    <?php
    foreach ($parentPages as $parent_id) : ?>
      <span>/</span>
      <a href="<?= get_permalink($parent_id); ?>"><?= get_the_title($parent_id); ?></a>
    <?php endforeach; ?>
    <span>/</span>
    <h1 class="inline-block text-h4-base"><?= get_the_title(); ?></h1>
  </div>
<?php elseif (empty($parentPages) && !is_single()) : ?>
  <div class="breadcrumbs mb-sp-5 lg:mb-sp-6">
    <a href="<?= home_url(); ?>">Home</a>
    <span>/</span>
    <h1 class="inline-block text-h4-base"><?= get_the_title(); ?></h1>
  </div>
<?php elseif (is_single()) : ?>
  <?php
  switch (get_post_type()) {
    case 'areas-of-care':
      $url = site_url('/areas-of-care');
      break;
    case 'treatment-modalities':
      $url = site_url('/treatment-modalities');
      break;
    default:
      $url = site_url();
      break;
  }
  ?>
  <div class="breadcrumbs mb-sp-5 lg:mb-sp-6">
    <a href="<?= home_url(); ?>">Home</a>
    <span>/</span>
    <a href="<?= $url; ?>"><?= $name; ?></a>
    <span>/</span>
    <h1 class="inline-block text-h4-base"><?= get_the_title(); ?></h1>
  </div>
<?php endif; ?>