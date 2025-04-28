import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  let gridItemStagger = gsap.timeline({
    scrollTrigger: {
      trigger: '.feature-card',
      start: 'top 80%',
    },
  });
  gridItemStagger.to('.feature-card', {
    autoAlpha: 1,
    duration: 1.5,
    stagger: 0.3,
    ease: 'power4.out',
  });
});
