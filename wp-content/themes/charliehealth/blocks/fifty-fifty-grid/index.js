import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  var statsBlock = document.querySelectorAll('.stats-block-grid-container:has(.stats-block-grid)');
  if (statsBlock) {
    let statsTimeline = gsap.timeline({
      scrollTrigger: {
        trigger: '.stats-block-grid-container:has(.stats-block-grid)',
        start: 'top 80%',
        // markers: true,
      },
    });
    statsTimeline.from('.stats-block-grid-container:has(.stats-block-grid) .counter', {
      textContent: 0 + '%',
      snap: { textContent: 1 },
      duration: 3,
      ease: 'rough',
    });
  }
});
