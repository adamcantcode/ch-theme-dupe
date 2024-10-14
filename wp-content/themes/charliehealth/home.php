<?php get_header(); ?>

<?php
$tags = get_terms(array(
  'taxonomy' => 'post_tag',
  'hide_empty' => true, // Only show tags with assigned posts
));

if (!empty($tags) && !is_wp_error($tags)): ?>
  <div class="fixed z-10 w-full -translate-x-1/2 bg-yellow-300 left-1/2 tags-list-js scrollbar-hide">
    <div class="container">
      <div class="overflow-x-auto px-base5-4">
        <div class="flex items-start gap-base5-2">
          <?php foreach ($tags as $tag): ?>
            <a href="<?= esc_url(get_term_link($tag->slug, 'post_tag')); ?>"
              class="flex-shrink-0 no-underline bg-white border border-white rounded-pill px-base5-3 py-base5-2 text-primary group-hover:bg-white-hover text-h5-base my-base5-2">
              <?= esc_html($tag->name); ?>
            </a>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
  <script>
    const tagList = document.querySelector('.tags-list-js');
    const mainElement = document.querySelector('main');

    // Get the existing marginTop of the main element
    const computedStyle = window.getComputedStyle(mainElement);
    const existingMarginTop = parseFloat(computedStyle.marginTop);

    // Set the new marginTop based on the height of the tagList and existing marginTop
    mainElement.style.marginTop = `${tagList.offsetHeight + existingMarginTop}px`;
  </script>
<?php endif; ?>

<section class="section bg-grey-cool">
  <div class="container">
    <div class="grid lg:grid-cols-[7fr,1fr,4fr]">
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
    <div>
      <?php
      $args = array(
        'post_type' => 'post',
        'meta_key'      => 'main_featured',
        'meta_value'    => true
      );

      $query = new WP_Query($args);
      ?>
      <div class="relative swiper swiper-featured-blog lg:h-[400px]">
        <div class="swiper-wrapper">
          <?php if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
              <?php
              $post_tags = get_the_tags();
              if (! empty($post_tags) && ! is_wp_error($post_tags)) {
                // Get the first tag (index 0)
                $first_tag = $post_tags[0];
                // var_dump($first_tag);
              }
              if (has_post_thumbnail()) {
                $featuredImageID = get_post_thumbnail_id();
                $featuredImage = wp_get_attachment_image_src($featuredImageID, 'featured-large');
                $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

                $featuredImageUrl = $featuredImage[0];
                $featuredImageAltText = $featuredImageAltText ?: '';
              } else {
                $featuredImageUrl = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
                $featuredImageAltText = 'Charlie Health Logo';
              }
              ?>
              <div class="swiper-slide">
                <div class="relative grid overflow-hidden rounded-md lg:grid-cols-2">
                  <div class="grid content-between order-2 bg-white lg:p-sp-8 p-sp-4 lg:order-1 gap-base5-4">
                    <?php if ($first_tag): ?>
                      <div>
                        <a href="<?= site_url('/resources/', $first_tag->slug); ?>" class="relative z-20 inline-block leading-none no-underline transition-all duration-300 bg-transparent border-2 text-primary border-primary rounded-pill p-sp-3 hover:bg-primary hover:text-white mb-sp-4 mr-sp-1"><?= $first_tag->name; ?></a>
                        <h3 class="text-primary text-h2-base"><?= get_the_title(); ?></h3>
                      </div>
                    <?php endif; ?>
                    <a href="<?= get_the_permalink(); ?>" class="no-underline text-primary stretched-link">Read more <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/arrow-right-blue.svg'); ?>" alt="arrow" class="inline-block h-sp-4 ml-sp-2"></a>
                  </div>
                  <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="order-1 object-cover lg:order-2 lg:h-[400px] w-full nolazy">
                </div>
              </div>
          <?php endwhile;
            wp_reset_postdata();
          endif; ?>
        </div>
        <div class="bottom-0 right-0 z-10 grid items-center grid-cols-3 lg:absolute justify-items-center gap-sp-4 lg:p-sp-8 mt-sp-8">
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
    </div>
  </div>
</section>
<section class="section-bottom">
  <div class="container">
    <h2>Tag Spotlight</h2>
    <div class="grid items-center overflow-auto gap-sp-3 lg:gap-sp-6 lg:flex lg:items-stretch custom-scroll">
      <?php
      $tags = get_tags();
      if ($tags) :  ?>
        <?php foreach ($tags as $tag) :
          $spotlight = get_field('spotlight_tag', $tag);
          if ($spotlight) :
        ?>
            <div class="lg:w-[calc(25%-18px)] flex-[0_0_auto] relative hover:shadow-lg duration-300 rounded-md overflow-hidden">
              <div class="h-full p-sp-4 bg-cream">
                <h3><a href="<?= get_term_link($tag->term_id); ?>" class="stretched-link"><?= $tag->name; ?></a></h3>
                <p class="m-0"><?= $tag->description; ?></p>
              </div>
            </div>
      <?php
          endif;
        endforeach;
      endif;
      ?>
    </div>
  </div>
</section>
<section id="postsContainer" class="section bg-off-white">
  <div class="container">
    <h2>Latest</h2>
    <div class="absolute invisible opacity-0 no-posts-js">
      <div class="grid items-center grid-cols-1 duration-300 rounded-md justify-items-center bg-cream lg:grid-cols-2 p-sp-4">
        <h4 class="mb-0">We couldn’t find what you’re looking for.</h4>
        <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/not-found.svg'); ?>" alt="not found icon">
      </div>
    </div>
    <div class="grid transition-all duration-300 lg:grid-cols-3 posts-container gap-x-sp-8 gap-y-sp-10 mb-sp-10">
      <?php
      $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

      $args = array(
        'post_type'      => 'post',
        'posts_per_page' => 6,
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
          <div class="relative bg-white rounded-lg group">
            <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
              <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
            </div>
            <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
              <?php $tags = get_the_terms(get_the_ID(), 'post_tag');  ?>
              <?php if ($tags) :  ?>
                <?php foreach ($tags as $tag) : ?>
                  <a href="<?= get_term_link($tag->slug, 'post_tag'); ?>" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-primary bg-white group-hover:bg-white-hover border border-white z-[6] text-h5-base"><?= $tag->name; ?></a>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
            <div class="grid bg-white rounded-b-lg p-sp-4">
              <h3 class="text-h4-base"><a href="<?= get_the_permalink(); ?>" class="block stretched-link"><?= get_the_title(); ?></a></h3>
              <p><?= $author->post_title; ?></p>
            </div>
          </div>
      <?php
        }
      }
      wp_reset_postdata();
      ?>
      <!-- Content -->
    </div>
    <div class="pagination-container"></div>
  </div>
</section>
<section class="section">
  <div class="container-sm">
    <?= do_blocks('<!-- wp:block {"ref":1709} /-->'); ?>
  </div>
</section>
<section id="researchContainer" class="section bg-off-white">
  <div class="container">
    <h2>Research</h2>
    <div class="grid lg:grid-cols-3 transition-all duration-300 scale-[0.99] opacity-0 posts-container-research gap-x-sp-8 gap-y-sp-10 mb-sp-10">
      <!-- Content -->
    </div>
    <div class="pagination-container-research"></div>
  </div>
</section>
<section class="section-bottom">
</section>
<?= do_blocks('<!-- wp:block {"ref":12} /-->'); ?>
<?php
$newsletterImage = get_field('image', 'option');
$headline = get_field('headline', 'option');
$subhead = get_field('subhead', 'option');
?>
<div id="newsletterPopup" class="bg-[rgba(0,0,0,.5)] fixed top-0 left-0 w-full h-full z-50 grid items-center justify-center center transition-all duration-300 modal-fade">
  <div class="transition-all duration-300 section-xs">
    <div class="grid lg:grid-cols-[1fr,2fr] bg-cream container max-h-[80vh] overflow-auto rounded-md items-center relative">
      <div class="absolute top-0 right-0 cursor-pointer">
        <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/close-x.svg'); ?>" alt="close button" class="w-full duration-300 modal-close p-sp-4 hover:brightness-0">
      </div>
      <img src="<?= $newsletterImage['sizes']['featured-large']; ?>" alt="<?= $newsletterImage['alt']; ?>" class="object-cover w-full h-full noshow lg:block">
      <div class="p-sp-8">
        <h2 class="text-h1-base font-heading"><?= $headline; ?></h2>
        <p class="h-full lg:block"><?= $subhead; ?></p>
        <div id="newsletterPopup">
          <?php include('wp-content/themes/charliehealth/includes/newsletter-form.php'); ?>
        </div>
        <h5 class="mt-base5-2">You can unsubscribe anytime.</h5>
      </div>
    </div>
  </div>
</div>

<?php get_footer(); ?>