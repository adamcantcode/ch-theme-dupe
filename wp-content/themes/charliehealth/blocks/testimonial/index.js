import './index.css';

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

window.addEventListener('DOMContentLoaded', () => {
  var swiper = new Swiper('.swiper.swiper-testimonial', {
    slidesPerView: 1.75,
    spaceBetween: 64,
    speed: 1000,
    loop: false,
    autoplay: false,
    pagination: {
      el: '.swiper-pagination',
      type: 'progressbar',
    },
    navigation: {
      nextEl: '.swiper-button-next-arrow',
      prevEl: '.swiper-button-prev-arrow',
    },
    on: {
      reachEnd: function () {
        this.snapGrid = [...this.slidesGrid];
        setTimeout(() => {
          document.querySelector('.swiper-button-next-arrow').click();
          clearTimeout();
        }, 1);
      },
    },
  });
});
