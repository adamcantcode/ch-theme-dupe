<section class="relative overflow-hidden section temp-section-js">
  <div class="absolute z-0 origin-center color-expand-js rounded-circle"></div>
  <div class="container relative mb-base5-10 z-1">
    <div class="grid grid-cols-[8fr_4fr]">
      <div>
        <h1>Virtual mental health treatment made for you</h1>
      </div>
      <div>
        <h4>Group and individual sessions, multiple times per week</h4>
        <h4>Covered by insurance</h4>
        <h4>Flexible scheduling</h4>
      </div>
    </div>
  </div>
  <div class="relative container-md z-1">
    <div class="grid grid-cols-3 gap-base5-4">
      <div class="relative grid text-center bg-yellow-100 rounded-md p-base5-5 color-hover-item-js">
        <img src="<?= placeHolderImage(); ?>" alt="alt" class="mb-base5-5">
        <h2>Teens</h2>
        <h4>11 - 17</h4>
        <a href="/form" class="stretched-link">Get started</a>
      </div>
      <div class="relative grid text-center rounded-md p-base5-5 color-hover-item-js bg-lavender-100">
        <img src="<?= placeHolderImage(); ?>" alt="alt" class="mb-base5-5">
        <h2>Young adults</h2>
        <h4>18 - 34</h4>
        <a href="/form" class="stretched-link">Get started</a>
      </div>
      <div class="relative grid text-center rounded-md p-base5-5 color-hover-item-js bg-pale-blue-100">
        <img src="<?= placeHolderImage(); ?>" alt="alt" class="mb-base5-5">
        <h2>Adults</h2>
        <h4>34+</h4>
        <a href="/form" class="stretched-link">Get started</a>
      </div>
    </div>
  </div>
</section>

<style>
  .color-expand-js {
    transition: all 700ms;
    opacity: 0;
    transform: scale(0);
  }
</style>

<script>
  const expandElement = document.querySelector('.color-expand-js');

  // Set the initial size of the circle based on the viewport size
  const circleSize = Math.max(window.innerWidth, window.innerHeight) * 2;
  expandElement.style.width = `${circleSize}px`;
  expandElement.style.height = `${circleSize}px`;

  // Make the circle follow the cursor
  document.addEventListener('mousemove', function(event) {
    const cursorX = event.clientX;
    const cursorY = event.clientY;

    // Update the position of the circle to follow the cursor
    expandElement.style.left = `${cursorX - circleSize / 2}px`;
    expandElement.style.top = `${cursorY - circleSize / 2}px`;
  });

  document.querySelectorAll('.color-hover-item-js').forEach(item => {
    item.addEventListener('mouseenter', function() {
      // Update the background class from -100 to -200
      item.classList.forEach(className => {
        if (className.endsWith('-100')) {
          expandElement.classList.remove(className);
          const newClass = className.replace('-100', '-200');
          expandElement.classList.add(newClass);
        }
      });

      expandElement.style.transform = 'scale(1)';
      expandElement.style.opacity = '1';

    });

    item.addEventListener('mouseleave', function() {
      // Reset background classes
      expandElement.classList.remove('bg-yellow-200', 'bg-lavender-200', 'bg-pale-blue-200');

      // Shrink the circle back down (scale to 0 and fade out)
      expandElement.style.transform = 'scale(0)';
      expandElement.style.opacity = '0';

    });
  });
</script>