import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  let graphTimeline = gsap.timeline({
    scrollTrigger: {
      trigger: '#depressionAnxietyGraph',
      start: 'top 80%',
    },
  });

  graphTimeline.to('#depressionAnxietyGraph', {
    opacity: 1,
    duration: .5,
  });
  graphTimeline.to('.depression-discharge', {
    scaleY: 0.43,
    transformOrigin: 'bottom bottom',
    duration: 1,
    ease: 'expo.inOut',
  });
  graphTimeline.to('.depression-line', {
    opacity: 1,
    duration: 1,
  });
  graphTimeline.to(
    '.anxiety-discharge',
    {
      scaleY: 0.52,
      transformOrigin: 'bottom bottom',
      duration: 1,
      ease: 'expo.inOut',
    },
    '-=2'
  );
  graphTimeline.to(
    '.anxiety-line',
    {
      opacity: 1,
      duration: 1,
    },
    '-=1'
  );
});
