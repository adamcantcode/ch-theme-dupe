import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  const stepItems = gsap.utils.toArray('.step-item');

  let testing = gsap.timeline({ repeat: -1 });

  stepItems.forEach((stepItem, i) => {
    const anim = gsap.fromTo(
      stepItem,
      { autoAlpha: 0, y: 64 },
      { autoAlpha: 1, y: 0, ease: 'power4.out', duration: 2 }
    );
    ScrollTrigger.create({
      trigger: stepItem,
      animation: anim,
      start: 'top 66%',
      toggleActions: 'play pause resume reverse',
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
      start: 'bottom bottom',
      end: 'bottom center',
      scrub: true,
      // markers: true,
    },
  });
  let pinCta = gsap.timeline({
    scrollTrigger: {
      scrub: true,
      trigger: '.pin-cta-js',
      pin: '.pin-cta-js',
      start: 'center center',
      endTrigger: '.section-bg-js-cta',
      end: '+=100%',
      snap: [1],
      // toggleActions: 'play pause play reverse',
      // markers: true,
    },
  });

  let sctionBg = gsap.timeline({
    scrollTrigger: {
      trigger: '.section-bg-js-cta',
      start: 'top bottom',
      endTrigger: '.pin-cta-js-motion',
      end: 'top center',
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

  sctionBg.fromTo(
    '.section-bg-js',
    {
      background:
        'linear-gradient(180deg, rgba(247,245,241,1) 0%, rgba(143,146,205,0) 100%)',
    },
    {
      background:
        'linear-gradient(180deg,rgba(247,245,241,1) 0%, rgba(143,146,205,1) 100%)',
    }
  );
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

  let quotes = gsap.utils.toArray('.get-started-quote-js');

  testing
    .to(quotes[0], {
      autoAlpha: 1,
    })
    .to(quotes[0], {
      autoAlpha: 0,
      delay: 5,
    })
    .to(quotes[1], {
      autoAlpha: 1,
    })
    .to(quotes[1], {
      autoAlpha: 0,
      delay: 5,
    })
    .to(quotes[2], {
      autoAlpha: 1,
    })
    .to(quotes[2], {
      autoAlpha: 0,
      delay: 5,
    })
    .to(quotes[3], {
      autoAlpha: 1,
    })
    .to(quotes[3], {
      autoAlpha: 0,
      delay: 5,
    })
    .to(quotes[4], {
      autoAlpha: 1,
    })
    .to(quotes[4], {
      autoAlpha: 0,
      delay: 5,
    });
});
