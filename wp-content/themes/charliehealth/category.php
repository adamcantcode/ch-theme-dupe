<?php get_header(); ?>
<?php
$bgColor = '';
if (is_category('families-and-caregivers')) {
  $bgColor = 'bg-noise-orange';
  $audienceClass = 'families-and-caregivers-slider';
} elseif (is_category('teens-and-young-adults')) {
  $bgColor = 'bg-noise-purple';
  $audienceClass = 'teens-and-young-adults-slider';
} elseif (is_category('providers')) {
  $bgColor = 'bg-noise-blue';
  $audienceClass = 'providers-slider';
}
?>

<main id="primary" class="site-main mt-[68px]">
  <section class="section <?= $bgColor; ?>">
    <div class="container">
      <div>
        <div class="text-white breadcrumbs mb-sp-5 lg:mb-sp-6">
          <a href="<?= get_post_type_archive_link('post'); ?>" class="text-white">The Library</a>
          <span>/</span>
          <span><?= single_term_title(); ?></span>
        </div>
      </div>
      <div class="grid lg:grid-cols-2 gap-sp-12">
        <div>
          <h1 class="text-white"><?= single_term_title(); ?></h1>
          <!-- <p>Stay up to date on mental health research, wellness techniques, treatment services, and more.</p> -->
        </div>
        <div class="grid gap-sp-16">
          <form role="search" method="get" class="relative search-form" action="<?= esc_url(site_url('/search')); ?>">
            <label>
              <span class="screen-reader-text"><?= _x('Search for:', 'label'); ?></span>
              <input type="search" class="w-full border-none rounded-sm outline-none search-field h-sp-12 lg:h-sp-14 text-h3 lg:text-h3-lg py-sp-4 px-sp-6 focus-visible:border-none" placeholder="Search..." value="" name="query" />
            </label>
            <button type="submit" class="absolute top-0 right-0 flex items-center justify-center h-full transition-colors duration-300 bg-white rounded-sm search-submit aspect-square hover:bg-lightest-purple"><img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/search.svg'); ?>" alt="icon for search"></button>
          </form>
          <div class="grid lg:grid-cols-2 gap-sp-4">
            <?php
            $terms = get_terms(array(
              'taxonomy' => 'category',
              'hide_empty' => false,
            ));
            foreach ($terms as $term) : ?>
              <?php
              // Skip term if is equal to current archive
              if ($term->slug !== get_queried_object()->slug) :  ?>
                <?php
                if ($term->slug === 'families-and-caregivers') {
                  $bgColor = 'bg-noise-orange';
                  $icon = 'families';
                } elseif ($term->slug === 'teens-and-young-adults') {
                  $bgColor = 'bg-noise-purple';
                  $icon = 'person';
                } elseif ($term->slug === 'providers') {
                  $bgColor = 'bg-noise-blue';
                  $icon = 'clipboard';
                }
                ?>
                <div class="relative flex flex-col rounded-md gap-sp-4 p-sp-5 hover:-translate-y-sp-1 duration-200 <?= $bgColor; ?>">
                  <div>
                    <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/' . $icon . '.svg'); ?>" alt="icon of <?= $icon; ?>">
                  </div>
                  <div class="flex items-center justify-between">
                    <h3 class="mb-0 text-h4"><a href="<?= get_term_link($term->term_id); ?>" class="text-white stretched-link"><?= $term->name; ?></a></h3>
                    <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/arrow-left.svg'); ?>" alt="arrow icon" class="h-auto rotate-180 w-sp-6">
                  </div>
                </div>
              <?php endif; ?>
            <?php endforeach; ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <h2>Featured</h2>
      <div>
        <div class="relative swiper swiper-featured-blog lg:h-[400px]">
          <div class="swiper-wrapper">
            <?php
            $args = array(
              'post_type' => 'post',
              'category_name' => get_queried_object()->slug,
              'meta_key'      => 'category_featured',
              'meta_value'    => '1'
            );

            $query = new WP_Query($args);
            ?>
            <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
                <?php
                $featureOn = get_field('feature_on');
                $display = false;
                
                // Handle error
                if (is_array($featureOn)) {
                  // Find cat if selected as featured
                  foreach ($featureOn as $audience) {
                    // Compare to category page
                    if ($audience->slug === get_queried_object()->slug) {
                      $display = true;
                    }
                  }
                }
                // Display if exists, otherwise skip
                if ($display === true) {
                  if (has_post_thumbnail()) {
                    $featuredImageID = get_post_thumbnail_id();
                    $featuredImage = wp_get_attachment_image_src($featuredImageID, 'featured-large');
                    $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

                    $featuredImageUrl = $featuredImage[0];
                    $featuredImageAltText = $featuredImageAltText ?: '';
                  } else {
                    $featuredImageUrl = placeHolderImage(600, 800);
                    $featuredImageAltText = 'place holder image';
                  }
                ?>
                  <div class="swiper-slide">
                    <div class="relative grid overflow-hidden rounded-md lg:grid-cols-2">
                      <div class="grid content-between order-2 lg:p-sp-8 p-sp-4 lg:order-1 <?= $audienceClass; ?>"">
                      <div>
                        <h3 class="text-white text-h2 lg:text-h2-lg"><?= get_the_title(); ?></h3>
                      </div>
                      <a href="<?= get_the_permalink(); ?>" class="text-white no-underline stretched-link">Read more <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/arrow-left.svg'); ?>" alt="arrow icon" class="inline-block rotate-180 h-sp-4 ml-sp-2"></a>
                    </div>
                    <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="order-1 object-cover lg:order-2 lg:h-[400px] w-full">
                  </div>
          </div>
    <?php };
              endwhile;
              wp_reset_postdata();
            endif; ?>
        </div>
        <div class="bottom-0 right-0 z-10 grid items-center grid-cols-3 lg:absolute justify-items-center gap-sp-4 lg:p-sp-8 mt-sp-8">
          <div class="swiper-button-prev-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
              <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
              <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" class="arrow-slider-arrow" />
              <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
            </svg>
          </div>
          <div class="!relative swiper-pagination !inset-auto"></div>
          <div class="swiper-button-next-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none" class="arrow-slider">
              <rect width="50" height="50" rx="25" fill="#ffffff" class="arrow-slider-bg" />
              <path d="M38.0607 26.0607C38.6464 25.4749 38.6464 24.5251 38.0607 23.9393L28.5147 14.3934C27.9289 13.8076 26.9792 13.8076 26.3934 14.3934C25.8076 14.9792 25.8076 15.9289 26.3934 16.5147L34.8787 25L26.3934 33.4853C25.8076 34.0711 25.8076 35.0208 26.3934 35.6066C26.9792 36.1924 27.9289 36.1924 28.5147 35.6066L38.0607 26.0607ZM13 26.5H37V23.5H13V26.5Z" fill="#212984" class="arrow-slider-arrow" />
              <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
            </svg>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>
  <section id="postsContainer" class="section">
    <div class="container">
      <h2>Latest posts for <?= single_term_title(); ?></h2>
      <div class="lg:grid lg:grid-cols-3 lg:gap-sp-16">
        <div class="relative flex flex-wrap items-start lg:flex-col gap-sp-4">
          <h6 class="absolute top-0 right-0 group">
            <a role="button" class="flex items-center invisible transition-all duration-300 opacity-0 js-reset">
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/reset.svg'); ?>" alt="reset filters icon" class="transition-all duration-300 pointer-events-none mr-sp-2 w-sp-5 group-hover:rotate-45"><span class="pointer-events-none">Reset</span>
            </a>
          </h6>
          <?php
          $terms = get_terms(array(
            'taxonomy' => 'post_tag',
            'hide_empty' => false,
          ));
          // var_dump($terms);
          foreach ($terms as $term) : ?>
            <h6 data-tag-id="<?= $term->term_id; ?>" class="inline-block mb-0 rounded-lg cursor-pointer js-tag-id bg-tag-gray px-sp-4 py-sp-2"><?= $term->name; ?></h5>
            <?php endforeach; ?>
        </div>
        <div class="col-span-2">
          <div class="grid lg:grid-cols-2 transition-all duration-300 scale-[0.99] opacity-0 posts-container gap-x-sp-8 gap-y-sp-10 mb-sp-10">
          </div>
          <div class="pagination-container"></div>
        </div>
      </div>
    </div>
  </section>
  <section class="section-bottom">
    <div class="container">
      <?= do_blocks('<!-- wp:acf/divider-block {"name":"acf/divider-block"} /-->'); ?>
    </div>
  </section>
  <section class="section-horizontal">
    <div class="container">
      <?php // echo do_blocks('<!-- wp:acf/pre-footer-cta-block {"name":"acf/pre-footer-cta-block"} /-->'); 
      ?>
      <div class="rounded-md border-gradient">
        <div class="items-center justify-between lg:flex p-sp-8">
          <h4 class="lg:mb-0">Curious about something we haven’t covered?<br>Write to us and let us know.</h4>
          <p class="mb-0">Write to us at<br><a href="mailto:library@charliehealth.com">library@charliehealth.com</a></p>
        </div>
      </div>
    </div>
  </section>
  <?= do_blocks('<!-- wp:block {"ref":12} /-->'); ?>
</main>

<?php get_footer(); ?>