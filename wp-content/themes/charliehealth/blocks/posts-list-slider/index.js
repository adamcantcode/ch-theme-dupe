// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

window.addEventListener('DOMContentLoaded', () => {
  var swipergpt = new Swiper('.swiper.swiper-gpt', {
    slidesPerView: 1,
    slidesPerGroup: 1,
    spaceBetween: 20,
    loop: false,
    autoplay: false,
    pagination: false,
    navigation: {
      nextEl: '.swiper-gpt.swiper-button-next-arrow-carousel',
      prevEl: '.swiper-gpt.swiper-button-prev-arrow-carousel',
    },
    scrollbar: false,
    breakpoints: {
      480: {
        slidesPerView: 2,
        slidesPerGroup: 2,
        spaceBetween: 20,
      },
      1024: {
        slidesPerView: 4,
        slidesPerGroup: 4,
        spaceBetween: 20,
      },
    },
  });
});
