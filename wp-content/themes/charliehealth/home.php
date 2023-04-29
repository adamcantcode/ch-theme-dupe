<?php get_header(); ?>

<main id="primary" class="site-main lg:mt-[68px] mt-0">
  <section class="section bg-cream">
    <div class="container">
      <div class="grid grid-cols-[2fr,1fr] mb-sp-12">
        <div>
          <h1 class="text-h1-display-lg">The Library</h1>
          <p>Stay up to date on mental health research, wellness techniques, treatment services, and more.</p>
        </div>
        <div>
          <form role="search" method="get" class="search-form" action="<?php echo esc_url(site_url('/search')); ?>">
            <label>
              <span class="screen-reader-text"><?php echo _x('Search for:', 'label'); ?></span>
              <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder'); ?>" value="<?php echo get_search_query(); ?>" name="query" />
            </label>
            <button type="submit" class="search-submit"><?php echo esc_html_x('Search', 'submit button'); ?></button>
          </form>
        </div>
      </div>
      <div class="grid lg:grid-cols-3 gap-sp-4">
        <?php
        $terms = get_terms(array(
          'taxonomy' => 'category',
          'hide_empty' => false,
        ));
        foreach ($terms as $term) : ?>
          <div class="relative flex flex-col rounded-md gap-sp-4 bg-purple-gradient-end p-sp-5">
            <div>
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/person.svg'); ?>" alt="icon of person">
            </div>
            <div class="flex items-center justify-between">
              <h3 class="mb-0"><a href="<?= site_url($term->slug); ?>" class="text-white stretched-link lg:text-h3-lg text-h3"><?= $term->name; ?></a></h3>
              <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/arrow-left.svg'); ?>" alt="arrow icon" class="h-auto rotate-180 w-sp-6">
            </div>
          </div>
        <?php endforeach; ?>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <h2>Featured</h2>
      <div>
        <div class="swiper swiper-featured-blog">
          <div class="swiper-wrapper">
            <div class="swiper-slide ">
              <div class="grid content-between bg-purple-gradient-start lg:p-sp-8 p-sp-4">
                <div>
                  <div>{grid}</div>
                  <h3>TITLE</h3>
                </div>
                <a href="#" class="stretched-link">Read more</a>
              </div>
              <img src="<?= placeHolderImage(800, 600); ?>" alt="alt">
            </div>
            <div class="swiper-slide ">
              <div class="grid content-between bg-purple-gradient-start lg:p-sp-8 p-sp-4">
                <div>
                  <div>{grid}</div>
                  <h3>TITLE</h3>
                </div>
                <a href="#" class="stretched-link">Read more</a>
              </div>
              <img src="<?= placeHolderImage(800, 600); ?>" alt="alt">
            </div>
            <div class="swiper-slide ">
              <div class="grid content-between bg-purple-gradient-start lg:p-sp-8 p-sp-4">
                <div>
                  <div>{grid}</div>
                  <h3>TITLE</h3>
                </div>
                <a href="#" class="stretched-link">Read more</a>
              </div>
              <img src="<?= placeHolderImage(800, 600); ?>" alt="alt">
            </div>
            <div class="swiper-slide ">
              <div class="grid content-between bg-purple-gradient-start lg:p-sp-8 p-sp-4">
                <div>
                  <div>{grid}</div>
                  <h3>TITLE</h3>
                </div>
                <a href="#" class="stretched-link">Read more</a>
              </div>
              <img src="<?= placeHolderImage(800, 600); ?>" alt="alt">
            </div>
            <div class="swiper-slide ">
              <div class="grid content-between bg-purple-gradient-start lg:p-sp-8 p-sp-4">
                <div>
                  <div>{grid}</div>
                  <h3>TITLE</h3>
                </div>
                <a href="#" class="stretched-link">Read more</a>
              </div>
              <img src="<?= placeHolderImage(800, 600); ?>" alt="alt">
            </div>
          </div>
          <div class="absolute left-0 swiper-button-prev-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
              <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" />
              <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
            </svg>
          </div>
          <div class="absolute right-0 swiper-button-next-arrow">
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
              <path d="M38.0607 26.0607C38.6464 25.4749 38.6464 24.5251 38.0607 23.9393L28.5147 14.3934C27.9289 13.8076 26.9792 13.8076 26.3934 14.3934C25.8076 14.9792 25.8076 15.9289 26.3934 16.5147L34.8787 25L26.3934 33.4853C25.8076 34.0711 25.8076 35.0208 26.3934 35.6066C26.9792 36.1924 27.9289 36.1924 28.5147 35.6066L38.0607 26.0607ZM13 26.5H37V23.5H13V26.5Z" fill="#212984" />
              <rect x="0.5" y="0.5" width="49" height="49" rx="24.5" stroke="#2A2D4F" stroke-opacity="0.4" />
            </svg>
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container">
      <?php
      if (have_posts()) :
        while (have_posts()) : the_post(); ?>
          <?= get_the_title(); ?>
      <?php endwhile;
      else :
        _e('Sorry, no posts were found.', 'textdomain');
      endif;
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>