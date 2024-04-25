import './index.css';

// GSAP
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  // Bakground color change
  let sectionBg = gsap.timeline({
    scrollTrigger: {
      trigger: '.section-bg-js',
      start: 'top bottom',
      end: 'bottom bottom',
      scrub: true,
      // markers: true,
    },
  });
  sectionBg.fromTo(
    '.section-bg-js',
    {
      background: `linear-gradient(180deg, rgba(22, 26, 61, 1) 0%, rgba(22, 26, 61, 1) 100%)`,
    },
    {
      background: `linear-gradient(180deg, rgba(22, 26, 61, 1) 0%, rgba(39, 45, 108, 1) 100%)`,
    }
  );
});
