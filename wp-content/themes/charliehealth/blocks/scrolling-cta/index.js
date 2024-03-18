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
      start: 'top 70%',
      endTrigger: '.pin-cta-js-motion',
      end: 'top 50%',
      scrub: true,
    },
  });
  var gradientBG = 'rgba(255,255,255,1)';
  console.log(sectionContainer);
  console.log(sectionContainer.classList.contains('bg-white'));
  if (sectionContainer.classList.contains('bg-white')) {
    gradientBG = 'rgba(255,255,255,1)';
  }
  sectionBg.fromTo(
    '.section-bg-js',
    {
      background: `linear-gradient(180deg, ${gradientBG} 0%, rgba(143,146,205,0) 100%)`,
    },
    {
      background: `linear-gradient(180deg, ${gradientBG} 0%, rgba(143,146,205,1) 100%)`,
    }
  );
});
