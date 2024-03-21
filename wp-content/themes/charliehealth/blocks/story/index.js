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

  story.to('', {
    autoAlpha: 1,
  });
});
