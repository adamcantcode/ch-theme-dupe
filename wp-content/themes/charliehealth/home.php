<?php get_header(); ?>

<main id="primary" class="site-main lg:mt-[68px] mt-0">
  <section class="section bg-cream">
    <div class="container">
      <div class="grid grid-cols-[2fr,1fr]">
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