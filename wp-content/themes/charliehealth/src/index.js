import './css/main.css';

import mobileNav from './modules/mobile-nav';
import stopAnimations from './modules/stop-animations';
import animations from './modules/animations';
import anchorScroll from './modules/anchor-scroll';
import revealBackToTop from './modules/back-to-top';
import outreachModals from './modules/outreach-modals';
import toc from './modules/toc';
import shareButton from './modules/share-button';
import featuredBlogSlider from './modules/featured-blog-slider';
import ajaxPagination from './modules/ajax-pagination';
import ajaxPaginationResearch from './modules/ajax-pagination-research';
import references from './modules/references';
import progressBar from './modules/progress-bar';
import newsletterPopup from './modules/newsletter-popup';
import imagifyPictureTagClasses from './modules/imagify-fix';

document.addEventListener('DOMContentLoaded', () => {
  const body = document.querySelector('body');

  stopAnimations();
  mobileNav();
  animations();
  imagifyPictureTagClasses();
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
  if (body.classList.contains('single-post') || body.classList.contains('single-research')) {
    toc();
    references();
    progressBar();
    shareButton();
  }
  if (body.classList.contains('blog')) {
    newsletterPopup();
    featuredBlogSlider();
    ajaxPagination();
    ajaxPaginationResearch();
  }
  if (body.classList.contains('category')) {
    featuredBlogSlider();
    ajaxPagination();
  }
  if (body.classList.contains('tag')) {
    ajaxPagination();
  }
  if (body.classList.contains('single-authors')) {
    // featuredBlogSlider();
    ajaxPagination();
  }
  if (body.classList.contains('page-template-searchpage')) {
    ajaxPagination();
  }
  if (body.classList.contains('page-template-page-press')) {
    ajaxPagination();
  }
  /**
   * needs to load last (or at least after TOC) in order for all links to be scrollable
   */
  anchorScroll();
});
