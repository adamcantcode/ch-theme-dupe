import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  let gridItemStagger = gsap.timeline({
    scrollTrigger: {
      trigger: '.home-cta',
      start: 'top 90%',
      end: 'top 75%',
      // markers: true,
      // scrub: true,
    },
  });
  gridItemStagger.fromTo(
    '.home-cta',
    {
      scale: .9,
      y: 50,
    },
    {
      scale: 1,
      y: 0,
      duration: 2,
      ease: 'power4.out',
    }
  );
});
