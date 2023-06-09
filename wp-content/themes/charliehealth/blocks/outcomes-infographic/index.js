import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  let outcomesInfographic = gsap.timeline({
    scrollTrigger: {
      trigger: '#outcomesInfographic',
      start: 'top 50%',
    },
  });

  outcomesInfographic.from('#outcomesInfographic .segment .rectangle', {
    opacity: 0,
    duration: '.3',
    translateX: '-10px',
    stagger: '.3',
  });
  outcomesInfographic.from(
    '#outcomesInfographic .segment .label',
    {
      opacity: 0,
      duration: '.3',
      stagger: '.3',
    },
    '>-0.5'
  );
  outcomesInfographic.from(
    '#outcomesInfographic .line',
    {
      scaleX: 0,
      transformOrigin: 'left',
      ease: 'expo.inOut',
      duration: '1',
    },
    '>-0.5'
  );
  outcomesInfographic.from('#outcomesInfographic .segment-dots .dot-pre', {
    scaleX: 0,
    scaleY: 0,
    transformOrigin: 'center',
    stagger: {
      each: '0.1',
    },
    ease: 'power1.inOut',
    duration: '.25',
  });
  outcomesInfographic.from('#outcomesInfographic .weekly-dots .dot', {
    scaleX: 0,
    scaleY: 0,
    transformOrigin: 'center',
    stagger: {
      each: '0.1',
    },
    ease: 'power1.inOut',
    duration: '.125',
  });
  outcomesInfographic.from('#outcomesInfographic .segment-dots .dot', {
    scaleX: 0,
    scaleY: 0,
    transformOrigin: 'center',
    stagger: {
      each: '0.1',
    },
    ease: 'power1.inOut',
    duration: '.625',
  });
  outcomesInfographic.from(
    '#outcomesInfographic .labels .label .label',
    {
      opacity: 0,
      stagger: {
        each: '0.2',
      },
      ease: 'power1.inOut',
      translateY: '16px',
      duration: '1',
    },
    '>-2.5'
  );
});
window.addEventListener('DOMContentLoaded', () => {
  let outcomesInfographicMobile = gsap.timeline({
    scrollTrigger: {
      trigger: '#outcomesInfographicMobile',
      start: 'top 50%',
    },
  });

  outcomesInfographicMobile.from('#outcomesInfographicMobile .segment .rectangle', {
    opacity: 0,
    duration: '.3',
    translateY: '-10px',
    stagger: '.3',
  });
  outcomesInfographicMobile.from(
    '#outcomesInfographicMobile .segment .label',
    {
      opacity: 0,
      duration: '.3',
      stagger: '.3',
    },
    '>-0.5'
  );
  outcomesInfographicMobile.from(
    '#outcomesInfographicMobile .arrow',
    {
      scaleY: 0,
      transformOrigin: 'top',
      ease: 'expo.inOut',
      duration: '1',
    },
    '>-0.5'
  );
  outcomesInfographicMobile.from('#outcomesInfographicMobile .segment-dots .dot-pre', {
    scaleX: 0,
    scaleY: 0,
    transformOrigin: 'center',
    stagger: {
      each: '0.1',
    },
    ease: 'power1.inOut',
    duration: '.25',
  });
  outcomesInfographicMobile.from('#outcomesInfographicMobile .weekly-dots .dot', {
    scaleX: 0,
    scaleY: 0,
    transformOrigin: 'center',
    stagger: {
      each: '0.1',
    },
    ease: 'power1.inOut',
    duration: '.125',
  });
  outcomesInfographicMobile.from('#outcomesInfographicMobile .segment-dots .dot', {
    scaleX: 0,
    scaleY: 0,
    transformOrigin: 'center',
    stagger: {
      each: '0.1',
    },
    ease: 'power1.inOut',
    duration: '.625',
  });
  outcomesInfographicMobile.from(
    '#outcomesInfographicMobile .labels .label .label',
    {
      opacity: 0,
      stagger: {
        each: '0.2',
      },
      ease: 'power1.inOut',
      translateX: '16px',
      duration: '1',
    },
    '>-2.5'
  );
});
