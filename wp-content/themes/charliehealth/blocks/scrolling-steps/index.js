import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  const stepItems = gsap.utils.toArray('.step-item');

  stepItems.forEach((stepItem, i) => {
    const anim = gsap.fromTo(
      stepItem,
      { autoAlpha: 0, y: 32 },
      { autoAlpha: 1, y: 0 }
    );
    ScrollTrigger.create({
      trigger: stepItem,
      animation: anim,
      start: 'top center',
      toggleActions: 'play pause resume reverse',
      duration: 2,
      // markers: true,
    });
  });

  let pinImage = gsap.timeline({
    scrollTrigger: {
      trigger: '.pin-image-js',
      pin: '.pin-image-js',
      start: 'center center',
      endTrigger: '.pin-section',
      end: 'bottom center',
      toggleActions: 'play reverse play reverse',
      // markers: true,
    },
  });
  let fadeImageIn = gsap.timeline({
    scrollTrigger: {
      trigger: '.pin-image-js',
      start: 'top 66%',
      // end: 'top bottom',
      scrub: true,
      toggleActions: 'play reverse play reverse',
      // markers: true,
    },
  });
  let fadeImageOut = gsap.timeline({
    scrollTrigger: {
      trigger: '.pin-image-end-js',
      // endTrigger: '.pin-image-end-js',
      start: 'bottom bottom',
      end: 'bottom center',
      scrub: true,
      // toggleActions: 'play reverse play reverse',
      markers: true,
    },
  });

  let sctionBg = gsap.timeline({
    scrollTrigger: {
      trigger: '.section-bg-js',
      start: 'bottom bottom',
      end: 'bottom center',
      scrub: true,
      // markers: true,
    },
  });

  fadeImageIn
    .fromTo(
      '.pin-image-js',
      {
        autoAlpha: 0,
      },
      {
        autoAlpha: 1,
      }
    )
  fadeImageOut.fromTo(
    '.pin-image-js',
    {
      autoAlpha: 1,
    },
    {
      autoAlpha: 0,
    }
  );

  sctionBg.to('.section-bg-js', {
    background: '#8F92CD',
  });
});
