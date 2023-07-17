import './index.css';

import Masonry from 'masonry-layout/dist/masonry.pkgd';

window.addEventListener('DOMContentLoaded', () => {
  var masonry = new Masonry('.masonry-js', {
    columnWidth: '.grid-sizer',
    itemSelector: '.testimonial-item',
    percentPosition: true,
    horizontalOrder: false,
    trueOrder: true,
    gutter: 32,
  });
  // jQuery('.masonry-js').masonry({
  //   itemSelector: '.testimonial-item',
  //   columnWidth: '.grid-sizer',
  //   percentPosition: true,
  //   horizontalOrder: true,
  //   gutter: 32,
  // });
});
