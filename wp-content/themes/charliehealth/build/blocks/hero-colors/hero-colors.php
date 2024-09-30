<section class="relative overflow-hidden section temp-section-js">
  <div class="absolute z-0 w-0 h-0 transition-all duration-700 opacity-0 color-expand-js rounded-circle"></div>
  <div class="container-md">
    <div class="grid grid-cols-3 gap-base5-4">
      <div class="relative grid bg-yellow-100 color-hover-item-js z-1">
        <img src="<?= placeHolderImage(); ?>" alt="alt">
        <h2>Agelabel</h2>
        <h4>## - ##</h4>
        <a href="/form" class="stretched-link">Get started</a>
      </div>
      <div class="relative grid color-hover-item-js z-1 bg-lavender-100">
        <img src="<?= placeHolderImage(); ?>" alt="alt">
        <h2>Agelabel</h2>
        <h4>## - ##</h4>
        <a href="/form" class="stretched-link">Get started</a>
      </div>
      <div class="relative grid color-hover-item-js z-1 bg-pale-blue-100">
        <img src="<?= placeHolderImage(); ?>" alt="alt">
        <h2>Agelabel</h2>
        <h4>## - ##</h4>
        <a href="/form" class="stretched-link">Get started</a>
      </div>
    </div>
  </div>
</section>

<script>
  document.querySelectorAll('.color-hover-item-js').forEach(item => {
    item.addEventListener('mouseenter', function(event) {

      const expandElement = document.querySelector('.color-expand-js');
      const section = document.querySelector('.temp-section-js');

      // Calculate the size of the expanding circle based on the section dimensions
      const circleSize = Math.max(section.clientWidth, section.clientHeight) * 1.5;

      // Get the cursor position relative to the section
      const offsetX = event.clientX;
      const offsetY = event.clientY;

      // Check for and replace class ending in '-100' with '-200'
      item.classList.forEach(className => {
        if (className.endsWith('-100')) {
          expandElement.classList.remove(className);
          const newClass = className.replace('-100', '-200');
          expandElement.classList.add(newClass);
        }
      });

      // Set the size and position of the expanding circle based on cursor position
      expandElement.style.width = `${circleSize}px`;
      expandElement.style.height = `${circleSize}px`;
      expandElement.style.left = `${offsetX - circleSize / 2}px`; // Adjust position based on cursor position
      expandElement.style.top = `${offsetY - circleSize / 2}px`;
      expandElement.style.opacity = `1`;

      // Trigger the expansion
      expandElement.classList.add('expand');
    });

    item.addEventListener('mouseleave', function() {
      const expandElement = document.querySelector('.color-expand-js');
      // Shrink the circle back down
      expandElement.classList.remove('expand');
      expandElement.style.width = '0px';
      expandElement.style.height = '0px';
      expandElement.style.opacity = '0';

      // Reset background classes
      expandElement.classList.remove('bg-yellow-200', 'bg-lavender-200', 'bg-pale-blue-200');
    });
  });
</script>