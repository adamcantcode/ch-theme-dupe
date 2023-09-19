<?php get_header(); ?>

<?php if (!get_field('use_resources_template')) : ?>
  <main id="primary" class="site-main mt-[68px]">
    <section class="section">
      <div class="container">
        <div class="mb-sp-8">
          <a href="<?= get_post_type_archive_link('post'); ?>" class="flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 50 50" fill="none">
              <path d="M11.9393 26.0607C11.3536 25.4749 11.3536 24.5251 11.9393 23.9393L21.4853 14.3934C22.0711 13.8076 23.0208 13.8076 23.6066 14.3934C24.1924 14.9792 24.1924 15.9289 23.6066 16.5147L15.1213 25L23.6066 33.4853C24.1924 34.0711 24.1924 35.0208 23.6066 35.6066C23.0208 36.1924 22.0711 36.1924 21.4853 35.6066L11.9393 26.0607ZM37 26.5H13V23.5H37V26.5Z" fill="#212984" />
            </svg>
            <p class="mb-0 ml-sp-2">Back to The Library</p>
          </a>
        </div>
        <div class="grid lg:grid-cols-[2fr,1fr] mb-sp-12">
          <div>
            <h1 class="text-h1-display-lg"><?= ucwords(single_tag_title('', false)); ?></h1>
          </div>
          <div>
            <form role="search" method="get" class="relative search-form" action="<?= esc_url(site_url('/search')); ?>">
              <label>
                <span class="screen-reader-text"><?= _x('Search for:', 'label'); ?></span>
                <input type="search" class="w-full border rounded-sm outline-none border-text search-field h-sp-12 lg:h-sp-14 text-h3 lg:text-h3-lg py-sp-4 px-sp-6 focus-visible:border" placeholder="Search..." value="" name="query" />
              </label>
              <button type="submit" class="absolute top-0 right-0 flex items-center justify-center h-full transition-colors duration-300 scale-95 bg-white rounded-sm search-submit aspect-square hover:bg-lightest-purple"><img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/search.svg'); ?>" alt="icon for search" srcset=""></button>
            </form>
          </div>
        </div>
        <div class="flex items-start overflow-x-scroll gap-sp-4 whitespace-nowrap custom-scroll">
          <?php
          $terms = get_terms(array(
            'taxonomy' => 'post_tag',
            'hide_empty' => false,
          ));
          $currentTag = get_queried_object()->slug;
          foreach ($terms as $term) : ?>
            <a href="<?= site_url('/post-tags/' . $term->slug); ?>" class="no-underline duration-300 rounded-lg px-sp-4 py-sp-3 text-h5 <?= $currentTag === $term->slug ? 'bg-dark-blue text-white' : 'bg-tag-gray hover:bg-bright-teal'; ?>"><?= $term->name; ?></a>
          <?php endforeach; ?>
        </div>
      </div>
    </section>
    <section id="postsContainer" class="section-bottom">
      <div class="container">
        <h2>Top posts for <?= ucwords(single_tag_title('', false)); ?></h2>
        <div class="absolute invisible opacity-0 no-posts-js">
          <div class="grid items-center grid-cols-1 duration-300 rounded-md justify-items-center bg-cream lg:grid-cols-2 p-sp-4">
            <h4 class="mb-0">There aren't any posts that match this tag. Try again with another tag</h4>
            <img src="<?= site_url('/wp-content/themes/charliehealth/resources/images/icons/not-found.svg'); ?>" alt="not found icon">
          </div>
        </div>
        <div class="grid lg:grid-cols-3 transition-all duration-300 scale-[0.99] opacity-0 posts-container gap-x-sp-8 gap-y-sp-10 mb-sp-10">
          <!-- `<div class="relative grid overflow-hidden duration-300 border rounded-sm border-card-border hover:shadow-lg">
          <img src="https://images.placeholders.dev/?width=800&height=600&text=FPO" alt="" class="object-cover lg:h-[220px] h-[150px] w-full">
          <div class="grid p-sp-4">
            <h3><a href="${post.link}" class="stretched-link">${post.title.rendered}</a></h3>
            <h5>author</h5>
            <div class="grid items-end justify-start grid-flow-col gap-sp-4">
              ${tags.map((tag) => `<a href="${tag.link}" class="relative z-20 inline-block no-underline rounded-lg px-sp-4 py-sp-3 text-h6 bg-tag-gray hover:bg-bright-teal">${tag.name}</a>`).join('')}
            </div>
          </div>
        </div>` -->
        </div>
        <div class="pagination-container"></div>
      </div>
    </section>
    <section class="section-bottom">
      <div class="container">
        <?= do_blocks('<!-- wp:acf/divider-block {"name":"acf/divider-block"} /-->'); ?>
      </div>
    </section>
    <?= do_blocks('<!-- wp:block {"ref":12} /-->'); ?>
  </main>
<?php else : ?>
  <main id="primary" class="site-main mt-[68px]">
  </main>
<?php endif; ?>

<?php get_footer(); ?>