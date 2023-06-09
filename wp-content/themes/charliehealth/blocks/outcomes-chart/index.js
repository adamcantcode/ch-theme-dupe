import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  let graphAnimate = gsap.timeline({
    scrollTrigger: {
      trigger: '#graphAnimate',
      start: 'top 50%',
    },
  });

  graphAnimate.from('#graphAnimate .scales .line', {
    scaleX: 0,
    transformOrigin: 'left',
    stagger: {
      each: 0.05,
    },
    ease: 'power1.inOut',
    duration: '1',
  });
  graphAnimate.from(
    '#graphAnimate .y-labels',
    {
      opacity: 0,
      duration: '.5',
      translateX: '10px',
    },
    '>-0.7'
  );
  graphAnimate.from(
    '#graphAnimate .ch-iop-bar',
    {
      scaleY: 0,
      opacity: 0,
      transformOrigin: 'bottom',
      duration: '1',
      ease: 'power1.inOut',
    },
    '>-0.7'
  );
  graphAnimate.from('#graphAnimate .percent-91', {
    opacity: 0,
    duration: '.3',
  });
  graphAnimate.from(
    '#graphAnimate .avg-iop-bar',
    {
      scaleY: 0,
      opacity: 0,
      transformOrigin: 'bottom',
      duration: '1',
      ease: 'power1.inOut',
    },
    '>-1'
  );
  graphAnimate.from('#graphAnimate .percent-65', {
    opacity: 0,
    duration: '.3',
  });
  graphAnimate.from(
    '#graphAnimate .x-labels',
    {
      opacity: 0,
      duration: '.3',
      translateY: '-10px',
    },
    '>-.2'
  );
  graphAnimate.from(
    '#graphAnimate .title',
    {
      opacity: 0,
      duration: '.3',
      translateY: '10px',
    },
    '>-0.3'
  );
});
