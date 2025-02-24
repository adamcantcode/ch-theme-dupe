<section class="relative overflow-hidden section temp-section-js">
  <div class="absolute z-0 origin-center color-expand-js rounded-circle"></div>
  <div class="container relative mb-base5-10 z-">
    <div class="max-w-[950px] mb-base5-6">
      <InnerBlocks />
    </div>
    <div class="flex flex-col lg:flex-row lg:gap-base5-10">
      <h4><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.86659 18.9387L9.87191 18.944L8.4577 20.3582L1.58984 13.4903L3.00406 12.0761L8.45238 17.5245L21.0003 4.97656L22.4145 6.39078L9.86659 18.9387Z" fill="#161A3D" />
        </svg> Group and individual sessions, multiple times per week</h4>
      <h4><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.86659 18.9387L9.87191 18.944L8.4577 20.3582L1.58984 13.4903L3.00406 12.0761L8.45238 17.5245L21.0003 4.97656L22.4145 6.39078L9.86659 18.9387Z" fill="#161A3D" />
        </svg> Covered by insurance</h4>
      <h4><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="inline">
          <path fill-rule="evenodd" clip-rule="evenodd" d="M9.86659 18.9387L9.87191 18.944L8.4577 20.3582L1.58984 13.4903L3.00406 12.0761L8.45238 17.5245L21.0003 4.97656L22.4145 6.39078L9.86659 18.9387Z" fill="#161A3D" />
        </svg> Flexible scheduling</h4>
    </div>
  </div>
  <div class="relative container-md z-1">
    <div class="grid lg:grid-cols-3 gap-base5-4">
      <div id="teenIOP" class="relative grid lg:items-end items-center grid-cols-[1fr_2fr] lg:grid-rows-1 rounded-md gap-base5-2 lg:text-center lg:p-base5-5 p-base5-2 color-hover-item-js bg-yellow-100 lg:grid-cols-1">
        <img src="https://www.charliehealth.com/wp-content/uploads/2024/10/module1.png" alt="alt" class="self-center lg:mb-base5-5 object-contain lg:block max-h-[170px] mx-auto">
        <div>
          <h2 class="mb-base5-1">Teens</h2>
          <h4>11 - 17</h4>
        </div>
        <div class="col-span-2 text-center lg:col-span-1 lg:justify-self-auto">
          <a href="/form" class="w-full stretched-link lg:w-auto ch-button button-primary-ch">Get started</a>
        </div>
      </div>
      <div id="youngAdultIOP" class="relative grid lg:items-end items-center grid-cols-[1fr_2fr] lg:grid-rows-1 rounded-md gap-base5-2 lg:text-center lg:p-base5-5 p-base5-2 color-hover-item-js bg-lavender-100 lg:grid-cols-1">
        <img src="https://www.charliehealth.com/wp-content/uploads/2024/10/module2.png" alt="alt" class="self-center lg:mb-base5-5 object-contain lg:block max-h-[170px] mx-auto">
        <div>
          <h2 class="mb-base5-1">Young adults</h2>
          <h4>18 - 34</h4>
        </div>
        <div class="col-span-2 text-center lg:col-span-1 lg:justify-self-auto">
          <a href="/form" class="w-full stretched-link lg:w-auto ch-button button-primary-ch">Get started</a>
        </div>
      </div>
      <div id="AdultIOP" class="relative grid lg:items-end items-center grid-cols-[1fr_2fr] lg:grid-rows-1 rounded-md gap-base5-2 lg:text-center lg:p-base5-5 p-base5-2 color-hover-item-js bg-pale-blue-100 lg:grid-cols-1">
        <img src="https://www.charliehealth.com/wp-content/uploads/2024/10/Jen-1-2.png" alt="alt" class="self-center lg:mb-base5-5 object-contain lg:block max-h-[170px] mx-auto">
        <div>
          <h2 class="mb-base5-1">Adults</h2>
          <h4>34+</h4>
        </div>
        <div class="col-span-2 text-center lg:col-span-1 lg:justify-self-auto">
          <a href="/form" class="w-full stretched-link lg:w-auto ch-button button-primary-ch">Get started</a>
        </div>
      </div>
    </div>
  </div>
  <div class="container relative text-center mt-base5-10 z-1">
    <p><span class="mr-base5-2">or call now: </span><a href="tel:+19862060414" class="ch-button button-secondary-ch" target="_self">1 (986) 206-0414</a></p>
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

  // Function to set the initial size of the circle based on the viewport size
  function setCircleSize() {
    const circleSize = Math.max(window.innerWidth, window.innerHeight) * 2;
    expandElement.style.width = `${circleSize}px`;
    expandElement.style.height = `${circleSize}px`;
  }

  // Function to update the position of the circle to follow the cursor
  function updateCirclePosition(event) {
    const circleSize = Math.max(window.innerWidth, window.innerHeight) * 2;
    const cursorX = event.clientX;
    const cursorY = event.clientY;

    expandElement.style.left = `${cursorX - circleSize / 2}px`;
    expandElement.style.top = `${cursorY - circleSize / 2}px`;
  }

  // Initial setup on page load and resize
  function initialize() {
    setCircleSize();

    // Make the circle follow the cursor
    document.addEventListener('mousemove', updateCirclePosition);

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
  }

  // Recalculate circle size and reset position on window resize
  window.addEventListener('resize', setCircleSize);

  // Initialize on DOM load
  window.addEventListener('DOMContentLoaded', initialize);
</script>