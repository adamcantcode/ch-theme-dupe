import './index.css';

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

window.addEventListener('DOMContentLoaded', () => {
  var swiper = new Swiper('.swiper.swiper-testimonial-carousel-big', {
    slidesPerView: 2,
    centeredSlides: true,
    loop: true,
    parallax: true,
    effect: 'fade',
    fadeEffect: {
      crossFade: true,
    },
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
      pauseOnMouseEnter: true,
    },
    speed: 1000,
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
      clickable: true,
    },
    navigation: false,
  });
});
