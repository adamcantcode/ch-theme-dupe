import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  var statsBlock = document.querySelectorAll('.stats-block');
  if (statsBlock) {
    let statsTimeline = gsap.timeline({
      scrollTrigger: {
        trigger: '.stats-block',
        start: 'top 80%',
        // markers: true,
      },
    });

    statsTimeline.from('.stats-block .divider', {
      scaleX: 0,
      transformOrigin: 'center center',
      duration: 1.5,
      ease: 'expo.inOut',
      stagger: 0.15,
    });
    statsTimeline.from(
      '.stats-block .counter',
      {
        yPercent: 200,
        opacity: 0,
        duration: 1.5,
        ease: 'expo.inOut',
        stagger: 0.15,
      },
      '-=1.25'
    );
    statsTimeline.from(
      '.stats-block .details',
      {
        yPercent: -200,
        opacity: 0,
        duration: 1.5,
        ease: 'expo.inOut',
        stagger: 0.15,
      },
      '<'
    );
    statsTimeline.from(
      '.stats-block .counter',
      {
        textContent: 0 + '%',
        snap: { textContent: 1 },
        duration: 3,
        ease: 'rough',
      },
      '-=1'
    );
  }

  var circles = document.querySelectorAll('.stats-circles');
  if (circles) {
    circles.forEach((circle, index) => {
      var path = circle.querySelector('.js-stats-circle svg circle');
      var circlePercent = parseInt(circle.querySelector('h2').innerText);
      var pathLength = path.getTotalLength();
      var offset = pathLength * (1 - circlePercent / 100);

      gsap.set(path, {
        strokeDasharray: pathLength,
        opacity: 0,
        rotate: '-90deg',
        transformOrigin: 'center center',
      });

      gsap.fromTo(
        path,
        {
          strokeDashoffset: pathLength,
          opacity: 0,
        },
        {
          strokeDashoffset: offset,
          ease: 'ease.in',
          opacity: 1,
          duration: 2,
          delay: () => index / 2,
          scrollTrigger: {
            trigger: '.stats-block-circles',
            start: 'top 80%',
            end: 'bottom 70%',
          },
        }
      );
    });
    gsap.from(
      '.stats-block-circles .number',
      {
        scrollTrigger: {
          trigger: '.stats-block-circles',
          start: 'top 80%',
          end: 'bottom center',
          toggleActions: 'play pause resume reverse',
        },
        textContent: 0 + '%',
        snap: { textContent: 1 },
        duration: 2,
        opacity: 0,
        ease: 'rough',
      },
      '-=1'
    );
  }
});
