import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  let mm = gsap.matchMedia();

  mm.add('(min-width: 1024px)', () => {
    let stepItems = gsap.utils.toArray('.step-item');
    let pinImage = gsap.timeline({
      scrollTrigger: {
        trigger: '.pin-image-js',
        pin: '.pin-image-js',
        pinSpacing: false,
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
        start: 'top 95%',
        end: 'top center',
        scrub: true,
        toggleActions: 'play reverse play reverse',
        // markers: true,
      },
    });
    let fadeImageOut = gsap.timeline({
      scrollTrigger: {
        trigger: '.fade-out-js',
        start: 'bottom 60%',
        end: 'bottom 50%',
        scrub: true,
      },
    });
    let pinCta = gsap.timeline({
      scrollTrigger: {
        scrub: true,
        trigger: '.pin-cta-js',
        pin: '.pin-cta-js',
        start: 'center center',
        endTrigger: '.section-bg-js-cta',
        end: '+=50%',
        // markers: true,
      },
    });
    let pinCtaFadein = gsap.timeline({
      scrollTrigger: {
        scrub: 1,
        trigger: '.pin-section',
        start: 'bottom bottom',
        end: '+=50%',
        // snap: [1],
        // markers: true,
      },
    });

    stepItems.forEach((stepItem, i) => {
      const anim = gsap.fromTo(
        stepItem,
        { autoAlpha: 0, y: 64 },
        { autoAlpha: 1, y: 0, ease: 'power4.out', duration: 2 }
      );
      ScrollTrigger.create({
        trigger: stepItem,
        animation: anim,
        start: 'top 90%',
        toggleActions: 'play pause resume reverse',
        // markers: true,
      });
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

    pinCtaFadein.fromTo(
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
    // Bakground color change
    let sectionBg = gsap.timeline({
      scrollTrigger: {
        trigger: '.section-bg-js-cta',
        start: 'top bottom',
        endTrigger: '.pin-cta-js-motion',
        end: 'top 60%',
        scrub: true,
        // markers: true,
      },
    });
    sectionBg.fromTo(
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
  });

  mm.add('(max-width: 1023px)', () => {
    // Bakground color change
    let sectionBg = gsap.timeline({
      scrollTrigger: {
        trigger: '.pin-section',
        start: 'top bottom',
        endTrigger: '.pin-cta-js-motion',
        end: 'top 40%',
        scrub: true,
        // markers: true,
      },
    });
    sectionBg.fromTo(
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
  });

  // Slideshow
  let slideShow = gsap.timeline({ repeat: -1 });
  let slideShowDesktop = gsap.timeline({ repeat: -1 });
  let quotes = gsap.utils.toArray('.mobile-js .get-started-quote-js');
  let quotesDesktop = gsap.utils.toArray('.desktop-js .get-started-quote-js');

  slideShow
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
  slideShowDesktop
    .to(quotesDesktop[0], {
      autoAlpha: 1,
    })
    .to(quotesDesktop[0], {
      autoAlpha: 0,
      delay: 5,
    })
    .to(quotesDesktop[1], {
      autoAlpha: 1,
    })
    .to(quotesDesktop[1], {
      autoAlpha: 0,
      delay: 5,
    })
    .to(quotesDesktop[2], {
      autoAlpha: 1,
    })
    .to(quotesDesktop[2], {
      autoAlpha: 0,
      delay: 5,
    })
    .to(quotesDesktop[3], {
      autoAlpha: 1,
    })
    .to(quotesDesktop[3], {
      autoAlpha: 0,
      delay: 5,
    })
    .to(quotesDesktop[4], {
      autoAlpha: 1,
    })
    .to(quotesDesktop[4], {
      autoAlpha: 0,
      delay: 5,
    });

  // Function to be executed when scroll position is 2x window height
  function runCodeAfterScroll() {
    // Your code here
    ScrollTrigger.refresh();
  }

  // Event listener function
  function scrollEventListener() {
    // Calculate the scroll position and window height
    var scrollPosition = window.scrollY;
    var windowHeight = window.innerHeight;

    // Check if the scroll position is 2x window height
    if (scrollPosition >= 1.5 * windowHeight) {
      // Remove the event listener
      window.removeEventListener('scroll', scrollEventListener);

      // Run the code
      runCodeAfterScroll();
    }
  }

  // Add the event listener for scroll events
  window.addEventListener('scroll', scrollEventListener);
});
