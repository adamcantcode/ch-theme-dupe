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

  ScrollTrigger.batch('.masonry-js .testimonial-item:not(.noshow)', {
    batchMax: 3,
    onEnter: (batch) =>
      gsap.to(batch, { opacity: 1, scale: 1, overwrite: true }),
    onLeave: (batch) =>
      gsap.to(batch, { opacity: 0, scale: 0.95, overwrite: true }),
    onEnterBack: (batch) =>
      gsap.to(batch, { opacity: 1, scale: 1, overwrite: true }),
    onLeaveBack: (batch) =>
      gsap.to(batch, { opacity: 0, scale: 0.95, overwrite: true }),
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
      }
    }
    masonry.layout();
    ScrollTrigger.refresh();
    ScrollTrigger.batch('.masonry-js .testimonial-item:not(.noshow)', {
      batchMax: 6,
      onEnter: (batch) =>
        gsap.to(batch, { opacity: 1, scale: 1, overwrite: true }),
      onLeave: (batch) =>
        gsap.to(batch, { opacity: 0, scale: 0.95, overwrite: true }),
      onEnterBack: (batch) =>
        gsap.to(batch, { opacity: 1, scale: 1, overwrite: true }),
      onLeaveBack: (batch) =>
        gsap.to(batch, { opacity: 0, scale: 0.95, overwrite: true }),
      start: 'top 80%',
    });
    
    var hasNoShow = Array.from(childElements).some(function (element) {
      return element.classList.contains('noshow');
    });

    if (!hasNoShow) {
      loadMoreButton.remove();
    }
  });
});
