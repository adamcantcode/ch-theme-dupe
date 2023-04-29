<?php get_header(); ?>

<main id="primary" class="site-main lg:mt-[68px] mt-0">
  <section class="section">
    <div class="container">
      <?php
      if (have_posts()) :
        while (have_posts()) : the_post(); ?>
          <?= get_the_content(); ?>
      <?php endwhile;
      else :
        _e('Sorry, no posts were found.', 'textdomain');
      endif;
      ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>