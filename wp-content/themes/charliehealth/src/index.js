import './css/main.css';

import mobileNav from './modules/mobile-nav';
import stopAnimations from "./modules/stop-animations";
import animations from "./modules/animations";
import anchorScroll from "./modules/anchor-scroll";

document.addEventListener('DOMContentLoaded', () => {
  mobileNav();
  stopAnimations();
  animations();
  anchorScroll();
});
