import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  let statsTimeline = gsap.timeline({
    scrollTrigger: {
      trigger: '.stats-block',
      start: 'top 80%',
      // markers: true,
    },
  });

  statsTimeline.from('.stats-block .divider', {
    scaleX: 0,
    transformOrigin: 'center center',
    duration: 1.5,
    ease: 'expo.inOut',
    stagger: 0.15,
  });
  statsTimeline.from(
    '.stats-block .counter',
    {
      yPercent: 200,
      opacity: 0,
      duration: 1.5,
      ease: 'expo.inOut',
      stagger: 0.15,
    },
    '-=1.25'
  );
  statsTimeline.from(
    '.stats-block .details',
    {
      yPercent: -200,
      opacity: 0,
      duration: 1.5,
      ease: 'expo.inOut',
      stagger: 0.15,
    },
    '<'
  );
  statsTimeline.from(
    '.stats-block .counter',
    {
      textContent: 0 + '%',
      snap: { textContent: 1 },
      duration: 3,
      ease: 'rough',
    },
    '-=1'
  );
});
