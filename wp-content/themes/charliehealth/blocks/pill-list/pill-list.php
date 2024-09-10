<?php
$id = get_the_ID();
$type = get_post_type();
$title = get_post_type_object($type)->labels->name;
?>

<div id="<?= $block['id']; ?>" class="container-md">
  <div class="text-center mb-base5-10">
    <h4>More <?= $title; ?></h4>
  </div>
  <div class="flex flex-wrap items-center justify-center gap-base5-4">
    <?php
    $args = array(
      'post_type'      => $type,
      'posts_per_page' => 4,
      'orderby'        => 'rand',
      'post_parent'    => 0, // Only top-level pages
    );

    $query = new WP_Query($args);
    if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
        <a href="<?= get_the_permalink(); ?>" class="no-underline border rounded-pill border-primary hover:bg-primary hover:text-white py-base5-2 px-base5-5 <?= $id === get_the_ID() ? 'text-white bg-primary' : 'text-primary'; ?> "><?= get_the_title(); ?></a>
    <?php endwhile;
      wp_reset_postdata();
    endif; ?>
    <a href="/treatment-modalities" class="no-underline border rounded-pill border-primary text-primary hover:bg-primary hover:text-white py-base5-2 px-base5-5">& more</a>
  </div>
</div>