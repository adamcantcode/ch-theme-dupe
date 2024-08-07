import './index.css';

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

// GSAP
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('load', () => {
  var swiper = new Swiper('.swiper.swiper-careers-testimonial', {
    slidesPerView: 'auto',
    spaceBetween: 20,
    slideToClickedSlide: true,
    speed: 1000,
    loop: false,
    breakpoints: {
      1024: {
        slidesPerView: 'auto',
        spaceBetween: 20,
      },
    },
    navigation: {
      nextEl: '.swiper-button-next-testimonial',
      prevEl: '.swiper-button-prev-testimonial',
    },
    on: {
      reachEnd: function () {
        this.snapGrid = [...this.slidesGrid];
        setTimeout(() => {
          document.querySelector('.swiper-button-next-testimonial').click();
          clearTimeout();
        }, 1);
      },
    },
  });
});
