<?php get_header(); ?>

<?php if (!get_field('use_resources_template_please', get_queried_object())) : ?>
  <section class="section">
    <div class="container">
      <div class="mb-sp-8">
        <a href="<?= get_post_type_archive_link('post'); ?>" class="flex items-center">
          <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 50 50" fill="none">
            <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" />
          </svg>
          <p class="mb-0 ml-sp-2">Back to The Library</p>
        </a>
      </div>
      <div class="grid lg:grid-cols-[2fr,1fr] mb-sp-12">
        <div>
          <h1 class="text-h1-display-lg"><?= ucwords(single_tag_title('', false)); ?></h1>
        </div>
        <div>
          <form role="search" method="get" class="relative search-form" action="<?= esc_url(site_url('/search')); ?>">
            <label>
              <span class="screen-reader-text"><?= _x('Search for:', 'label'); ?></span>
              <input type="search" class="w-full border rounded-sm outline-none border-text search-field h-sp-12 lg:h-sp-14 text-h3 lg:text-h3-lg py-sp-4 px-sp-6 focus-visible:border" placeholder="Search..." value="" name="query" />
            </label>
            <button type="submit" class="absolute top-0 right-0 flex items-center justify-center h-full transition-colors duration-300 scale-95 bg-white rounded-sm search-submit aspect-square hover:bg-lightest-purple"><img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/search.svg'); ?>" alt="icon for search" srcset=""></button>
          </form>
        </div>
      </div>
      <div class="flex items-start overflow-x-scroll gap-sp-4 whitespace-nowrap custom-scroll">
        <?php
        $terms = get_terms(array(
          'taxonomy' => 'post_tag',
          'hide_empty' => false,
        ));
        $currentTag = get_queried_object()->slug;
        foreach ($terms as $term) : ?>
          <a href="<?= site_url('/resources/' . $term->slug); ?>" class="no-underline duration-300 rounded-lg px-sp-4 py-sp-3 text-h5 <?= $currentTag === $term->slug ? 'bg-dark-blue text-white' : 'bg-tag-gray hover:bg-bright-teal'; ?>"><?= $term->name; ?></a>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <section id="postsContainer" class="section-bottom">
    <div class="container">
      <h2>Top posts for <?= ucwords(single_tag_title('', false)); ?></h2>
      <div class="absolute invisible opacity-0 no-posts-js">
        <div class="grid items-center grid-cols-1 duration-300 rounded-md justify-items-center bg-cream lg:grid-cols-2 p-sp-4">
          <h4 class="mb-0">There aren't any posts that match this tag. Try again with another tag</h4>
          <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/not-found.svg'); ?>" alt="not found icon">
        </div>
      </div>
      <div class="grid lg:grid-cols-3 transition-all duration-300 scale-[0.99] opacity-0 posts-container gap-x-sp-8 gap-y-sp-10 mb-sp-10">
        <!-- Content -->
      </div>
      <div class="pagination-container"></div>
    </div>
  </section>
  <section class="section-bottom">
    <div class="container">
      <?= do_blocks('<!-- wp:acf/divider-block {"name":"acf/divider-block"} /-->'); ?>
    </div>
  </section>
  <?= do_blocks('<!-- wp:block {"ref":12} /-->'); ?>
<?php else : ?>
  <?php

  // var_dump(get_queried_object());
  $url          = get_term_link(get_queried_object());
  $niceTitle    = get_queried_object()->name . ' Resources';
  if (strpos($niceTitle, 'Resources') !== false) {
    $niceTitle = get_queried_object()->name;
  }
  $title        = get_field('title', get_queried_object()) ? get_field('title', get_queried_object()) : single_term_title('', false) . ' Resources';
  $subhead      = get_field('subhead', get_queried_object());
  $sectionOne   = get_field('section_1', get_queried_object());
  $sectionTwo   = get_field('section_2', get_queried_object());
  $sectionThree = get_field('section_3', get_queried_object());
  $sectionFour  = get_field('section_4', get_queried_object());
  $sectionFive  = get_field('section_5', get_queried_object());
  $image        = get_field('image', get_queried_object());
  ?>
  <div class="resource-page-js">
    <section class="section">
      <div class="container">
        <div class="breadcrumbs mb-sp-5 lg:mb-sp-6">
          <a href="<?= home_url(); ?>">Home</a>
          <span>/</span>
          <a href="<?= home_url('/blog'); ?>">The Library</a>
          <span>/</span>
          <span><?= $niceTitle; ?></span>
        </div>
        <div class="grid items-start lg:grid-cols-2 gap-sp-8">
          <div class="order-1">
            <h1><?= $title; ?></h1>
          </div>
          <div class="flex flex-col justify-between order-1 lg:order-2">
            <?= $subhead; ?>
          </div>
        </div>
        <div class="grid mt-sp-6 lg:mt-sp-14 gap-base5-4">
          <div>
            <h3>Jump to:</h3>
          </div>
          <div class="flex overflow-auto gap-sp-5 custom-scroll">
            <?php if (have_rows('jump_buttons', get_queried_object())) : ?>
              <?php while (have_rows('jump_buttons', get_queried_object())) : the_row();
                $label = get_sub_field('label', get_queried_object());
                $sectionID  = get_sub_field('section_id', get_queried_object());
              ?>
                <a href="#section<?= get_row_index(); ?>" class="ch-button button-secondary whitespace-nowrap"><?= $label; ?></a>
              <?php endwhile; ?>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
    <section class="section-horizontal">
      <div class="container">
        <div class="divider"></div>
      </div>
    </section>
    <section class="section" id="section1">
      <div class="container-sm">
        <?= $sectionOne; ?>
      </div>
    </section>
    <section class="bg-off-white section" id="section2">
      <div class="container-sm">
        <?= $sectionTwo; ?>
      </div>
      <?php
      $args = array(
        'tax_query' => array(
          'relation' => 'AND',
          array(
            'taxonomy' => 'funnel-level',
            'field' => 'slug',
            'terms' => 'upper-level',
          ),
          array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => get_queried_object()->slug,
          ),
        ),
        'post_type' => 'post',
        'posts_per_page' => -1,
        'meta_key'       => 'date',
        'orderby'        => 'meta_value',
        'order'          => 'DESC',
        'meta_type'      => 'DATE',
      );
      $query = new WP_Query($args);
      if ($query->have_posts()) : ?>
        <div class="container lg:mt-sp-16 md:mt-sp-12 mt-sp-8">
          <div class="relative">
            <div class="relative md:mx-sp-14">
              <div class="swiper swiper-top-level">
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
                          <p><?= $author->post_title; ?></p>
                        </div>
                      </div>
                    </div>
                  <?php endwhile; ?>
                </div>
              </div>
            </div>
            <div class="absolute inset-0 w-full h-full noshow md:block">
              <div class="absolute -translate-y-1/2 swiper-button-prev-arrow-carousel top-[calc(50%-26px)] left-0 swiper-top-level">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
                  <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
                  <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" class="arrow-slider-arrow" />
                </svg>
              </div>
              <div class="absolute -translate-y-1/2 swiper-button-next-arrow-carousel top-[calc(50%-26px)] right-0 swiper-top-level">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
                  <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
                  <path d="M38.0607 26.0607C38.6464 25.4749 38.6464 24.5251 38.0607 23.9393L28.5147 14.3934C27.9289 13.8076 26.9792 13.8076 26.3934 14.3934C25.8076 14.9792 25.8076 15.9289 26.3934 16.5147L34.8787 25L26.3934 33.4853C25.8076 34.0711 25.8076 35.0208 26.3934 35.6066C26.9792 36.1924 27.9289 36.1924 28.5147 35.6066L38.0607 26.0607ZM13 26.5H37V23.5H13V26.5Z" fill="#212984" class="arrow-slider-arrow" />
                </svg>
              </div>
            </div>
          </div>
        </div>
      <?php wp_reset_postdata();
      endif; ?>
    </section>
    <section class="section" id="section3">
      <div class="container">
        <?php if ($image) : ?>
          <div class="grid items-center grid-cols-1 lg:grid-cols-2 gap-sp-8">
          <?php endif; ?>
          <div><?= $sectionThree; ?></div>
          <?php if ($image) : ?>
            <div>
              <img src="<?= $image['url']; ?>" alt="<?= $image['alt']; ?>" class="rounded-md">
            </div>
          </div>
        <?php endif; ?>
      </div>
    </section>
    <section class="bg-off-white section" id="section4">
      <div class="container-sm">
        <?= $sectionFour; ?>
      </div>
      <?php
      $args = array(
        'tax_query' => array(
          'relation' => 'AND',
          array(
            'taxonomy' => 'funnel-level',
            'field' => 'slug',
            'terms' => 'lower-level',
          ),
          array(
            'taxonomy' => 'post_tag',
            'field' => 'slug',
            'terms' => get_queried_object()->slug,
          ),
        ),
        'post_type' => 'post',
        'posts_per_page' => -1,
        'meta_key'       => 'date',
        'orderby'        => 'meta_value',
        'order'          => 'DESC',
        'meta_type'      => 'DATE',
      );
      $query = new WP_Query($args);
      if ($query->have_posts()) : ?>
        <div class="container lg:mt-sp-16 md:mt-sp-12 mt-sp-8">
          <div class="relative">
            <div class="relative md:mx-sp-14">
              <div class="swiper swiper-bottom-level">
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
                          <p><?= $author->post_title; ?></p>
                        </div>
                      </div>
                    </div>
                  <?php endwhile; ?>
                </div>
              </div>
            </div>
            <div class="absolute inset-0 w-full h-full noshow md:block">
              <div class="absolute -translate-y-1/2 swiper-button-prev-arrow-carousel top-[calc(50%-26px)] left-0 swiper-bottom-level">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
                  <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
                  <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" class="arrow-slider-arrow" />
                </svg>
              </div>
              <div class="absolute -translate-y-1/2 swiper-button-next-arrow-carousel top-[calc(50%-26px)] right-0 swiper-bottom-level">
                <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
                  <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
                  <path d="M38.0607 26.0607C38.6464 25.4749 38.6464 24.5251 38.0607 23.9393L28.5147 14.3934C27.9289 13.8076 26.9792 13.8076 26.3934 14.3934C25.8076 14.9792 25.8076 15.9289 26.3934 16.5147L34.8787 25L26.3934 33.4853C25.8076 34.0711 25.8076 35.0208 26.3934 35.6066C26.9792 36.1924 27.9289 36.1924 28.5147 35.6066L38.0607 26.0607ZM13 26.5H37V23.5H13V26.5Z" fill="#212984" class="arrow-slider-arrow" />
                </svg>
              </div>
            </div>
          </div>
        </div>
      <?php wp_reset_postdata();
      endif; ?>
    </section>
    <section class="section" id="section5">
      <div class="container">
        <?php $relatedResearchPost = get_field('related_research_post', get_queried_object()); ?>
        <?php if ($relatedResearchPost) : ?>
          <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-sp-16 gap-sp-8">
          <?php endif; ?>
          <div>
            <?= $sectionFive; ?>
          </div>
          <?php if ($relatedResearchPost) : ?>
            <?php
            if (has_post_thumbnail($relatedResearchPost->ID)) {
              $featuredImageID = get_post_thumbnail_id($relatedResearchPost->ID);
              $featuredImage = wp_get_attachment_image_src($featuredImageID, 'card-thumb');
              $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);
              $featuredImageUrl = $featuredImage[0];
              $featuredImageAltText = $featuredImageAltText ?: '';
            } else {
              $featuredImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
              $featuredImageAltText = 'Charlie Health Logo';
            }
            ?>
            <div class="relative bg-white border rounded-lg group">
              <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
                <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
              </div>
              <div class="grid bg-white rounded-b-lg p-sp-4">
                <h3 class="text-h4-base"><a href="<?= get_the_permalink($relatedResearchPost->ID); ?>" class="block stretched-link"><?= get_the_title($relatedResearchPost->ID); ?></a></h3>
                <p><?= $author = get_field('by_author', $relatedResearchPost->ID)->post_title ?: 'Charlie Health Editorial Team'; ?></p>
              </div>
            </div>
          </div>
        <?php endif; ?>
      </div>
    </section>
  </div>
<?php endif; ?>

<?php get_footer(); ?>