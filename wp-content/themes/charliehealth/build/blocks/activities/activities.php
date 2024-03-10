<div class="grid lg:grid-cols-[1fr_3fr]">
  <div>
    <div class="grid button-group filter-button-group">
      <div class="grid">
        <p>Resource topic</p>
        <label class="flex items-center cursor-pointer text-p-base gap-base5-2"><input type="checkbox" value=".thing" class="topic-filter" />Thing</label>
        <label class="flex items-center cursor-pointer text-p-base gap-base5-2"><input type="checkbox" value=".thing2" class="topic-filter" />Thing Two</label>
        <label class="flex items-center cursor-pointer text-p-base gap-base5-2"><input type="checkbox" value=".thing3" class="topic-filter" />Thing Three</label>
      </div>
      <div class="grid">
        <p>Resource type</p>
        <label class="flex items-center cursor-pointer text-p-base gap-base5-2"><input type="checkbox" value=".type" class="type-filter" />Type</label>
        <label class="flex items-center cursor-pointer text-p-base gap-base5-2"><input type="checkbox" value=".type2" class="type-filter" />Type Two</label>
        <label class="flex items-center cursor-pointer text-p-base gap-base5-2"><input type="checkbox" value=".type3" class="type-filter" />Type Three</label>
      </div>
    </div>
    <div>
      <input type="text" class="search-input" />
    </div>
  </div>
  <div>
    <div class="flex grid-test">
      <div class="w-full grid-sizer lg:w-[calc(33.33%_-15px)]"></div>
      <div class="relative w-full mb-base5-4 bg-white rounded-lg group grid-item thing type lg:w-[calc(33.33%_-15px)]">
        <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
          <img src="<?= placeHolderImage(); ?>" alt="#" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
        </div>
        <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
          <a href"#" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-white bg-transparent group-hover:bg-white group-hover:!text-primary border border-white z-[6] text-h5-base">type</a>
        </div>
        <div class="grid bg-white rounded-b-lg p-sp-4">
          <h3 class="text-h4-base"><a href="#" class="block stretched-link">ONE</a></h3>
          <p>TYPE</p>
        </div>
      </div>
      <div class="relative w-full mb-base5-4 bg-white rounded-lg group grid-item thing type lg:w-[calc(33.33%_-15px)]">
        <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
          <img src="<?= placeHolderImage(); ?>" alt="#" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
        </div>
        <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
          <a href"#" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-white bg-transparent group-hover:bg-white group-hover:!text-primary border border-white z-[6] text-h5-base">TOPIC</a>
        </div>
        <div class="grid bg-white rounded-b-lg p-sp-4">
          <h3 class="text-h4-base"><a href="#" class="block stretched-link">ONE</a></h3>
          <p>TYPE</p>
        </div>
      </div>
      <div class="relative w-full mb-base5-4 bg-white rounded-lg group grid-item thing type2 lg:w-[calc(33.33%_-15px)]">
        <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
          <img src="<?= placeHolderImage(); ?>" alt="#" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
        </div>
        <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
          <a href"#" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-white bg-transparent group-hover:bg-white group-hover:!text-primary border border-white z-[6] text-h5-base">TOPIC</a>
        </div>
        <div class="grid bg-white rounded-b-lg p-sp-4">
          <h3 class="text-h4-base"><a href="#" class="block stretched-link">ONE tesing</a></h3>
          <p>TYPE TWO</p>
        </div>
      </div>
      <div class="relative w-full mb-base5-4 bg-white rounded-lg group grid-item thing2 type2 lg:w-[calc(33.33%_-15px)]">
        <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
          <img src="<?= placeHolderImage(); ?>" alt="#" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
        </div>
        <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
          <a href"#" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-white bg-transparent group-hover:bg-white group-hover:!text-primary border border-white z-[6] text-h5-base">TOPIC</a>
        </div>
        <div class="grid bg-white rounded-b-lg p-sp-4">
          <h3 class="text-h4-base"><a href="#" class="block stretched-link">TWO</a></h3>
          <p>TYPE</p>
        </div>
      </div>
      <div class="relative w-full mb-base5-4 bg-white rounded-lg group grid-item thing2 lg:w-[calc(33.33%_-15px)]">
        <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
          <img src="<?= placeHolderImage(); ?>" alt="#" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
        </div>
        <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
          <a href"#" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-white bg-transparent group-hover:bg-white group-hover:!text-primary border border-white z-[6] text-h5-base">TOPIC</a>
        </div>
        <div class="grid bg-white rounded-b-lg p-sp-4">
          <h3 class="text-h4-base"><a href="#" class="block stretched-link">TWO</a></h3>
          <p>TYPE</p>
        </div>
      </div>
      <div class="relative w-full mb-base5-4 bg-white rounded-lg group grid-item thing2 lg:w-[calc(33.33%_-15px)]">
        <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
          <img src="<?= placeHolderImage(); ?>" alt="#" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
        </div>
        <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
          <a href"#" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-white bg-transparent group-hover:bg-white group-hover:!text-primary border border-white z-[6] text-h5-base">TOPIC</a>
        </div>
        <div class="grid bg-white rounded-b-lg p-sp-4">
          <h3 class="text-h4-base"><a href="#" class="block stretched-link">TWO</a></h3>
          <p>TYPE</p>
        </div>
      </div>
      <div class="relative w-full mb-base5-4 bg-white rounded-lg group grid-item thing3 lg:w-[calc(33.33%_-15px)]">
        <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
          <img src="<?= placeHolderImage(); ?>" alt="#" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
        </div>
        <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
          <a href"#" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-white bg-transparent group-hover:bg-white group-hover:!text-primary border border-white z-[6] text-h5-base">TOPIC</a>
        </div>
        <div class="grid bg-white rounded-b-lg p-sp-4">
          <h3 class="text-h4-base"><a href="#" class="block stretched-link">THREE</a></h3>
          <p>TYPE</p>
        </div>
      </div>
      <div class="relative w-full mb-base5-4 bg-white rounded-lg group grid-item thing3 lg:w-[calc(33.33%_-15px)]">
        <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
          <img src="<?= placeHolderImage(); ?>" alt="#" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
        </div>
        <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
          <a href"#" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-white bg-transparent group-hover:bg-white group-hover:!text-primary border border-white z-[6] text-h5-base">TOPIC</a>
        </div>
        <div class="grid bg-white rounded-b-lg p-sp-4">
          <h3 class="text-h4-base"><a href="#" class="block stretched-link">An Analysis of Risk Factors for Suicidal Thoughts and Outcomes at Charlie Health</a></h3>
          <p>TYPE</p>
        </div>
      </div>
      <div class="relative w-full mb-base5-4 bg-white rounded-lg group grid-item thing3 lg:w-[calc(33.33%_-15px)]">
        <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
          <img src="<?= placeHolderImage(); ?>" alt="#" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
        </div>
        <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
          <a href"#" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-white bg-transparent group-hover:bg-white group-hover:!text-primary border border-white z-[6] text-h5-base">TOPIC</a>
        </div>
        <div class="grid bg-white rounded-b-lg p-sp-4">
          <h3 class="text-h4-base"><a href="#" class="block stretched-link">THREE</a></h3>
          <p>TYPE</p>
        </div>
      </div>
      <div class="relative w-full mb-base5-4 bg-white rounded-lg group grid-item thing lg:w-[calc(33.33%_-15px)]">
        <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
          <img src="<?= placeHolderImage(); ?>" alt="#" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
        </div>
        <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
          <a href"#" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-white bg-transparent group-hover:bg-white group-hover:!text-primary border border-white z-[6] text-h5-base">TOPIC</a>
        </div>
        <div class="grid bg-white rounded-b-lg p-sp-4">
          <h3 class="text-h4-base"><a href="#" class="block stretched-link">ONE</a></h3>
          <p>TYPE</p>
        </div>
      </div>
      <div class="relative w-full mb-base5-4 bg-white rounded-lg group grid-item thing lg:w-[calc(33.33%_-15px)]">
        <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
          <img src="<?= placeHolderImage(); ?>" alt="#" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
        </div>
        <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
          <a href"#" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-white bg-transparent group-hover:bg-white group-hover:!text-primary border border-white z-[6] text-h5-base">TOPIC</a>
        </div>
        <div class="grid bg-white rounded-b-lg p-sp-4">
          <h3 class="text-h4-base"><a href="#" class="block stretched-link">ONE</a></h3>
          <p>TYPE</p>
        </div>
      </div>
      <div class="relative w-full mb-base5-4 bg-white rounded-lg group grid-item thing2 lg:w-[calc(33.33%_-15px)]">
        <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
          <img src="<?= placeHolderImage(); ?>" alt="#" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
        </div>
        <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
          <a href"#" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-white bg-transparent group-hover:bg-white group-hover:!text-primary border border-white z-[6] text-h5-base">TOPIC</a>
        </div>
        <div class="grid bg-white rounded-b-lg p-sp-4">
          <h3 class="text-h4-base"><a href="#" class="block stretched-link">TWO</a></h3>
          <p>TYPE</p>
        </div>
      </div>
      <div class="relative w-full mb-base5-4 bg-white rounded-lg group grid-item thing2 lg:w-[calc(33.33%_-15px)]">
        <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
          <img src="<?= placeHolderImage(); ?>" alt="#" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
        </div>
        <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
          <a href"#" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-white bg-transparent group-hover:bg-white group-hover:!text-primary border border-white z-[6] text-h5-base">TOPIC</a>
        </div>
        <div class="grid bg-white rounded-b-lg p-sp-4">
          <h3 class="text-h4-base"><a href="#" class="block stretched-link">TWO</a></h3>
          <p>TYPE</p>
        </div>
      </div>
      <div class="relative w-full mb-base5-4 bg-white rounded-lg group grid-item thing3 lg:w-[calc(33.33%_-15px)]">
        <div class="lg:h-[167px] h-[150px] overflow-hidden rounded-t-lg">
          <img src="<?= placeHolderImage(); ?>" alt="#" class="object-cover w-full h-full transition-all duration-300 rounded-t-lg group-hover:scale-105">
        </div>
        <div class="absolute rounded-t-lg top-sp-4 left-sp-4">
          <a href"#" class="relative inline-block no-underline rounded-pill px-base5-3 py-base5-2 text-white bg-transparent group-hover:bg-white group-hover:!text-primary border border-white z-[6] text-h5-base">TOPIC</a>
        </div>
        <div class="grid bg-white rounded-b-lg p-sp-4">
          <h3 class="text-h4-base"><a href="#" class="block stretched-link">zv</a></h3>
          <p>TYPE</p>
        </div>
      </div>
    </div>
    <div class="grid justify-end">
      <a role="button" class="w-full ch-button button-primary justify-self-center lg:w-auto load-more-js">Load more</a>
    </div>
  </div>
</div>

<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    const loadMoreButton = document.querySelector('.load-more-js');
    const searchInput = document.querySelector('.search-input');

    // Isotope settings
    const grid = document.querySelector('.grid-test');
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
    const filterButtonGroup = document.querySelector('.filter-button-group');
    filterButtonGroup.addEventListener('change', updateFilter);

    // Search
    searchInput.addEventListener('input', updateSearch);

    // Load more
    loadMoreButton.addEventListener('click', loadMoreItems);

    function updateFilter() {
      const topicFilters = getCheckedValues('.topic-filter');
      const typeFilters = getCheckedValues('.type-filter');

      // Generate all possible combinations of topics and types
      const combinedFilters = generateCombinedFilters(topicFilters, typeFilters);

      // Now use combinedFilters to create the final combined filter
      const combinedFilter = combinedFilters.join(',');

      // Update Isotope with the new filter
      iso.arrange({
        filter: combinedFilter
      });

      // Handle visibility due to load more
      handleVisibilityAfterFilter();
    }

    function updateSearch() {
      console.log('run');
      updateFilter();
      const searchValue = searchInput.value.trim().toLowerCase();
      const data = Isotope.data(grid);
      const currentFilteredItems = data.filteredItems;

      if (searchValue === '') {
        // If the search input is empty, reset the filter to show all items
        updateFilter();
        return;
      }

      console.log(currentFilteredItems);

      iso.arrange({
        filter: function() {
          const itemElem = this;
          const searchableElements = itemElem.querySelectorAll('h3 a');
          let match = false;

          // Check if item matches the current filter
          const matchesCurrentFilter = currentFilteredItems.some(item => item.element === itemElem);

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

      // Hide after 6
      itemsFilters.forEach((item, index) => {
        item.classList.add('active');
        if (index > 8) {
          item.classList.add('noshow');
        }
      });

      iso.arrange();

      // Load more
      const filteredElements = itemsAll.filter(element => element.classList.contains('active'));

      // Check if more than 5 active and visible
      loadMoreButton.classList.toggle('noshow', filteredElements.length < 9);
    }
  });
</script>