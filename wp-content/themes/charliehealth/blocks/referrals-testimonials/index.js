import './index.css';

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

window.addEventListener('DOMContentLoaded', () => {
  var swiper = new Swiper('.swiper.swiper-referrals-testimonial', {
    slidesPerView: 2.25,
    spaceBetween: 80,
    slideToClickedSlide: true,
    // centeredSlides: true,
    loop: false,
    pagination: false,
    navigation: false,
    mousewheel: {
      enabled: true,
      releaseOnEdges: true,
    }
  });
});
