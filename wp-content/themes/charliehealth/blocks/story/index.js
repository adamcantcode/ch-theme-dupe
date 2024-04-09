import './index.css';

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  let story = gsap.timeline({
    scrollTrigger: {
      trigger: '#story',
      start: 'top 80%',
    },
  });

  story.to('#story', {
    autoAlpha: 1,
    duration: 1,
  });
  story.to('.highlight-bg-js', {
    scaleX: 1,
    duration: 0.9,
    stagger: 0.3,
    ease: 'power4.inOut',
  });
});
