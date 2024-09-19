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
    shareButton();
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
  // if (document.querySelector('meta[property="og:title"]').content === 'hp1') {
  //   stickyCTA();
  // }
  /**
   * needs to load last (or at least after TOC) in order for all links to be scrollable
   */
  anchorScroll();
  // Function to create a cookie that stores URL if URL has params and if cookie doesn't exist
  function createCookieIfNeeded() {
    if (
      document.cookie.indexOf('urlWithParams=') === -1 &&
      window.location.search
    ) {
      console.log('Creating cookie');
      document.cookie =
        'urlWithParams=' +
        encodeURIComponent(window.location.href) +
        '; domain=.charliehealth.com; path=/';
    } else {
      console.log('Cookie already exists or no params in URL');
    }
  }

  // Function to get params from cookie and append to URL if URL does not already have params and JotForm iframe exists on the page
  function appendParamsIfNeeded() {
    var urlParams = new URLSearchParams(window.location.search);
    // Check if URL doesn't already have params
    if (urlParams.toString() === '') {
      console.log('URL does not have params');
      var jotformIframes = document.querySelectorAll('iframe[src*="jotform"]');
      // Check if JotForm iframe exists
      if (jotformIframes.length > 0) {
        console.log('Found JotForm iframe');
        var cookieValue = getCookie('urlWithParams');
        console.log('Cookie value:', cookieValue);
        if (cookieValue) {
          var params = decodeURIComponent(cookieValue).split('?')[1];
          console.log('Params from cookie:', params);
          if (params) {
            const paramPairs = params.split('&');
            const hasPageId = paramPairs.some((pair) =>
              pair.startsWith('page_id=')
            );
            console.log(hasPageId);
            console.log(paramPairs);
            if (!hasPageId) {
              var newURL =
                window.location.href +
                (window.location.search ? '&' : '?') +
                params;
              console.log('New URL:', newURL);
              window.location.href = newURL; // Reload the page with the new URL
            }
          } else {
            console.log('No params found in cookie');
          }
        } else {
          console.log('No cookie found');
        }
      } else {
        console.log('No JotForm iframe found');
      }
    } else {
      console.log('URL already has params:', window.location.search);
    }
  }

  // Helper function to get cookie value
  function getCookie(name) {
    var value = '; ' + document.cookie;
    var parts = value.split('; ' + name + '=');
    if (parts.length === 2) return parts.pop().split(';').shift();
  }

  // Call the functions
  if (!document.body.classList.contains('logged-in')) {
    createCookieIfNeeded();
    appendParamsIfNeeded();
  }

  if (window.location.pathname.startsWith('/careers')) {
    // if (!window.location.pathname.endsWith('openings')) {
    careersTracking();
    // }
  }
});
