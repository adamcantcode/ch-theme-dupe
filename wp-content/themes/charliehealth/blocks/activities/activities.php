<?php
$filterTopics = get_terms('topic');
$filterTypes  = get_terms('resource-type');
$popularTopics = get_field('popular_topics');
$index = 0;
?>
<section class="section bg-primary">
  <div class="container">
    <div class="grid gap-base5-4 lg:grid-cols-[1fr_3fr]">
      <h2 class="text-white">Popular topics</h2>
      <div class="grid lg:grid-cols-3 gap-base5-4">
        <?php foreach ($popularTopics as $topic) : ?>
          <?php
          $index++;
          switch ($index) {
            case 1:
              $topicColor = 'bg-lavender-100';
              break;
            case 2:
              $topicColor = 'bg-pale-blue-100';
              break;
            case 3:
              $topicColor = 'bg-yellow-100';
              break;
            default:
              $topicColor = 'bg-lavender-100';
              break;
          }
          ?>
          <a href="#resourcesSection" data-topic-featured=".<?= $topic->slug; ?>" class="flex items-center justify-between transition-all rounded-md topic-filter-featured text-h4-base no-underline py-base5-4 px-base5-5 hover:contrast-75 <?= $topicColor; ?>">
            <p class="inline-block mb-0 text-h4-base"><?= $topic->name; ?></p>
            <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0862 0.281473L19.5226 6.39729C19.979 6.77258 19.979 7.38106 19.5226 7.75636L12.0862 13.8722C11.6299 14.2475 10.89 14.2475 10.4337 13.8722C9.97731 13.4969 9.97731 12.8884 10.4337 12.5131L15.8753 8.03783H0V6.11582H15.8753L10.4337 1.64054C9.97731 1.26525 9.97731 0.65677 10.4337 0.281473C10.89 -0.0938243 11.6299 -0.0938243 12.0862 0.281473Z" fill="#161A3D" />
            </svg>
          </a>
        <?php endforeach; ?>
      </div>
    </div>
  </div>
</section>
<section class="section bg-grey-cool" id="resourcesSection">
  <div class="container">
    <div class="grid lg:grid-cols-[1fr_1fr_2fr] gap-base5-4 mb-base5-4 lg:mb-0">
      <h2>Charlie Health resources</h2>
      <div></div>
      <div>
        <input autocomplete="false" type="search" class="w-full bg-white border rounded-md search-input-js border-primary py-base5-2 px-base5-3" placeholder="Search..." />
      </div>
    </div>
    <div class="grid lg:grid-cols-[1fr_3fr] min-h-screen gap-base5-4">
      <div>
        <div class="flex items-center justify-between transition-all border rounded-md cursor-pointer py-base5-2 px-base5-3 border-primary filters-js">
          <p class="inline-block mb-0">Filters</p>
          <svg width="17" height="11" viewBox="0 0 17 11" fill="none" xmlns="http://www.w3.org/2000/svg" class="transition-all duration-500 down-arrow-js">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M1.50015 0.585938L8.50015 7.58594L15.5002 0.585938L16.9144 2.00015L8.50015 10.4144L0.0859375 2.00015L1.50015 0.585938Z" fill="#161A3D" />
          </svg>
        </div>
        <div class="overflow-hidden transition-all max-h-0">
          <div class="z-20 grid transition-all duration-500 -translate-y-full bg-white shadow-sm filter-button-group-js rounded-b-md mx-base5-2 p-base5-4 gap-base5-2">
            <div class="grid gap-base5-2">
              <p class="mb-0">Resource topic</p>
              <?php foreach ($filterTopics as $filterTopic) : ?>
                <label class="flex items-center mb-0 antialiased cursor-pointer text-p-base gap-base5-2"><input type="checkbox" value=".<?= $filterTopic->slug; ?>" class="topic-filter" /><?= $filterTopic->name; ?></label>
              <?php endforeach; ?>
            </div>
            <div class="grid gap-base5-2">
              <p class="mb-0">Resource type</p>
              <?php foreach ($filterTypes as $filterType) : ?>
                <label class="flex items-center mb-0 antialiased cursor-pointer text-p-base gap-base5-2"><input type="checkbox" value=".<?= $filterType->slug; ?>" class="type-filter" /><?= $filterType->name; ?></label>
              <?php endforeach; ?>
            </div>
          </div>
          <a role="button" id="resetButton" class="z-10 invisible block text-center text-white no-underline opacity-0 bg-primary-100 hover:bg-primary-200 mx-base5-4 py-base5-1 px-base5-4 rounded-b-md">Reset</a>
        </div>
      </div>
      <div class="overflow-hidden">
        <div class="flex transition-all opacity-0 grid-resources">
          <div class="w-full grid-sizer lg:w-[calc(33.33%_-15px)]"></div>
          <?php
          $args = array(
            'post_type'      => 'activities',
            'posts_per_page' => -1,
            'order'          => 'DESC',
            'orderby'        => 'date',
            'post_status'    => 'publish',
            'cache_results' => false,
            'update_post_meta_cache' => false,
            'update_post_term_cache' => false,
          );

          $query = new WP_Query($args);

          if ($query->have_posts()) : while ($query->have_posts()) : $query->the_post(); ?>
              <?php
              // Image
              if (has_post_thumbnail()) {
                $featuredImageID      = get_post_thumbnail_id();
                $featuredImage        = wp_get_attachment_image_src($featuredImageID, 'card-thumb');
                $featuredImageAltText = get_post_meta($featuredImageID, '_wp_attachment_image_alt', true);

                $featuredImageUrl     = $featuredImage[0];
                $featuredImageAltText = $featuredImageAltText ?: '';
              } else {
                $featuredImageUrl     = site_url('/wp-content/uploads/2023/06/charlie-health_find-your-group.png.webp');
                $featuredImageAltText = 'Charlie Health Logo';
              }

              // Tags
              $topics = get_the_terms(get_the_ID(), 'topic');
              $types  = get_the_terms(get_the_ID(), 'resource-type');
              if (is_array($topics)) {
                $topicName = $topics[0]->name;
                $topic     = [];
                foreach ($topics as $topicSlug) {
                  $topic[] = $topicSlug->slug;
                }
              }
              if (is_array($types)) {
                $typeName = $types[0]->name;
                $type     = [];
                foreach ($types as $typesSlug) {
                  $type[] = $typesSlug->slug;
                }
              }

              // Link
              // If no cookie
              $media = get_field('media', get_the_ID()) ?: false;
              if ($media) {
                // Remove part of link so that it can't be copied at least
                $stripped = strstr($media, '/wp-content/uploads/');
                $media    = substr($stripped, strlen('/wp-content/uploads/'));
              }
              $gated = get_field('gated', get_the_ID());
              if ($gated) {
                $link = home_url('/gated/?pdf_link=') . $media;
              } else {
                if ($media) {
                  $link = home_url('/wp-content/uploads/') . $media;
                } else {
                  $link = get_the_permalink(get_the_ID());
                }
              }

              // If cookie
              $successLink = $media ? home_url('/wp-content/uploads/') . $media : get_the_permalink(get_the_ID());
              ?>
              <div class="relative w-full mb-base5-4 bg-white rounded-lg group grid-item lg:w-[calc(33.33%_-15px)] <?= implode(' ', $topic); ?> <?= implode(' ', $type); ?>">
                <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
                  <img src="<?= $featuredImageUrl; ?>" alt="<?= $featuredImageAltText; ?>" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
                </div>
                <?php if ($topic) : ?>
                  <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
                    <p class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-primary bg-white group-hover:bg-white-hover border border-white z-[6] text-h5-base cursor-pointer"><?= $topicName; ?></p>
                  </div>
                <?php endif; ?>
                <div class="grid bg-white rounded-b-lg p-sp-4">
                  <h3 class="text-h4-base"><a href="<?= $link; ?>" class="block stretched-link success-link-js" data-success-link="<?= $successLink ?>"><?= get_the_title(); ?></a></h3>
                  <?php if ($type) : ?>
                    <p><?= $typeName; ?></p>
                  <?php endif; ?>
                </div>
              </div>
          <?php endwhile;
            wp_reset_postdata();
          endif;
          ?>
        </div>
        <div class="grid justify-end">
          <a role="button" class="w-full ch-button button-primary-ch justify-self-center lg:w-auto load-more-js">Load more</a>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    // Cache DOM elements
    const elements = {
      loadMoreButton: document.querySelector('.load-more-js'),
      searchInput: document.querySelector('.search-input-js'),
      grid: document.querySelector('.grid-resources'),
      filterButtonGroup: document.querySelector('.filter-button-group-js'),
      filterButton: document.querySelector('.filters-js'),
      resetButton: document.querySelector('#resetButton'),
      downArrow: document.querySelector('.down-arrow-js'),
      checkboxes: document.querySelectorAll('.filter-button-group-js input[type="checkbox"]'),
      featuredTopics: document.querySelectorAll('.topic-filter-featured')
    };

    // Configuration object
    const config = {
      itemsPerPage: 9,
      loadMoreIncrement: 6,
      transitionDuration: 500,
      gutterSize: 20
    };

    // Initialize Isotope with optimized settings
    const iso = new Isotope(elements.grid, {
      itemSelector: '.grid-item',
      initLayout: false,
      columnWidth: '.grid-sizer',
      layoutMode: 'fitRows',
      stagger: 0,
      transitionDuration: config.transitionDuration,
      percentPosition: true,
      fitRows: {
        gutter: config.gutterSize
      },
      hiddenStyle: {
        opacity: 0,
        transform: 'scale(0.9)'
      },
      visibleStyle: {
        opacity: 1,
        transform: 'scale(1)'
      }
    });

    // Cache all items
    const itemsAll = iso.getItemElements();

    // Utility functions
    const utils = {
      getCheckedValues: selector => Array.from(document.querySelectorAll(`${selector}:checked`)).map(input => input.value),

      generateCombinedFilters: (topicFilters, typeFilters) => {
        const topics = topicFilters.length === 0 ? ['*'] : topicFilters;
        const types = typeFilters.length === 0 ? ['*'] : typeFilters;
        return topics.flatMap(topic => types.map(type => `${topic}${type}`));
      },

      checkCookie: name => document.cookie.split(';').some(cookie =>
        cookie.trim().startsWith(name + "=")),

      debounce: (func, wait) => {
        let timeout;
        return function executedFunction(...args) {
          const later = () => {
            clearTimeout(timeout);
            func(...args);
          };
          clearTimeout(timeout);
          timeout = setTimeout(later, wait);
        };
      }
    };

    // State management
    const state = {
      initialize() {
        // Hide items after initial count
        itemsAll.forEach((item, index) => {
          if (index > config.itemsPerPage - 1) item.classList.add('noshow');
        });

        elements.loadMoreButton.classList.toggle('noshow', itemsAll.length < config.itemsPerPage);
        elements.grid.classList.remove('opacity-0');
        iso.arrange();
      },

      handleVisibilityAfterFilter() {
        const itemsFilters = iso.getFilteredItemElements();

        // Reset visibility states
        itemsAll.forEach(item => item.classList.remove('active', 'noshow'));

        // Apply new visibility states
        itemsFilters.forEach((item, index) => {
          item.classList.add('active');
          if (index > config.itemsPerPage - 1) item.classList.add('noshow');
        });

        const filteredElements = itemsAll.filter(element => element.classList.contains('active'));
        elements.loadMoreButton.classList.toggle('noshow', filteredElements.length < config.itemsPerPage);

        iso.arrange();
      }
    };

    // Event handlers
    const handlers = {
      updateFilter() {
        const topicFilters = utils.getCheckedValues('.topic-filter');
        const typeFilters = utils.getCheckedValues('.type-filter');
        const combinedFilter = utils.generateCombinedFilters(topicFilters, typeFilters).join(',');

        iso.arrange({
          filter: combinedFilter
        });
        state.handleVisibilityAfterFilter();
      },

      updateSearch: utils.debounce(function() {
        const searchValue = elements.searchInput.value.trim().toLowerCase();
        const currentFilteredItems = Isotope.data(elements.grid).filteredItems;

        if (!searchValue) {
          handlers.updateFilter();
          return;
        }

        iso.arrange({
          filter: function() {
            if (!currentFilteredItems.some(item => item.element === this)) return false;

            return Array.from(this.querySelectorAll('h3 a'))
              .some(element => element.textContent.toLowerCase().includes(searchValue));
          }
        });

        state.handleVisibilityAfterFilter();
      }, 300),

      loadMoreItems() {
        const hiddenItems = itemsAll.filter(item => item.classList.contains('noshow'));
        hiddenItems.slice(0, config.loadMoreIncrement).forEach(item => item.classList.remove('noshow'));

        iso.arrange();

        if (hiddenItems.length <= config.loadMoreIncrement) {
          elements.loadMoreButton.classList.add('noshow');
        }
      },

      toggleFilters() {
        elements.filterButtonGroup.classList.toggle('-translate-y-full');
        elements.filterButtonGroup.parentElement.classList.toggle('max-h-0');
        elements.downArrow.classList.toggle('rotate-180');
      },

      handleReset() {
        elements.checkboxes.forEach(checkbox => {
          if (checkbox.checked) {
            checkbox.checked = false;
            handlers.updateFilter();
          }
        });
        elements.resetButton.classList.add('opacity-0', 'invisible');
      },

      checkResetButtonVisibility() {
        const anyChecked = Array.from(elements.checkboxes).some(checkbox => checkbox.checked);
        elements.resetButton.classList.toggle('opacity-0', !anyChecked);
        elements.resetButton.classList.toggle('invisible', !anyChecked);
      }
    };

    // Initialize featured topics
    elements.featuredTopics.forEach(topicButton => {
      const topicValue = topicButton.getAttribute('data-topic-featured');

      topicButton.addEventListener('click', () => {
        elements.checkboxes.forEach(checkbox => checkbox.checked && checkbox.click());

        const targetCheckbox = document.querySelector(`.topic-filter[value='${topicValue}']`);
        if (!targetCheckbox.checked) targetCheckbox.click();
      });
    });

    // Handle gated content
    if (utils.checkCookie("gatedSubmission")) {
      document.querySelectorAll('.success-link-js').forEach(link => {
        link.href = link.getAttribute('data-success-link');
      });
    }

    // Event listeners
    elements.filterButtonGroup.addEventListener('change', handlers.updateFilter);
    elements.searchInput.addEventListener('input', handlers.updateSearch);
    elements.loadMoreButton.addEventListener('click', handlers.loadMoreItems);
    elements.filterButton.addEventListener('click', handlers.toggleFilters);
    elements.resetButton.addEventListener('click', handlers.handleReset);
    elements.checkboxes.forEach(checkbox =>
      checkbox.addEventListener('change', handlers.checkResetButtonVisibility));

    // Handle page refresh on navigation
    window.addEventListener('beforeunload', () => window.location.reload(true));

    // Initialize the grid
    state.initialize();
  });
</script>