<?php get_header(); ?>

<main id="primary" class="site-main lg:mt-[68px] mt-0">
  <div id="mainArticleContent" class="relative main-article-content">
    <section class="section">
      <div class="container">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 0 50 50" fill="none">
            <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" />
          </svg>
          <!-- TODO figure out /blog and make dynamic -->
          <a href="<?= site_url() . '/blog'; ?>">Back to The Library</a>

        </div>
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
    <section class="section-xs">
      <div class="container-sm">
        <div class="rounded-md toc-container bg-light-purple">
          <div class="flex cursor-pointer toc-heading p-sp-4">
            <h3 class="mb-0">Table of Contents</h3>
            <div class="flex items-center ml-auto lg:mr-sp-5 toggle">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" preserveAspectRatio="none" viewBox="8 8 8 8" height="12px" width="12px">
                <path d="M9 12H15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M12 9L12 15" stroke="#323232" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </div>
          </div>
          <div class="overflow-hidden transition-all duration-500 ease-in-out toc-content max-h-0">
            <div id="toc" class="flex flex-col p-sp-4"></div>
          </div>
        </div>
      </div>
    </section>
    <section class="section-horizontal">
      <div class="container">
        <div class="divider"></div>
      </div>
    </section>
    <article id="articleContent" class="section">
      <div class="container-sm">
        <?php the_content(); ?>
      </div>
    </article>
  </div>
</main>

<?php get_footer(); ?>