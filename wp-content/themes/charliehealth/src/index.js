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
import ajaxPaginationResearchAuthors from './modules/ajax-pagination-authors';
import ajaxPaginationSearch from './modules/ajax-pagination-search';
import references from './modules/references';
import progressBar from './modules/progress-bar';
import newsletterPopup from './modules/newsletter-popup';
import mobileCats from './modules/mobile-cats';
import navigationMenu from './modules/navigation-menu';
import tagPage from './modules/tag-page';
import stickyCTA from './modules/stickyCTA';

document.addEventListener('DOMContentLoaded', () => {
  const body = document.querySelector('body');

  stopAnimations();
  // mobileNav();
  animations();
  // NOTE Also placed in rocket-skip-js
  // navigationMenu();
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
  if (
    body.classList.contains('single-post') ||
    body.classList.contains('single-research')
  ) {
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
    mobileCats();
  }
  if (body.classList.contains('tag')) {
    if (document.querySelector('.resource-page-js')) {
      tagPage();
    } else {
      ajaxPagination();
    }
  }
  if (body.classList.contains('single-authors')) {
    ajaxPagination();
    ajaxPaginationResearchAuthors();
  }
  if (body.classList.contains('single-medical-reviewer')) {
    ajaxPagination();
    ajaxPaginationResearchAuthors();
  }
  if (body.classList.contains('page-template-searchpage')) {
    ajaxPaginationSearch();
  }
  if (body.classList.contains('page-template-page-press')) {
    ajaxPagination();
  }
  if (
    document
      .querySelector('meta[property="og:title"]')
      .content.includes('https://www.charliehealth.com/page/hp1')
  ) {
    stickyCTA();
  }
  /**
   * needs to load last (or at least after TOC) in order for all links to be scrollable
   */
  anchorScroll();
});
