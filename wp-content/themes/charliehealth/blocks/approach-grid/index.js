import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  let gridItemStagger = gsap.timeline({
    scrollTrigger: {
      trigger: '.approach-grid-js',
      start: 'top 80%',
      // markers: true,
      // scrub: true,
      duration: 3,
    },
  });
  gridItemStagger.to('.grid-approach-items-js > div', {
    autoAlpha: 1,
    duration: 3,
    stagger: 0.2,
    ease: 'power4.out',
  });
});
