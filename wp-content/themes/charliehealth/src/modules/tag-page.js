import './index.css';

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

window.addEventListener('DOMContentLoaded', () => {
  var swiper = new Swiper('.swiper.swiper-top-level', {
    slidesPerView: 3,
    loop: false,
    autoplay: false,
    effect: 'fade',
    speed: 1000,
    // If we need pagination
    pagination: false,
    // Navigation arrows
    navigation: false,
    // And if we need scrollbar
    scrollbar: false,
  });
});
