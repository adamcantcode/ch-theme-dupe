<?php $numb = rand(1, 100000); ?>
<InnerBlocks />
<div class="grid lg:grid-cols-4 gap-sp-5 mt-base5-10">
  <?php
  $selectedTag = get_field('tag');
  $selectedPostType = get_field('post_type');
  $customSelect = get_field('custom_select'); // Array of post IDs

  $customPosts = array(); // To store the posts from custom select
  $otherPosts = array(); // To store other posts based on post type and tag

  // Query for custom selected posts if available
  if (!empty($customSelect) && is_array($customSelect)) {
    $customArgs = array(
      'post_type'      => 'post',
      'post__in'       => $customSelect, // Only get posts in custom select
      'orderby'        => 'post__in', // Maintain order from custom select
      'posts_per_page' => -1,
    );

    $customQuery = new WP_Query($customArgs);

    if ($customQuery->have_posts()) {
      while ($customQuery->have_posts()) {
        $customQuery->the_post();
        $customPosts[] = get_post(); // Store custom selected posts
      }
      wp_reset_postdata(); // Reset post data after custom query
    }
  }

  // Set up the secondary query arguments for post type and tag
  $args = array(
    'post_type'      => $selectedPostType ?: 'post', // Default to 'post' if no post type is selected
    'posts_per_page' => -1,
    'meta_key'       => 'date',
    'orderby'        => 'meta_value',
    'order'          => 'DESC',
    'meta_type'      => 'DATE',
  );

  // Exclude custom selected posts from the tag/post type query
  if (!empty($customSelect) && is_array($customSelect)) {
    $args['post__not_in'] = $customSelect; // Exclude custom selected posts
  }

  // Add additional query for post type
  if ($selectedPostType) {
    // Check if the selected post type is 'areas-of-care' or 'treatment-modalities'
    if (in_array($selectedPostType, ['areas-of-care', 'treatment-modalities'])) {
      $args['post_parent__not_in'] = array(0); // Exclude posts with a parent of 0
    }
  }

  // Add tax query if selected
  if ($selectedTag) {
    $args['tax_query'] = array(
      array(
        'taxonomy' => 'post_tag',
        'field'    => 'slug',
        'terms'    => $selectedTag->slug,
      ),
    );
  }

  // Query the other posts
  $otherQuery = new WP_Query($args);
  if ($otherQuery->have_posts()) {
    while ($otherQuery->have_posts()) {
      $otherQuery->the_post();
      $otherPosts[] = get_post(); // Store other posts
    }
    wp_reset_postdata(); // Reset post data after the secondary query
  }

  // Merge results, prioritizing custom selected posts
  $finalPosts = array_merge($customPosts, $otherPosts);
  if (!empty($finalPosts)) {
    foreach ($finalPosts as $post) {
      setup_postdata($post);
      $author                = get_field('by_author', $post->ID);
      $customMedicalReviewer = get_field('custom_medical_review', $post->ID);
      if (!empty($customMedicalReviewer)) {
        $medicalReviewer = $customMedicalReviewer;
      } else {
        $medicalReviewer = get_field('medical_reviewer', $post->ID);
      }
      if (has_post_thumbnail()) {
        $featuredImageID = get_post_thumbnail_id($post->ID);
        $featuredImage = wp_get_attachment_image_src($featuredImageID, 'card-thumb');
        $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

        $featuredImageUrl = $featuredImage[0];
        $featuredImageAltText = $featuredImageAltText ?: '';
      } else {
        $featuredImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
        $featuredImageAltText = 'Charlie Health Logo';
      }

      if ($medicalReviewer) {
        if (has_post_thumbnail($medicalReviewer)) {
          $medicalReviewerFeaturedImageID = get_post_thumbnail_id($medicalReviewer->ID);
          $medicalReviewerFeaturedImage = wp_get_attachment_image_src($medicalReviewerFeaturedImageID, 'featured-large');
          $medicalReviewerFeaturedImageAltText = get_post_meta($medicalReviewerFeaturedImageID, '_wp_attachment_image_alt', true);


          $medicalReviewerFeaturedImageUrl = $medicalReviewerFeaturedImage[0];
          $medicalReviewerFeaturedImageAltText = $medicalReviewerFeaturedImageAltText ?: '';
        } else {
          $medicalReviewerFeaturedImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
          $medicalReviewerFeaturedImageAltText = 'Charlie Health Logo';
        }
      }
      if (has_post_thumbnail($author)) {
        $authorFeaturedImageID = get_post_thumbnail_id($author->ID);
        $authorFeaturedImage = wp_get_attachment_image_src($authorFeaturedImageID, 'featured-large');
        $authorFeaturedImageAltText = get_post_meta($authorFeaturedImageID, '_wp_attachment_image_alt', true);

        $authorFeaturedImageUrl = $authorFeaturedImage[0];
        $authorFeaturedImageAltText = $authorFeaturedImageAltText ?: '';
      } else {
        $authorFeaturedImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
        $authorFeaturedImageAltText = 'Charlie Health Logo';
      }
  ?>
      <div class="relative flex flex-col transition-all bg-white rounded-lg opacity-0 group custom-posts-js-<?= $numb; ?> not-loaded noshow">
        <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
          <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
        </div>
        <div class="flex flex-col flex-1 bg-white rounded-b-lg p-sp-4">
          <h3 class="text-h4-base mb-base5-4"><a href="<?= get_the_permalink($post->ID); ?>" class="block stretched-link"><?= get_the_title($post->ID); ?></a></h3>
          <div class="mt-auto">
            <?php if (!empty($medicalReviewer)) : ?>
              <div class="flex items-center mb-base5-1">
                <img src="<?= $medicalReviewerFeaturedImageUrl; ?>" alt="<?= $medicalReviewerFeaturedImageAltText; ?>" class="object-cover h-base5-4 aspect-square rounded-circle mr-base5-1">
                <p class="z-10 mb-0 text-mini">Clinically Reviewed By: <a href="<?= get_the_permalink($medicalReviewer->ID); ?>" class="text-mini"><?= $medicalReviewer->post_title; ?></a></p>
              </div>
            <?php endif; ?>
            <div class="flex items-center">
              <img src="<?= $authorFeaturedImageUrl; ?>" alt="<?= $authorFeaturedImageAltText; ?>" class="object-cover h-base5-4 aspect-square rounded-circle mr-base5-1">
              <p class="z-10 mb-0 text-mini">Written By: <a href="<?= get_the_permalink($author->ID); ?>" class="text-mini"><?= $author->post_title; ?></a></p>
            </div>
          </div>
        </div>
      </div>
  <?php }
    wp_reset_postdata();
  } ?>
</div>
<div class="flex">
  <a role="button" class="w-full ml-auto ch-button button-primary justify-self-center lg:w-auto custom-posts-load-more-js-<?= $numb; ?> lg:mt-sp-10 mt-sp-5 mb-sp-5 lg:mb-0">Load more</a>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const loadMoreCustomPosts = document.querySelector('.custom-posts-load-more-js-<?= $numb; ?>');
    const posts = document.querySelectorAll('.custom-posts-js-<?= $numb; ?>.not-loaded');
    const firstEightPosts = Array.from(posts).slice(0, 8);

    firstEightPosts.forEach(post => {
      post.classList.remove('noshow', 'not-loaded', 'opacity-0');
    });

    loadMoreCustomPosts.addEventListener('click', function() {
      let posts = document.querySelectorAll('.custom-posts-js-<?= $numb; ?>.not-loaded');
      let firstEightPosts = Array.from(posts).slice(0, 8);
      firstEightPosts.forEach(post => {
        post.classList.remove('noshow', 'not-loaded');
        setTimeout(() => {
          post.classList.remove('opacity-0');
        }, 10);
      });
      if (document.querySelectorAll('.custom-posts-js-<?= $numb; ?>.not-loaded').length === 0) {
        loadMoreCustomPosts.remove()
      }
    })

    if (document.querySelectorAll('.custom-posts-js-<?= $numb; ?>.not-loaded').length < 8) {
      loadMoreCustomPosts.remove()
    }
  })
</script>