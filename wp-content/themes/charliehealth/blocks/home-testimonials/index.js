import './index.css';

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

window.addEventListener('DOMContentLoaded', () => {
  var swiper = new Swiper('.swiper.swiper-home-testimonials', {
    slidesPerView: 1,
    loop: true,
    autoplay: {
      delay: 300,
      disableOnInteraction: false,
      pauseOnMouseEnter: false,
    },
    autoplay: false,
    effect: 'fade',
    fadeEffect: {
      crossFade: true,
    },
    speed: 100,
    pagination: false,
    navigation: false,
    scrollbar: false,
  });
});
