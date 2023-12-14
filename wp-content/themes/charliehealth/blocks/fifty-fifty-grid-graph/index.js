import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  var statsBlock = document.querySelectorAll('.stats-block-grid-graph-container:has(.stats-block-grid-graph)');
  if (statsBlock) {
    let statsTimeline = gsap.timeline({
      scrollTrigger: {
        trigger: '.stats-block-grid-graph-container:has(.stats-block-grid-graph)',
        start: 'top 80%',
        // markers: true,
      },
    });
    statsTimeline.from('.stats-block-grid-graph-container:has(.stats-block-grid-graph) .counter', {
      textContent: 0 + '%',
      snap: { textContent: 1 },
      duration: 3,
      ease: 'rough',
    });
  }
});
