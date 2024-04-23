import './index.css';

// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';

// import styles bundle
import 'swiper/css/bundle';

// GSAP
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  // Bakground color change
  let sectionBg = gsap.timeline({
    scrollTrigger: {
      trigger: '.section-bg-js-cta',
      start: 'top 70%',
      endTrigger: '.pin-cta-js-motion',
      end: 'top 30%',
      scrub: true,
      // markers: true,
    },
  });
  sectionBg.fromTo(
    '.section-bg-js',
    {
      background:
        'linear-gradient(180deg, rgba(247,245,241,1) 0%, rgba(143,146,205,0) 100%)',
    },
    {
      background:
        'linear-gradient(180deg,rgba(247,245,241,1) 0%, rgba(143,146,205,1) 100%)',
    }
  );
});

// Your code to execute on the initial scroll
const iframeFirst = document.querySelector('iframe');
var player = new Vimeo.Player(iframeFirst);

player.on('play', function () {
  console.log('Played the video');
});

player.play();

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
      beforeSlideChangeStart: function () {
        const currentSlide =
          swiper.slides[swiper.activeIndex].querySelector('iframe');

        if (swiper.slides[swiper.activeIndex + 1].length > 0) {
          var nextSlide =
            swiper.slides[swiper.activeIndex + 1].querySelector('iframe');
        } else {
          var nextSlide = false;
        }

        var currentPlayer = new Vimeo.Player(currentSlide);
        currentPlayer.pause();

        if (nextSlide) {
          var currentPlayer = new Vimeo.Player(nextSlide);
          currentPlayer.play();
        }
      },
    },
  });

  // swiper.on('init	', () => {
  // });
});
