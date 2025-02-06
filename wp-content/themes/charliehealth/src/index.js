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
import stickyCTA from './modules/sticky-cta';
import fadeUpIn from './modules/fade-up-in';
import careersTracking from './modules/careers-tracking';
import userPagesTracker from './modules/user-pages-tracker';
import linkedInCTATracker from './modules/linkedin-cta-tracker';

document.addEventListener('DOMContentLoaded', () => {
  const body = document.querySelector('body');

  stopAnimations();
  // mobileNav();
  animations();
  // NOTE Also placed in rocket-skip-js
  // navigationMenu();
  // if (body.classList.contains('single-post')) {
  //   revealBackToTop();
  // }
  if (body.classList.contains('single-region')) {
    outreachModals();
  }
  if (
    body.classList.contains('single-post') ||
    body.classList.contains('single-activities') ||
    body.classList.contains('single-research')
  ) {
    toc();
    references();
    progressBar();
    // shareButton();
  }
  if (body.classList.contains('blog')) {
    newsletterPopup();
    featuredBlogSlider();
    ajaxPagination();
    ajaxPaginationResearch();
  }
  if (body.classList.contains('page-template-page-research')) {
    featuredBlogSlider();
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
  if (body.classList.contains('page-template-searchpage')) {
    ajaxPaginationSearch();
  }
  if (body.classList.contains('page-template-page-press')) {
    ajaxPagination();
  }
  if (
    document.querySelector('section .acf-innerblocks-container .fade-up-in')
  ) {
    fadeUpIn();
  }
  /**
   * needs to load last (or at least after TOC) in order for all links to be scrollable
   */
  anchorScroll();

  if (window.location.pathname.startsWith('/careers')) {
    careersTracking();
  }

  if (window.location.href.includes('#form')) {
    setTimeout(() => {
      document.getElementById('form').scrollIntoView();
    }, 1000);
  }

  linkedInCTATracker();
  userPagesTracker();
});
