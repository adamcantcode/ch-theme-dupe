// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

export default function tagPage() {
  window.addEventListener('DOMContentLoaded', () => {
    var swiper = new Swiper('.swiper.swiper-top-level', {
      slidesPerView: 1,
      slidesPerGroup:	1,
      spaceBetween: 16,
      loop: false,
      autoplay: false,
      pagination: false,
      navigation: {
        nextEl: '.swiper-button-next-arrow-carousel',
        prevEl: '.swiper-button-prev-arrow-carousel',
      },
      scrollbar: false,
      breakpoints: {
        480: {
          slidesPerView: 2,
          slidesPerGroup:	2,
          spaceBetween: 16,
        },
        1024: {
          slidesPerView: 3,
          slidesPerGroup:	3,
          spaceBetween: 16,
        },
      },
    });
  });
}
