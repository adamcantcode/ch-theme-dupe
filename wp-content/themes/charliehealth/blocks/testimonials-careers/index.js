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

  let mm = gsap.matchMedia();

  mm.add('(min-width: 1024px)', () => {
    let pinCta = gsap.timeline({
      scrollTrigger: {
        scrub: true,
        trigger: '.pin-cta-js',
        pin: '.pin-cta-js',
        start: 'center center',
        endTrigger: '.section-bg-js-cta',
        end: '+=50%',
        // markers: true,
      },
    });

    // Bakground color change
    let sectionBg = gsap.timeline({
      scrollTrigger: {
        trigger: '.section-bg-js-cta',
        start: 'top 70%',
        endTrigger: '.pin-cta-js-motion',
        end: 'top 50%',
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

  mm.add('(max-width: 1023px)', () => {
    // Bakground color change
    // let sectionBg = gsap.timeline({
    //   scrollTrigger: {
    //     trigger: '.pin-section',
    //     start: 'top bottom',
    //     endTrigger: '.pin-cta-js-motion',
    //     end: 'top 40%',
    //     scrub: true,
    //     // markers: true,
    //   },
    // });
    // sectionBg.fromTo(
    //   '.section-bg-js',
    //   {
    //     background:
    //       'linear-gradient(180deg, rgba(247,245,241,1) 0%, rgba(143,146,205,0) 100%)',
    //   },
    //   {
    //     background:
    //       'linear-gradient(180deg,rgba(247,245,241,1) 0%, rgba(143,146,205,1) 100%)',
    //   }
    // );
  });
});
