<?php get_header(); ?>

<main id="primary" class="site-main lg:mt-[68px] mt-0">
  <div id="mainArticleContent" class="relative main-article-content">
    <div class="sticky back-to-top top-sp-16 left-sp-10 w-fit">
      <a href="#mainArticleContent">Back to top</a>
    </div>
    <?php the_content(); ?>
  </div>
</main>

<?php get_footer(); ?>