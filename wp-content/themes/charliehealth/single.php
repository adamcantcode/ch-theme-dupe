<?php get_header(); ?>

<main id="primary" class="site-main lg:mt-[68px] mt-0">
  <div id="mainArticleContent" class="relative main-article-content">
    <section class="section">
      <div class="container">
        <div>back</div>
        <div class="grid items-center lg:grid-cols-2 gap-sp-16">
          <div>
            <img src="<?= placeHolderImage(525, 525); ?>" alt="" class="rounded-md max-h-[200px] lg:max-h-none object-cover w-full">
          </div>
          <div class="">
            <h1 class="text-h2 font-heading-serif"><?= get_the_title(); ?></h1>
            <p class="font-bold">Est. reading time: 4 min.</p>
            <p>OCD is characterized by obsessions and compulsions, while anxiety disorders stem from anxious thoughts.</p>
            <p class="mb-0">By: <a href="#">Sarah Fielding</a></p>
            <p class="mb-0">Clinically Reviewed By: <a href="#">Don Gasparini Ph.D., M.A., CASAC</a></p>
            <p>April 20, 2023</p>
            <p class="font-heading-serif">Share: </p>
            <div>cats</div>
            <div>tags</div>
          </div>
        </div>
      </div>
    </section>
    <div class="invisible hidden opacity-0 back-to-top top-sp-16 left-sp-10 mb-sp-16 w-fit">
      <h3><a href="#mainArticleContent">Back to top</a></h3>
    </div>
    <section class="section">
      <div class="container-sm">
        <?php the_content(); ?>
      </div>
    </section>
  </div>
</main>

<?php get_footer(); ?>