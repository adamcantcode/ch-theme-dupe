<?php get_header(); ?>

<main id="primary" class="site-main lg:mt-[68px] mt-0">
  <div id="mainArticleContent" class="relative main-article-content">
    <div class="opacity-0 lg:sticky back-to-top top-sp-16 left-sp-10 mb-sp-16 w-fit">
      <a href="#mainArticleContent">Back to top</a>
    </div>
    <?php the_content(); ?>
  </div>
  <div class="h-[100vh]"></div>
  <div>CTA</div>
  <div>OTHER</div>
</main>

<?php get_footer(); ?>