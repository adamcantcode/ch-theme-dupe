import './index.css';

import Masonry from 'masonry-layout/dist/masonry.pkgd';

window.addEventListener('DOMContentLoaded', () => {
  var masonry = new Masonry('.masonry-js', {
    itemSelector: '.testimonial-item',
    columnWidth: '.grid-sizer',
    percentPosition: true,
    horizontalOrder: true,
    gutter: 32,
  });
});
