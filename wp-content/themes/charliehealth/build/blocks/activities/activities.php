<div class="button-group filter-button-group">
  <button data-filter="*">show all</button>
  <button data-filter=".thing">thing</button>
  <button data-filter=".thing2">thing2</button>
  <button data-filter=".thing3">thing3</button>
</div>

<div class="grid grid-cols-3 grid-test">
  <div class="testing bg-[red] grid-item thing">thing</div>
  <div class="testing bg-[red] grid-item thing">thing</div>
  <div class="testing bg-[red] grid-item thing">thing</div>
  <div class="testing bg-[red] grid-item thing">thing</div>
  <div class="testing bg-[red] grid-item thing2">thing2</div>
  <div class="testing bg-[red] grid-item thing2">thing2</div>
  <div class="testing bg-[red] grid-item thing2">thing2 no</div>
  <div class="testing bg-[red] grid-item thing3">thing3 no</div>
  <div class="testing bg-[red] grid-item thing3">thing3 no</div>
</div>
<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
<script>
  window.addEventListener('DOMContentLoaded', () => {
    var elem = document.querySelector('.grid-test');
    var iso = new Isotope(elem, {
      // options
      itemSelector: '.grid-item',
      layoutMode: 'masonry',
    });

    // init Isotope
    // Get the grid element
    var grid = document.querySelector('.grid-test');

    // Initialize Isotope
    var isotope = new Isotope(grid, {
      // options
    });

    // Add event listener to filter buttons
    var filterButtonGroup = document.querySelector('.filter-button-group');
    filterButtonGroup.addEventListener('click', function(event) {
      // Check if the clicked element is a button
      if (event.target.tagName === 'BUTTON') {
        // Get the filter value from the data-filter attribute
        var filterValue = event.target.getAttribute('data-filter'); 

        // Update Isotope with the new filter
        isotope.arrange({
          filter: filterValue
        });
      }
    });

  });
</script>