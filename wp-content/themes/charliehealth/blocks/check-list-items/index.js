import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  let gridItemStagger = gsap.timeline({
    scrollTrigger: {
      trigger: '.check-list-item-js',
      start: 'top 80%',
    },
  });
  gridItemStagger.to('.check-list-item', {
    autoAlpha: 1,
    scale: 1,
    duration: 0.5,
    stagger: 0.2,
    ease: 'power4.out',
  });
});
