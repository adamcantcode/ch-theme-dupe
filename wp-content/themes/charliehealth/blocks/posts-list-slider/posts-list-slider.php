<?php
// Get the current page ID
$current_page_id = get_the_ID();

$args = array(
  'post_type'      => 'treatment-modalities',
  'post_parent'    => $current_page_id,
  'posts_per_page' => -1,
  'orderby'        => 'date',
  'order'          => 'ASC',
);
$query = new WP_Query($args);
if ($query->have_posts()) : ?>
  <div class="relative">
    <div class="relative">
      <div class="swiper swiper-gpt">
        <div class="swiper-wrapper">
          <?php while ($query->have_posts()) : $query->the_post();
            $author = get_field('by_author', get_the_ID());
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
            <div class="!h-auto swiper-slide">
              <div class="relative h-full bg-white rounded-lg group">
                <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
                  <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
                </div>
                <div class="grid bg-white rounded-b-lg p-sp-4">
                  <h3 class="text-h4-base"><a href="<?= get_the_permalink(); ?>" class="block stretched-link"><?= get_the_title(); ?></a></h3>
                  <p><?php // $author->post_title; ?></p>
                </div>
              </div>
            </div>
          <?php endwhile; ?>
        </div>
      </div>
    </div>
    <div class="flex justify-end gap-base5-4 mt-base5-4">
      <div class="swiper-button-prev-arrow-carousel swiper-gpt">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
          <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
          <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" class="arrow-slider-arrow" />
        </svg>
      </div>
      <div class="swiper-button-next-arrow-carousel swiper-gpt">
        <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
          <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
          <path d="M38.0607 26.0607C38.6464 25.4749 38.6464 24.5251 38.0607 23.9393L28.5147 14.3934C27.9289 13.8076 26.9792 13.8076 26.3934 14.3934C25.8076 14.9792 25.8076 15.9289 26.3934 16.5147L34.8787 25L26.3934 33.4853C25.8076 34.0711 25.8076 35.0208 26.3934 35.6066C26.9792 36.1924 27.9289 36.1924 28.5147 35.6066L38.0607 26.0607ZM13 26.5H37V23.5H13V26.5Z" fill="#212984" class="arrow-slider-arrow" />
        </svg>
      </div>
    </div>
  </div>
<?php endif; ?>