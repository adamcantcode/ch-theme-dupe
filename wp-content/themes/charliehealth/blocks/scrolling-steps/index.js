import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  let scrollImage = gsap.timeline({
    scrollTrigger: {
      // trigger: '.pin-image-container-js',
      // pin: '.pin-image-js',
      // start: 'top 60px',
      // end: 'bottom center',
      // // pinSpacing: false,
      // markers: true
    },
  });
});
