import './css/main.css';

import mobileNav from './modules/mobile-nav';
import stopAnimations from "./modules/stop-animations";

document.addEventListener('DOMContentLoaded', (event) => {
  mobileNav();
  stopAnimations();
});
