<?php get_header(); ?>

<main id="primary" class="site-main lg:mt-[68px] mt-0">
  <section class="section bg-cream">
    <div class="container">
      <div>
        <div class="breadcrumbs mb-sp-5 lg:mb-sp-6">
          <a href="<?= get_post_type_archive_link('post'); ?>">The Library</a>
          <span>/</span>
          <span><?= single_term_title(); ?></span>
        </div>
      </div>
      <div class="grid lg:grid-cols-2 mb-sp-12 gap-sp-12">
        <div>
          <h1><?= single_term_title(); ?></h1>
          <!-- <p>Stay up to date on mental health research, wellness techniques, treatment services, and more.</p> -->
        </div>
        <div class="grid gap-sp-16">
          <form role="search" method="get" class="search-form" action="<?php echo esc_url(site_url('/search')); ?>">
            <label>
              <span class="screen-reader-text"><?php echo _x('Search for:', 'label'); ?></span>
              <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="query" />
            </label>
            <button type="submit" class="search-submit"><?php echo esc_html_x('Search', 'submit button'); ?></button>
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
                <div class="relative flex flex-col rounded-md gap-sp-4 bg-purple-gradient-end p-sp-5">
                  <div>
                    <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/person.svg'); ?>" alt="icon of person">
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
        <div class="relative swiper swiper-featured-blog">
          <div class="swiper-wrapper">
            <div class="swiper-slide">
              <div class="relative grid overflow-hidden rounded-md lg:grid-cols-2">
                <div class="grid content-between order-2 bg-purple-gradient-start lg:p-sp-8 p-sp-4 lg:order-1">
                  <div>
                    <div>{grid}</div>
                    <h3 class="text-white text-h1 lg:text-h1-lg">TITLE</h3>
                  </div>
                  <a href="#" class="text-white stretched-link">Read more</a>
                </div>
                <img src="<?= placeHolderImage(800, 600); ?>" alt="alt" class="order-1 object-cover lg:order-2">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="relative grid overflow-hidden rounded-md lg:grid-cols-2">
                <div class="grid content-between order-2 bg-purple-gradient-start lg:p-sp-8 p-sp-4 lg:order-1">
                  <div>
                    <div>{grid}</div>
                    <h3 class="text-white text-h1 lg:text-h1-lg">TITLE</h3>
                  </div>
                  <a href="#" class="text-white stretched-link">Read more</a>
                </div>
                <img src="<?= placeHolderImage(800, 600); ?>" alt="alt" class="order-1 object-cover lg:order-2">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="relative grid overflow-hidden rounded-md lg:grid-cols-2">
                <div class="grid content-between order-2 bg-purple-gradient-start lg:p-sp-8 p-sp-4 lg:order-1">
                  <div>
                    <div>{grid}</div>
                    <h3 class="text-white text-h1 lg:text-h1-lg">TITLE</h3>
                  </div>
                  <a href="#" class="text-white stretched-link">Read more</a>
                </div>
                <img src="<?= placeHolderImage(800, 600); ?>" alt="alt" class="order-1 object-cover lg:order-2">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="relative grid overflow-hidden rounded-md lg:grid-cols-2">
                <div class="grid content-between order-2 bg-purple-gradient-start lg:p-sp-8 p-sp-4 lg:order-1">
                  <div>
                    <div>{grid}</div>
                    <h3 class="text-white text-h1 lg:text-h1-lg">TITLE</h3>
                  </div>
                  <a href="#" class="text-white stretched-link">Read more</a>
                </div>
                <img src="<?= placeHolderImage(800, 600); ?>" alt="alt" class="order-1 object-cover lg:order-2">
              </div>
            </div>
            <div class="swiper-slide">
              <div class="relative grid overflow-hidden rounded-md lg:grid-cols-2">
                <div class="grid content-between order-2 bg-purple-gradient-start lg:p-sp-8 p-sp-4 lg:order-1">
                  <div>
                    <div>{grid}</div>
                    <h3 class="text-white text-h1 lg:text-h1-lg">TITLE</h3>
                  </div>
                  <a href="#" class="text-white stretched-link">Read more</a>
                </div>
                <img src="<?= placeHolderImage(800, 600); ?>" alt="alt" class="order-1 object-cover lg:order-2">
              </div>
            </div>
          </div>
          <div class="bottom-0 right-0 z-10 grid items-center grid-cols-3 lg:absolute justify-items-center gap-sp-4 lg:p-sp-8 mt-sp-8">
            <div class="swiper-button-prev-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                <rect width="50" height="50" rx="25" fill="#ffffff" />
                <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" />
                <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
              </svg>
            </div>
            <div class="!relative swiper-pagination !inset-auto"></div>
            <div class="swiper-button-next-arrow">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
                <rect width="50" height="50" rx="25" fill="#ffffff" />
                <path d="M38.0607 26.0607C38.6464 25.4749 38.6464 24.5251 38.0607 23.9393L28.5147 14.3934C27.9289 13.8076 26.9792 13.8076 26.3934 14.3934C25.8076 14.9792 25.8076 15.9289 26.3934 16.5147L34.8787 25L26.3934 33.4853C25.8076 34.0711 25.8076 35.0208 26.3934 35.6066C26.9792 36.1924 27.9289 36.1924 28.5147 35.6066L38.0607 26.0607ZM13 26.5H37V23.5H13V26.5Z" fill="#212984" />
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
      <div class="grid lg:grid-cols-3 gap-sp-16">
        <div class="relative flex flex-col items-start gap-sp-4">
          <h6 class="absolute top-0 right-0"><a role="button" class="hidden js-reset">Reset all</a></h6>
          <?php
          $terms = get_terms(array(
            'taxonomy' => 'post_tag',
            'hide_empty' => false,
          ));
          // var_dump($terms);
          foreach ($terms as $term) : ?>
            <h6 data-tag-id="<?= $term->term_id; ?>" class="inline-block mb-0 rounded-lg cursor-pointer js-tag-id bg-tag-gray p-sp-4"><?= $term->name; ?></h5>
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
      <?= do_blocks('<!-- wp:acf/pre-footer-cta-block {"name":"acf/pre-footer-cta-block"} /-->'); ?>
    </div>
  </section>
  <section class="section">
    <div class="container-sm">
      <?= do_blocks('<!-- wp:block {"ref":458} /-->'); ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>