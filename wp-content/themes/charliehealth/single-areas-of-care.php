<?php get_header(); ?>

<main id="primary" class="site-main lg:mt-[68px] mt-0">
  <div class="hero">
    HERO
  </div>
  <div id="mainContent" class="relative">
    <div class="sticky back-top-top top-sp-16 left-sp-10 w-fit">
      <a href="#mainContent">Back to top</a>
    </div>
    <?php the_content(); ?>
  </div>
</main>

<?php get_footer(); ?>