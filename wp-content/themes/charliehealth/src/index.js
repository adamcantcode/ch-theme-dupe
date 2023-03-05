import './css/main.css';

import mobileNav from './modules/mobile-nav';
import stopAnimations from "./modules/stop-animations";
import animations from "./modules/animations";

document.addEventListener('DOMContentLoaded', () => {
  mobileNav();
  stopAnimations();
  animations();
});
