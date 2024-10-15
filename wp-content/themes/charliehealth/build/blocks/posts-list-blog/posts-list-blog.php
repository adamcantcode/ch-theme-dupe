<h2>Latest mental health research & clinical outcomes</h2>
<div class="grid lg:grid-cols-4 gap-sp-5 mt-base5-10">
  <?php
  // $selected_tag = get_field('acf_field_name');
  $selected_tag = 'depression';

  // Set up the query arguments
  $args = array(
    'post_type'      => 'post',
    'posts_per_page' => -1,
    'meta_key'       => 'date',
    'orderby'        => 'meta_value',
    'order'          => 'DESC',
    'meta_type'      => 'DATE',
    'tax_query'      => array(
      array(
        'taxonomy' => 'post_tag',
        'field'    => 'slug',
        'terms'    => $selected_tag,
      ),
    ),
  );

  $query = new WP_Query($args);
  if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post();
      $author                = get_field('by_author', get_the_ID());
      $customMedicalReviewer = get_field('custom_medical_review', get_the_ID());
      if (!empty($customMedicalReviewer)) {
        $medicalReviewer = $customMedicalReviewer;
      } else {
        $medicalReviewer = get_field('medical_reviewer', get_the_ID());
      }
      if (has_post_thumbnail()) {
        $featuredImageID = get_post_thumbnail_id();
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
      <div class="relative flex flex-col transition-all bg-white rounded-lg opacity-0 group custom-posts-js not-loaded noshow">
        <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
          <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
        </div>
        <div class="flex flex-col flex-1 bg-white rounded-b-lg p-sp-4">
          <h3 class="text-h4-base"><a href="<?= get_the_permalink(); ?>" class="block stretched-link"><?= get_the_title(); ?></a></h3>
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
  <?php endwhile;
    wp_reset_postdata();
  endif; ?>
</div>
<div class="flex">
  <a role="button" class="w-full ml-auto ch-button button-primary justify-self-center lg:w-auto custom-posts-load-more-js lg:mt-sp-10 mt-sp-5 mb-sp-5 lg:mb-0">Load more</a>
</div>
<script>
  document.addEventListener('DOMContentLoaded', function() {
    const loadMoreResearch = document.querySelector('.custom-posts-load-more-js');
    const posts = document.querySelectorAll('.custom-posts-js.not-loaded');
    const firstFourPosts = Array.from(posts).slice(0, 8);

    firstFourPosts.forEach(post => {
      post.classList.remove('noshow', 'not-loaded', 'opacity-0');
    });

    loadMoreResearch.addEventListener('click', function() {
      let posts = document.querySelectorAll('.custom-posts-js.not-loaded');
      let firstFourPosts = Array.from(posts).slice(0, 8);
      firstFourPosts.forEach(post => {
        post.classList.remove('noshow', 'not-loaded');
        setTimeout(() => {
          post.classList.remove('opacity-0');
        }, 10);
      });
      if (document.querySelectorAll('.custom-posts-js.not-loaded').length === 0) {
        loadMoreResearch.remove()
      }
    })
  })
</script>