import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  let outcomes = gsap.timeline({
    scrollTrigger: {
      trigger: '#outcomesContainer',
      start: 'top 30%',
      pin: true,
      scrub: true,
      end: '+=300',
      // markers: true,
    },
  });

  outcomes.set('#text2, #svg1', {
    autoAlpha: 0,
    y: '0',
  });
  outcomes.set('#text1, #svg2', {
    autoAlpha: 1,
    y: '0',
  });

  outcomes.to('#text1, #svg2', {
    y: '0',
  });
  outcomes.to('#text1, #svg2', {
    autoAlpha: 0,
  });

  outcomes.to('#text2, #svg1', {
    autoAlpha: 1,
    y: '-50px',
  });
});
