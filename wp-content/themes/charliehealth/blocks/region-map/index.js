import './index.css';

window.addEventListener('DOMContentLoaded', () => {
  // simplemaps_usmap.hooks.over_region = function (id) {
  //   const listItem = document.querySelector(`[data-region-id="${id}"]`);
  //   listItem.classList.toggle('active');

  //   listItem.scrollIntoView({
  //     behavior: 'smooth',
  //     block: 'nearest',
  //     inline: 'start',
  //   });
  // };
  // simplemaps_usmap.hooks.out_region = function (id) {
  //   const listItem = document.querySelector(`[data-region-id="${id}"]`);
  //   listItem.classList.toggle('active');
  // };
  // const listItems = document.querySelectorAll(`[data-region-id`);
  // listItems.forEach((item) => {
  //   item.addEventListener('click', () => {
  //     window.location =
  //       simplemaps_usmap.mapdata.regions[
  //         `${item.getAttribute('data-region-id')}`
  //       ].url;
  //   });
  // });

  // Select the element you want to prevent from being created
  const elementSelector = 'a[href="https://simplemaps.com"]';

  // Create a MutationObserver instance with a callback function
  const observer = new MutationObserver((mutationsList) => {
    // Use try catch to stop console error
    try {
      // Loop through each mutation that has occurred
      for (const mutation of mutationsList) {
        // Check if the added node matches the element selector
        if (
          mutation.addedNodes.length > 0 &&
          mutation.addedNodes[0].matches(elementSelector)
        ) {
          // If it does, remove the element from the DOM
          mutation.addedNodes[0].remove();
        }
      }
    } catch (e) {
      return;
    }
  });

  // Start observing changes to the DOM
  observer.observe(document.body, {
    childList: true,
    subtree: true,
  });
});
