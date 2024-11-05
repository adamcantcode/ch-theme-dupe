<?php get_header(); ?>

<section class="section bg-grey-warm">
  <div class="container">
    <div class="grid lg:grid-cols-2 lg:gap-sp-12 gap-sp-4">
      <div class="mb-sp-4">
        <a href="<?= get_post_type_archive_link('post'); ?>" class="flex items-center mb-sp-4 lg:mb-sp-16">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 50 50" fill="none">
            <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" />
          </svg>
          <p class="mb-0 ml-sp-2">Back to The Library</p>
        </a>
      </div>
      <div class="grid items-start">
        <form role="search" method="get" class="relative search-form" action="<?= esc_url(site_url('/search')); ?>">
          <label>
            <span class="screen-reader-text"><?= _x('Search for:', 'label'); ?></span>
            <input type="search" class="w-full border-none rounded-sm outline-none search-field h-sp-12 lg:h-sp-14 text-h3 lg:text-h3-lg py-sp-4 px-sp-6 focus-visible:border-none" placeholder="Search..." value="" name="query" />
          </label>
          <button type="submit" class="absolute top-0 right-0 flex items-center justify-center h-full transition-colors duration-300 bg-white rounded-sm search-submit aspect-square hover:bg-lightest-purple"><img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/search.svg'); ?>" alt="icon for search" srcset=""></button>
        </form>
      </div>
    </div>
    <h1 class="leading-normal lg:leading-tight mt-sp-4 lg:mt-0">Articles realted to <span class="inline-block px-3 text-white whitespace-pre-wrap rounded-sm bg-med-blue"><?= get_query_var('tag'); ?></span></h1>
  </div>
</section>
<section class="bg-grey-warm section-bottom">
  <div class="container">
    <div class="grid lg:grid-cols-4 gap-sp-5 mt-base5-10">
      <?php
      $numb = rand(1, 100000);
      // Set up the secondary query arguments for post type and tag
      $args = array(
        'tag' => get_query_var('tag'),
        'posts_per_page' => -1,
        'meta_key'       => 'date',
        'orderby'        => 'meta_value',
        'order'          => 'DESC',
        'meta_type'      => 'DATE',
      );
      // Run the custom query
      $tag_query = new WP_Query($args);

      if ($tag_query->have_posts()) :
        while ($tag_query->have_posts()) : $tag_query->the_post();
          $author                = get_field('by_author');
          $customMedicalReviewer = get_field('custom_medical_review');
          if (!empty($customMedicalReviewer)) {
            $medicalReviewer = $customMedicalReviewer;
          } else {
            $medicalReviewer = get_field('medical_reviewer');
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
          <div class="relative flex flex-col transition-all bg-white rounded-lg opacity-0 group custom-posts-js-<?= $numb; ?> not-loaded noshow">
            <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
              <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
            </div>
            <div class="flex flex-col flex-1 bg-white rounded-b-lg p-sp-4">
              <h3 class="text-h4-base mb-base5-4"><a href="<?= get_the_permalink(); ?>" class="block stretched-link"><?= get_the_title(); ?></a></h3>
              <div class="mt-auto">
                <?php if (!empty($medicalReviewer) && !is_array($medicalReviewer)) : ?>
                  <div class="flex items-center mb-base5-1">
                    <img src="<?= $medicalReviewerFeaturedImageUrl; ?>" alt="<?= $medicalReviewerFeaturedImageAltText; ?>" class="object-cover w-auto h-base5-4 aspect-square rounded-circle mr-base5-1">
                    <p class="z-10 mb-0 text-mini">Clinically Reviewed By: <a href="<?= get_the_permalink($medicalReviewer->ID); ?>" class="text-mini"><?= $medicalReviewer->post_title; ?></a></p>
                  </div>
                <?php endif; ?>
                <?php if (!empty($author)) : ?>
                  <div class="flex items-center">
                    <img src="<?= $authorFeaturedImageUrl; ?>" alt="<?= $authorFeaturedImageAltText; ?>" class="object-cover w-auto h-base5-4 aspect-square rounded-circle mr-base5-1">
                    <p class="z-10 mb-0 text-mini">Written By: <a href="<?= get_the_permalink($author->ID); ?>" class="text-mini"><?= $author->post_title; ?></a></p>
                  </div>
                <?php endif; ?>
              </div>
            </div>
          </div>
      <?php endwhile;
      endif; ?>
    </div>
    <div class="flex">
      <a role="button" class="w-full ml-auto ch-button button-primary justify-self-center lg:w-auto custom-posts-load-more-js-<?= $numb; ?> lg:mt-sp-10 mt-sp-5 mb-sp-5 lg:mb-0">Load more</a>
    </div>
    <?php if (!is_admin()) : ?>
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
    <?php endif; ?>
  </div>
</section>

<?php get_footer(); ?>