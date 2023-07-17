import './index.css';

import Masonry from 'masonry-layout/dist/masonry.pkgd';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  var masonry = new Masonry('.masonry-js', {
    columnWidth: '.grid-sizer',
    itemSelector: '.testimonial-item',
    transitionDuration: 0,
    percentPosition: true,
    horizontalOrder: false,
    trueOrder: true,
    gutter: 32,
  });

  ScrollTrigger.batch('.testimonial-item:not(.noshow)', {
    // interval: 0.1, // time window (in seconds) for batching to occur.
    // batchMax: 3,   // maximum batch size (targets)
    onEnter: (batch) => gsap.to(batch, { opacity: 1, overwrite: true }),
    onLeave: (batch) => gsap.to(batch, { opacity: 0, overwrite: true }),
    onEnterBack: (batch) => gsap.to(batch, { opacity: 1, overwrite: true }),
    onLeaveBack: (batch) => gsap.to(batch, { opacity: 0, overwrite: true }),
    markers: true,
    start: 'top 80%',
  });

  var loadMoreButton = document.querySelector('.load-more-js');

  // Add a click event listener to the button
  loadMoreButton.addEventListener('click', function () {
    // Find the parent container
    var parentContainer = document.querySelector('.masonry-js');

    // Find all child elements of the parent container
    var childElements = parentContainer.children;

    // Variable to keep track of the number of elements with the "noshow" class removed
    var count = 0;

    // Loop through the child elements and remove the "noshow" class from the next 6 elements that have it
    for (var i = 0; i < childElements.length && count < 6; i++) {
      var childElement = childElements[i];
      if (childElement.classList.contains('noshow')) {
        childElement.classList.remove('noshow');
        count++;
        console.log(count);
      }
    }
    masonry.layout();
    ScrollTrigger.refresh();
    ScrollTrigger.batch('.testimonial-item:not(.noshow)', {
      // interval: 0.1, // time window (in seconds) for batching to occur.
      // batchMax: 3,   // maximum batch size (targets)
      onEnter: (batch) => gsap.to(batch, { opacity: 1, overwrite: true }),
      onLeave: (batch) => gsap.to(batch, { opacity: 0, overwrite: true }),
      onEnterBack: (batch) => gsap.to(batch, { opacity: 1, overwrite: true }),
      onLeaveBack: (batch) => gsap.to(batch, { opacity: 0, overwrite: true }),
      markers: true,
      start: 'top 80%',
    });
    document.querySelector('.masonry-js').click();
  });
});
