import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  // const stepItems = gsap.utils.toArray('.step-item');

  // stepItems.forEach((stepItem, i) => {
  //   const anim = gsap.fromTo(
  //     stepItem,
  //     { autoAlpha: 0, y: 32 },
  //     { autoAlpha: 1, y: 0 }
  //   );
  //   ScrollTrigger.create({
  //     trigger: stepItem,
  //     animation: anim,
  //     start: 'top center',
  //     toggleActions: 'play pause resume reverse',
  //     // markers: true,
  //   });
  // });

  let pinImage = gsap.timeline({
    scrollTrigger: {
      trigger: '.pin-image-js',
      // scrub: true,
      pin: '.pin-image-js',
      start: 'center center',
      endTrigger: '.pin-section',
      end: 'bottom center',
      toggleActions: 'play reverse play reverse',
      // // pinSpacing: false,
      markers: true,
    },
  });

  // let sctionBg = gsap.timeline({
  //   scrollTrigger: {
  //     trigger: '.section-bg-js',
  //     start: 'bottom bottom',
  //     end: 'center center',
  //     scrub: true,
  //     // markers: true,
  //   },
  // });

  pinImage.to('.pin-image-js', {
    autoAlpha: 1,
    duration: 1,
  });

  // sctionBg.to('.section-bg-js', {
  //   background: '#8F92CD',
  // });
});
