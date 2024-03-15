<?php
$filterTopics = get_terms('topic');
$filterTypes  = get_terms('resource-type');
?>
<section class="section bg-primary">
  <div class="container">
    <div class="grid gap-base5-4 lg:grid-cols-[1fr_3fr]">
      <h2 class="text-white">Popular topics</h2>
      <div class="grid lg:grid-cols-3 gap-base5-4">
        <?php var_dump(get_field('popular_topics')); ?>
        <div data-topic-featured=".topic-one" class="flex items-center justify-between transition-all rounded-md cursor-pointer topic-filter-featured text-h4-base py-base5-4 px-base5-5 hover:contrast-75 bg-lavender-100">
          <p class="inline-block mb-0 text-h4-base">test one</p>
          <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0862 0.281473L19.5226 6.39729C19.979 6.77258 19.979 7.38106 19.5226 7.75636L12.0862 13.8722C11.6299 14.2475 10.89 14.2475 10.4337 13.8722C9.97731 13.4969 9.97731 12.8884 10.4337 12.5131L15.8753 8.03783H0V6.11582H15.8753L10.4337 1.64054C9.97731 1.26525 9.97731 0.65677 10.4337 0.281473C10.89 -0.0938243 11.6299 -0.0938243 12.0862 0.281473Z" fill="#161A3D" />
          </svg>
        </div>
        <div data-topic-featured=".topic-two" class="flex items-center justify-between transition-all rounded-md cursor-pointer topic-filter-featured text-h4-base py-base5-4 px-base5-5 hover:contrast-75 bg-pale-blue-100">
          <p class="inline-block mb-0 text-h4-base">test two</p>
          <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0862 0.281473L19.5226 6.39729C19.979 6.77258 19.979 7.38106 19.5226 7.75636L12.0862 13.8722C11.6299 14.2475 10.89 14.2475 10.4337 13.8722C9.97731 13.4969 9.97731 12.8884 10.4337 12.5131L15.8753 8.03783H0V6.11582H15.8753L10.4337 1.64054C9.97731 1.26525 9.97731 0.65677 10.4337 0.281473C10.89 -0.0938243 11.6299 -0.0938243 12.0862 0.281473Z" fill="#161A3D" />
          </svg>
        </div>
        <div data-topic-featured=".topic-three" class="flex items-center justify-between transition-all bg-yellow-100 rounded-md cursor-pointer topic-filter-featured text-h4-base py-base5-4 px-base5-5 hover:contrast-75">
          <p class="inline-block mb-0 text-h4-base">test three</p>
          <svg width="20" height="15" viewBox="0 0 20 15" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd" d="M12.0862 0.281473L19.5226 6.39729C19.979 6.77258 19.979 7.38106 19.5226 7.75636L12.0862 13.8722C11.6299 14.2475 10.89 14.2475 10.4337 13.8722C9.97731 13.4969 9.97731 12.8884 10.4337 12.5131L15.8753 8.03783H0V6.11582H15.8753L10.4337 1.64054C9.97731 1.26525 9.97731 0.65677 10.4337 0.281473C10.89 -0.0938243 11.6299 -0.0938243 12.0862 0.281473Z" fill="#161A3D" />
          </svg>
        </div>
      </div>
    </div>
  </div>
</section>
<section class="section bg-grey-cool">
  <div class="container">
    <div class="grid lg:grid-cols-[1fr_1fr_2fr] gap-base5-4">
      <h2>Charlie Health resources</h2>
      <div></div>
      <div>
        <input type="text" class="w-full bg-white border rounded-md search-input-js border-primary py-base5-2 px-base5-3" placeholder="Search..." />
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
        <div class="overflow-hidden">
          <div class="grid transition-all duration-500 -translate-y-full bg-white filter-button-group-js rounded-b-md mx-base5-2 p-base5-4 gap-base5-2">
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
        </div>
      </div>
      <div>
        <div class="flex grid-resources">
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
                    <p class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-white bg-transparent group-hover:bg-white group-hover:!text-primary border border-white z-[6] text-h5-base cursor-pointer"><?= $topicName; ?></p>
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
          <a role="button" class="w-full ch-button button-primary justify-self-center lg:w-auto load-more-js">Load more</a>
        </div>
      </div>
    </div>
  </div>
</section>

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const loadMoreButton = document.querySelector('.load-more-js');
    const searchInput = document.querySelector('.search-input-js');
    const grid = document.querySelector('.grid-resources');

    // Isotope settings
    const iso = new Isotope(grid, {
      itemSelector: '.grid-item',
      initLayout: false, // Don't initialize to start
      columnWidth: '.grid-sizer',
      layoutMode: 'fitRows',
      stagger: 0, // Prevents weirdness
      transitionDuration: 500,
      percentPosition: true,
      fitRows: {
        gutter: 20
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

    // Initial state
    const itemsAll = iso.getItemElements();

    // Hide after 9
    itemsAll.forEach((item, index) => {
      if (index > 8) {
        item.classList.add('noshow');
      }
    });

    // Initialize
    iso.arrange();

    // Filter
    const filterButtonGroup = document.querySelector('.filter-button-group-js');
    filterButtonGroup.addEventListener('change', updateFilter);

    // Search
    searchInput.addEventListener('input', updateSearch);

    // Load more
    loadMoreButton.addEventListener('click', loadMoreItems);

    // Check if more than 9 active and visible initial
    loadMoreButton.classList.toggle('noshow', itemsAll.length < 9);

    // Featured topics button
    const featuredTopics = document.querySelectorAll('.topic-filter-featured');

    featuredTopics.forEach(topicButton => {
      const topicValue = topicButton.getAttribute('data-topic-featured');

      topicButton.addEventListener('click', function() {
        const allCheckboxes = document.querySelectorAll('.topic-filter');

        allCheckboxes.forEach(checkbox => {
          if (checkbox.checked) {
            checkbox.click();
          }
        });

        const checkbox = document.querySelector(`.topic-filter[value='${topicValue}']`);
        if (!checkbox.checked) {
          checkbox.click();
        }
      })
    });

    function updateFilter() {
      const topicFilters = getCheckedValues('.topic-filter');
      const typeFilters = getCheckedValues('.type-filter');
      const combinedFilters = generateCombinedFilters(topicFilters, typeFilters); // Generate all possible combinations of topics and types
      const combinedFilter = combinedFilters.join(','); // Now use combinedFilters to create the final combined filter

      // Update Isotope with the new filter
      iso.arrange({
        filter: combinedFilter
      });

      // Handle visibility due to load more
      handleVisibilityAfterFilter();
    }

    function updateSearch() {
      updateFilter();
      const searchValue = searchInput.value.trim().toLowerCase();
      const data = Isotope.data(grid);
      const currentFilteredItems = data.filteredItems;

      // If the search input is empty, reset the filter to show all items
      if (searchValue === '') {
        updateFilter();
        return;
      }

      iso.arrange({
        filter: function() {
          const itemElem = this;
          const searchableElements = itemElem.querySelectorAll('h3 a');
          let match = false;
          const matchesCurrentFilter = currentFilteredItems.some(item => item.element === itemElem); // Check if item matches the current filter

          if (!matchesCurrentFilter) {
            return false; // Skip items not matching the current filter
          }

          searchableElements.forEach(searchableElement => {
            const text = searchableElement.textContent.toLowerCase();
            if (text.includes(searchValue)) {
              match = true;
              return; // Exit loop on first match
            }
          });

          return match;
        }
      });

      handleVisibilityAfterFilter();
    }

    function loadMoreItems() {
      const loadMoreItems = itemsAll.filter(item => item.classList.contains('noshow'));
      loadMoreItems.slice(0, 6).forEach(item => {
        item.classList.remove('noshow');
        iso.arrange();
      });

      if (itemsAll.filter(item => item.classList.contains('noshow')).length < 1) {
        loadMoreButton.classList.add('noshow');
      }
    }

    function getCheckedValues(selector) {
      return Array.from(document.querySelectorAll(`${selector}:checked`)).map(input => input.value);
    }

    function generateCombinedFilters(topicFilters, typeFilters) {
      if (topicFilters.length === 0) {
        topicFilters = ['*'];
      }

      if (typeFilters.length === 0) {
        typeFilters = ['*'];
      }

      const combinedFilters = [];
      topicFilters.forEach(topic => {
        typeFilters.forEach(type => {
          combinedFilters.push(`${topic}${type}`);
        });
      });

      return combinedFilters;
    }

    function handleVisibilityAfterFilter() {
      const itemsFilters = iso.getFilteredItemElements();

      // Unhide all
      itemsAll.forEach(item => {
        item.classList.remove('active', 'noshow');
      });

      // Hide after 9
      itemsFilters.forEach((item, index) => {
        item.classList.add('active');
        if (index > 8) {
          item.classList.add('noshow');
        }
      });

      iso.arrange();

      // Load more
      const filteredElements = itemsAll.filter(element => element.classList.contains('active'));

      // Check if more than 9 active and visible
      loadMoreButton.classList.toggle('noshow', filteredElements.length < 9);
    }

    // Filter dropdown
    const filterButton = document.querySelector('.filters-js');

    filterButton.addEventListener('click', function(e) {
      filterButtonGroup.classList.toggle('-translate-y-full');
      document.querySelector('.down-arrow-js').classList.toggle('rotate-180');
    })

    function checkCookie(name) {
      var cookies = document.cookie.split(';');
      for (var i = 0; i < cookies.length; i++) {
        var cookie = cookies[i].trim();
        if (cookie.indexOf(name + "=") === 0) {
          return true;
        }
      }
      return false;
    }

    if (checkCookie("gatedSubmission")) {
      const successLinks = document.querySelectorAll('.success-link-js');
      successLinks.forEach(link => {
        link.href = link.getAttribute('data-success-link');
      });
    }

    // Refresh wage when leaving so that it updates when back button is clicked after viewing guide
    window.addEventListener('unload', function() {
      window.location.reload(true);
    });
  });
</script>