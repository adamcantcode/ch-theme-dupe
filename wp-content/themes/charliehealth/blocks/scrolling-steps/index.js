import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  const stepItems = gsap.utils.toArray('.step-item');

  stepItems.forEach((stepItem, i) => {
    const anim = gsap.fromTo(
      stepItem,
      { autoAlpha: 0, y: 64 },
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
      scrub: 0.5,
      toggleActions: 'play reverse play reverse',
      // markers: true,
    },
  });
  let fadeImageOut = gsap.timeline({
    scrollTrigger: {
      trigger: '.pin-image-end-js',
      start: 'bottom bottom',
      end: 'bottom center',
      scrub: 0.5,
      // markers: true,
    },
  });
  let pinCta = gsap.timeline({
    scrollTrigger: {
      // scrub: true,
      trigger: '.pin-cta-js',
      pin: '.pin-cta-js',
      start: 'center center',
      endTrigger: '.section-bg-js-cta',
      end: '+=100%',
      // toggleActions: 'play reverse play reverse',
      markers: true,
    },
  });

  let sctionBg = gsap.timeline({
    scrollTrigger: {
      trigger: '.section-bg-js-cta',
      start: 'top bottom',
      end: 'bottom center',
      scrub: true,
      // markers: true,
    },
  });

  fadeImageIn.fromTo(
    '.pin-image-js',
    {
      autoAlpha: 0,
    },
    {
      autoAlpha: 1,
    }
  );
  fadeImageOut.to('.pin-image-js', {
    autoAlpha: 0,
  });

  sctionBg.to('.section-bg-js', {
    background: '#8F92CD',
  });
  pinCta.fromTo(
    '.pin-cta-js-motion',
    {
      autoAlpha: 0,
      y: 128,
    },
    {
      autoAlpha: 1,
      y: 0,
    }
  );
});
