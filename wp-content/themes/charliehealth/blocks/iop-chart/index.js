import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  let iopMainTimeline = gsap.timeline({
    scrollTrigger: {
      trigger: '#mainContainer',
      start: 'top 80%',
      // markers: true,
    },
  });

  iopMainTimeline
    .from('#mainContainer', {
      opacity: 0,
      y: '8px',
      duration: 2,
      ease: 'expo.inOut',
    })
    .from(
      '#crisis',
      {
        opacity: 0,
        y: '-8px',
        duration: 1,
        ease: 'expo.inOut',
      },
      '-=1'
    )
    .from(
      '#concerns',
      {
        opacity: 0,
        y: '8px',
        duration: 1,
        ease: 'expo.inOut',
      },
      '-=.5'
    )
    .from(
      '#symptomsDown',
      {
        opacity: 0,
        y: '-16px',
        duration: 1,
        ease: 'expo.inOut',
      },
      '-=.5'
    )
    .from(
      '#symptomsUp',
      {
        opacity: 0,
        y: '16px',
        duration: 1,
        ease: 'expo.inOut',
      },
      '-=.5'
    )
    .from(
      '#inpatient',
      {
        opacity: 0,
        y: '-8px',
        duration: 1,
        ease: 'expo.inOut',
      },
      '-=.5'
    )
    .from(
      '#outpatient',
      {
        opacity: 0,
        y: '8px',
        duration: 1,
        ease: 'expo.inOut',
      },
      '-=.5'
    )
    .from(
      '#circleBlue',
      {
        opacity: 0,
        scale: 0,
        duration: 2,
        ease: 'expo.inOut',
      },
      '-=1'
    )
    .from(
      '#circleWhite',
      {
        opacity: 0,
        scale: 0,
        duration: 2,
        ease: 'expo.inOut',
      },
      '-=1.5'
    )
    .from(
      '#ch',
      {
        opacity: 0,
        duration: 2,
        ease: 'expo.inOut',
      },
      '-=.5'
    );
});
