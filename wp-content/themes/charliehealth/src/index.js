import './css/main.css';

import mobileNav from './modules/mobile-nav';
import stopAnimations from './modules/stop-animations';
import animations from './modules/animations';
import anchorScroll from './modules/anchor-scroll';
import revealBackToTop from './modules/back-to-top';
import outreachModals from './modules/outreach-modals';

document.addEventListener('DOMContentLoaded', () => {
  const body = document.querySelector('body');

  stopAnimations();
  mobileNav();
  animations();
  anchorScroll();
  if (
    body.classList.contains('single-areas-of-care') ||
    body.classList.contains('single-treatment-modalities')
  ) {
    revealBackToTop();
  }
  if (body.classList.contains('single-region')) {
    outreachModals();
  }
});
