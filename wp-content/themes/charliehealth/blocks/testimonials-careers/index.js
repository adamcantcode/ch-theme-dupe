import './index.css';

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

window.addEventListener('DOMContentLoaded', () => {
  var swiper = new Swiper('.swiper.swiper-careers-testimonial', {
    slidesPerView: 'auto',
    spaceBetween: 20,
    speed: 1000,
    loop: false,
    breakpoints: {
      1024: {
        slidesPerView: 'auto',
        spaceBetween: 20,
      },
    },
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
  // swiper.on('slideChange', function () {
  //   console.log('slide changed');
  //   swiper.update()
  //   swiper.updateSize();
  // });
  // swiper.on('transitionEnd', function () {
  //   console.log('transiton end');
  //   swiper.update()
  //   swiper.updateSize();
  // });
});
