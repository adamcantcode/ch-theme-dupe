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

        // var_dump($terms);
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
      <?php
      if (have_posts()) :
        while (have_posts()) : the_post(); ?>
      <?php endwhile;
      else :
        _e('Sorry, no posts were found.', 'textdomain');
      endif;
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>