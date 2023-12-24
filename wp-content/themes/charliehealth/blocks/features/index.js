import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  let gridItemStagger = gsap.timeline({
    scrollTrigger: {
      trigger: '.feature-card',
      start: 'top 80%',
      markers: true,
      // scrub: true,
    },
  });
  gridItemStagger.fromTo(
    '.feature-card',
    {
      autoAlpha: 0,
    },
    {
      autoAlpha: 1,
      duration: 3,
      stagger: 0.5,
      ease: 'power4.out',
    }
  );
});
