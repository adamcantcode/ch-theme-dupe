<?php
/*
Template Name: Search Page
*/
?>
<?php get_header(); ?>

<main id="primary" class="site-main lg:mt-[68px] mt-0">
  <section class="section bg-cream">
    <div class="container">
      <div class="grid lg:grid-cols-2 gap-sp-12">
        <h1 class="noshow">Search Results</h1>
        <div class="mb-sp-4">
          <!-- TODO figure out /blog and make dynamic -->
          <a href="<?= get_post_type_archive_link('post'); ?>" class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 50 50" fill="none">
              <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" />
            </svg>
            <p class="mb-0 ml-sp-2">Back to The Library</p>
          </a>
        </div>
        <div class="grid gap-sp-16">
          <form role="search" method="get" class="relative search-form" action="<?= esc_url(site_url('/search')); ?>">
            <label>
              <span class="screen-reader-text"><?= _x('Search for:', 'label'); ?></span>
              <input type="search" class="w-full border-none rounded-sm outline-none search-field h-sp-12 lg:h-sp-14 text-h3 lg:text-h3-lg py-sp-4 px-sp-6 focus-visible:border-none" placeholder="Search..." value="" name="query" />
            </label>
            <button type="submit" class="absolute top-0 right-0 flex items-center justify-center h-full transition-colors duration-300 bg-white rounded-sm search-submit aspect-square hover:bg-lightest-purple"><img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/search.svg'); ?>" alt="" srcset=""></button>
          </form>
        </div>
      </div>
    </div>
  </section>
  <section id="postsContainer" class="section">
    <div class="container">
      <h2>Search results for: <span class="px-2 text-white bg-med-blue"><?= $_GET['query']; ?></span></h2>
      <div class="divider mb-sp-16"></div>
      <div class="grid lg:grid-cols-3 transition-all duration-300 scale-[0.99] opacity-0 posts-container gap-x-sp-8 gap-y-sp-10 mb-sp-10">
        <!-- <div class="relative grid overflow-hidden border rounded-sm border-card-border">
          <img src="https://images.placeholders.dev/? width=800&height=600&text=FPO" alt="" class="object-cover lg:h-[220px] h-[150px] w-full">
          <div class="grid p-sp-4">
            <h3><a href="${post.link}" class="stretched-link">${post.title.rendered}</a></h3>
            <h5>author</h5>
            <div>tags tags</div>
          </div>
        </div> -->
      </div>
      <div class="pagination-container"></div>
    </div>
  </section>
  <section class="section-horizontal">
    <div class="container">
      <div class="rounded-md border-gradient">
        <div class="items-center justify-between lg:flex p-sp-8">
          <h4 class="lg:mb-0">Curious about something we haven’t covered?<br>Write to us and let us know.</h4>
          <p class="mb-0">Write to us at<br><a href="mailto:library@charliehealth.com">library@charliehealth.com</a></p>
        </div>
      </div>
    </div>
  </section>
  <section class="section">
    <div class="container-md">
      <?= do_blocks('<!-- wp:block {"ref":11} /-->'); ?>
    </div>
  </section>
</main>

<?php get_footer(); ?>