import './index.css';

// GSAP
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  const sectionContainer = document.querySelector('.section-bg-js');

  // Bakground color change
  let sectionBg = gsap.timeline({
    scrollTrigger: {
      trigger: '.section-bg-js-cta',
      // start: 'top 70%',
      // end: 'top 50%',
      scrub: true,
      markers: true,
    },
  });
  sectionBg.fromTo(
    '.section-bg-js',
    {
      background: `linear-gradient(180deg, rgba(39, 45, 108, 1) 0%, rgba(22, 26, 61, 0) 100%)`,
    },
    {
      background: `linear-gradient(180deg,rgba(39, 45, 108, 1) 0%, rgba(22, 26, 61, 1) 100%)`,
    }
  );
});
