import './index.css';

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

window.addEventListener('DOMContentLoaded', () => {
  var swiper = new Swiper('.swiper.swiper-blog-carousel', {
    slidesPerView: 1,
    spaceBetween: 32,
    loop: true,
    autoplay: false,
    // speed: 1000,
    pagination: {
      el: '.swiper-pagination',
      type: 'bullets',
    },
  });
});
