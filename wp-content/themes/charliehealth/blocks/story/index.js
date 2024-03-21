import './index.css';

import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  let story = gsap.timeline({
    scrollTrigger: {
      trigger: '#story',
      start: 'top 80%',
      markers: true,
    },
  });

  story.to('#story', {
    autoAlpha: 1,
    duration: 2,
  });
  story.to('html', {
    '--myScale': 1,
    duration: 1,
  });
});
