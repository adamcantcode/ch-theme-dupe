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

// Init settings for first video
const iframeFirst = document.querySelector('iframe');
var player = new Vimeo.Player(iframeFirst);

player.on('play', function () {
  console.log('Played the video');
});

player.play();

// on load, init swiper
window.addEventListener('load', () => {
  var unmuted = false;
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
      // fix for slider end glitch
      reachEnd: function () {
        this.snapGrid = [...this.slidesGrid];
        setTimeout(() => {
          document.querySelector('.swiper-button-next-testimonial').click();
          clearTimeout();
        }, 1);
      },
      slideChange: function () {
        const currentSlide =
          swiper.slides[swiper.activeIndex].querySelector('iframe');
        const currentPlayer = new Vimeo.Player(currentSlide);

        // Pause all videos
        swiper.slides.forEach((slide) => {
          slide = slide.querySelector('iframe');
          const player = new Vimeo.Player(slide);
          player.pause();
        });

        // Play current slide video, unmute
        currentPlayer.play();
        if (unmuted) {
          console.log(unmuted);
          currentPlayer.setVolume(1);
          console.log(currentPlayer.getVolume());
        }
      },
    },
  });

  // Handle first interaction/unmute
  swiper.slides.forEach((slide) => {
    slide = slide.querySelector('iframe');
    const player = new Vimeo.Player(slide);
    player.on('volumechange', function (data) {
      if (data.volume !== 0) {
        if (!unmuted) {
          player.setCurrentTime(0);
        }
        unmuted = true;
      }
    });
  });
});
