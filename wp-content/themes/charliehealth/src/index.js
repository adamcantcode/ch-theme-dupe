import './css/main.css';

import mobileNav from './modules/mobile-nav';
import stopAnimations from './modules/stop-animations';
import animations from './modules/animations';
import anchorScroll from './modules/anchor-scroll';
import revealBackToTop from './modules/back-to-top';
import outreachModals from './modules/outreach-modals';
import toc from './modules/toc';
import shareButton from './modules/share-button';
import readTime from './modules/read-time';
import featuredBlogSlider from './modules/featured-blog-slider';

document.addEventListener('DOMContentLoaded', () => {
  const body = document.querySelector('body');

  stopAnimations();
  mobileNav();
  animations();
  if (
    body.classList.contains('single-areas-of-care') ||
    body.classList.contains('single-treatment-modalities') ||
    body.classList.contains('single-post')
  ) {
    revealBackToTop();
  }
  if (body.classList.contains('single-region')) {
    outreachModals();
  }
  if (body.classList.contains('single-post')) {
    readTime();
    toc();
    shareButton();
  }
  if (body.classList.contains('blog')) {
    featuredBlogSlider();
  }
  // needs to load last (or at least of TOC) in order for all links to be scrollable
  anchorScroll();
});
