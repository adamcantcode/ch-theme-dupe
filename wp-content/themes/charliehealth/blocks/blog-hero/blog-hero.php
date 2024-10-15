<section class="section bg-grey-cool">
  <div class="container">
    <div class="grid lg:grid-cols-[7fr_1fr_4fr]">
      <div>
        <h1>The Library</h1>
        <div class="flex items-center gap-sp-4 mobile-hero-sub max-w-[550px]">
          <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/logos/shield-darkest-blue.svg'); ?>" alt="Charlie Health Shield" class="w-10 noshow lg:block mt-base5-1">
          <p class="mb-0 text-h4-base font-heading-serif">Stay up to date on mental health research, wellness techniques, treatment services, and more.</p>
        </div>
      </div>
      <div></div>
      <div>
        <form role="search" method="get" class="relative search-form mt-base5-5 lg:mt-0" action="<?= esc_url(site_url('/search')); ?>">
          <label>
            <span class="screen-reader-text"><?= _x('Search for:', 'label'); ?></span>
            <input type="search" class="w-full mb-0 border-none rounded-sm outline-none search-field h-sp-12 lg:h-sp-14 text-h3-base py-sp-4 px-sp-6 focus-visible:border-none" placeholder="Search..." value="" name="query" />
          </label>
          <button type="submit" class="absolute top-0 right-0 flex items-center justify-center h-full transition-colors duration-300 bg-white rounded-sm search-submit aspect-square hover:bg-lightest-purple"><img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/search.svg'); ?>" alt="icon for search" srcset=""></button>
        </form>
      </div>
    </div>
  </div>
</section>
<section class="section bg-grey-cool">
  <div class="container">
    <div class="lg:grid lg:grid-cols-[7fr_1fr_4fr] lg:grid-rows-4">
      <?php
      $posts = get_field('featured_blogs');
      ?>
      <div class="relative lg:row-span-3 swiper swiper-featured-blog lg:h-full lg:w-full">
        <div class="swiper-wrapper">
          <?php if (!empty($posts)) : foreach ($posts as $post) : setup_postdata($post) ?>
              <?php
              $author                = get_field('by_author', $post->ID);
              $customMedicalReviewer = get_field('custom_medical_review', $post->ID);
              if (!empty($customMedicalReviewer)) {
                $medicalReviewer = $customMedicalReviewer;
              } else {
                $medicalReviewer = get_field('medical_reviewer', $post->ID);
              }
              $post_tags = get_the_tags($post->ID);
              if (! empty($post_tags) && ! is_wp_error($post_tags)) {
                // Get the first tag (index 0)
                $first_tag = $post_tags[0];
              }
              if (has_post_thumbnail($post->ID)) {
                $featuredImageID = get_post_thumbnail_id($post->ID);
                $featuredImage = wp_get_attachment_image_src($featuredImageID, 'featured-large');
                $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

                $featuredImageUrl = $featuredImage[0];
                $featuredImageAltText = $featuredImageAltText ?: '';
              } else {
                $featuredImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
                $featuredImageAltText = 'Charlie Health Logo';
              }
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
              <div class="swiper-slide">
                <div class="relative grid overflow-hidden rounded-md lg:grid-cols-[4fr_3fr] h-full">
                  <div class="grid content-between order-2 bg-white lg:p-sp-8 p-sp-4 lg:order-1 gap-base5-4">
                    <?php if ($first_tag) : ?>
                      <div>
                        <a href="<?= site_url('/resources/' . $first_tag->slug); ?>" class="relative z-10 inline-block leading-none no-underline transition-all duration-300 bg-transparent border-2 text-primary border-primary rounded-pill p-sp-3 hover:bg-primary hover:text-white mb-sp-4 mr-sp-1"><?= $first_tag->name; ?></a>
                        <h3 class="font-heading-serif"><?= get_the_title($post->ID); ?></h3>
                        <?php if (!empty($medicalReviewer)) : ?>
                          <div class="flex items-center mb-base5-1">
                            <img src="<?= $medicalReviewerFeaturedImageUrl; ?>" alt="<?= $medicalReviewerFeaturedImageAltText; ?>" class="object-cover w-auto h-base5-4 aspect-square rounded-circle mr-base5-1">
                            <p class="z-10 mb-0">Clinically Reviewed By: <a href="<?= get_the_permalink($medicalReviewer->ID); ?>"><?= $medicalReviewer->post_title; ?></a></p>
                          </div>
                        <?php endif; ?>
                        <div class="flex items-center">
                          <img src="<?= $authorFeaturedImageUrl; ?>" alt="<?= $authorFeaturedImageAltText; ?>" class="object-cover w-auto h-base5-4 aspect-square rounded-circle mr-base5-1">
                          <p class="z-10 mb-0">Written By: <a href="<?= get_the_permalink($author->ID); ?>"><?= $author->post_title; ?></a></p>
                        </div>
                      </div>
                    <?php endif; ?>
                    <a href="<?= get_the_permalink($post->ID); ?>" class="no-underline text-primary stretched-link">Read more <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/arrow-right-blue.svg'); ?>" alt="arrow" class="inline-block h-sp-4 ml-sp-2"></a>
                  </div>
                  <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="order-1 object-cover w-full h-full lg:order-2 nolazy">
                </div>
              </div>
          <?php endforeach;
            wp_reset_postdata();
          endif; ?>
        </div>
        <div class="bottom-0 right-0 z-10 grid items-center grid-cols-3 lg:absolute justify-items-center gap-sp-4 lg:p-base5-3 mt-sp-8">
          <div class="swiper-button-prev-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
              <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
              <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" class="arrow-slider-arrow" />
            </svg>
          </div>
          <div class="!relative swiper-pagination !inset-auto"></div>
          <div class="swiper-button-next-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
              <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
              <path d="M38.0607 26.0607C38.6464 25.4749 38.6464 24.5251 38.0607 23.9393L28.5147 14.3934C27.9289 13.8076 26.9792 13.8076 26.3934 14.3934C25.8076 14.9792 25.8076 15.9289 26.3934 16.5147L34.8787 25L26.3934 33.4853C25.8076 34.0711 25.8076 35.0208 26.3934 35.6066C26.9792 36.1924 27.9289 36.1924 28.5147 35.6066L38.0607 26.0607ZM13 26.5H37V23.5H13V26.5Z" fill="#212984" class="arrow-slider-arrow" />
            </svg>
          </div>
        </div>
      </div>
      <div></div>
      <div class="lg:row-span-4">
        <div id="postsContainer">
          <h2 class="text-h3-base font-heading-serif">The Latest</h2>
          <div class="absolute invisible opacity-0 no-posts-js">
            <div class="grid items-center grid-cols-1 duration-300 rounded-md justify-items-center bg-cream lg:grid-cols-2 p-sp-4">
              <h4 class="mb-0">We couldn’t find what you’re looking for.</h4>
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/not-found.svg'); ?>" alt="not found icon">
            </div>
          </div>
          <div class="grid transition-all duration-300 posts-container gap-base5-2">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
              'post_type'      => 'post',
              'posts_per_page' => 3,
              'meta_key'       => 'date',
              'orderby'        => 'meta_value',
              'order'          => 'DESC',
              'meta_type'      => 'DATE',
              'paged'          => $paged,
            );
            $query = new WP_Query($args);
            if ($query->have_posts()) {
              while ($query->have_posts()) {
                $query->the_post();
                $date        = get_field('date', get_the_ID()) ?: '';
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
            ?>
                <div class="grid grid-cols-[3fr_1fr] bg-white rounded-lg group relative">
                  <div class="bg-white rounded-l-lg p-base5-3">
                    <h3 class="text-h4-base"><a href="<?= get_the_permalink(); ?>" class="block stretched-link"><?= get_the_title(); ?></a></h3>
                    <p><?= $date; ?></p>
                  </div>
                  <div class="min-h-[100px] overflow-hidden rounded-r-lg">
                    <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover object-center w-full h-full transition-all duration-300 rounded-r-lg group-hover:scale-105">
                  </div>
                </div>
            <?php
              }
            }
            wp_reset_postdata();
            ?>
            <!-- Content -->
          </div>
          <div class="pagination-container mt-base5-4"></div>
        </div>
      </div>
    </div>
  </div>
</section>