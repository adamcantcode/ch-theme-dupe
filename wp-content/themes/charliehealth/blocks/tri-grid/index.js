import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  var statsBlock = document.querySelectorAll('.tri-grid-container:has(.stats-block-grid)');
  if (statsBlock) {
    let statsTimeline = gsap.timeline({
      scrollTrigger: {
        trigger: '.tri-grid-container:has(.tri-grid)',
        start: 'top 80%',
        // markers: true,
      },
    });
    statsTimeline.from('.tri-grid-container:has(.tri-grid) .counter', {
      textContent: 0 + '%',
      snap: { textContent: 1 },
      duration: 3,
      ease: 'rough',
    });
  }
});
