import { CountUp } from 'countup.js';
import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  const counters = document.querySelectorAll('.counter');
  const easingFn = function (t, b, c, d) {
    var ts = (t /= d) * t;
    var tc = ts * t;
    return b + c * (tc + -3 * ts + 3 * t);
  };
  counters.forEach((counter) => {
    let target = counter.id;
    let number = parseInt(counter.innerHTML);
    let options = {
      suffix: '%',
      duration: 2,
      easingFn,
      enableScrollSpy: true,
      scrollSpyDelay: 1700,
      scrollSpyOnce: true,
    };
    var countUp = new CountUp(target, number, options);
    countUp.start();
  });

  gsap.from('.stats-block .counter', {
    scrollTrigger: {
      trigger: '.stats-block',
      start: 'top 80%',
      // markers: true,
      // toggleActions: 'play complete complete reverse',
    },
    yPercent: 200,
    opacity: 0,
    duration: 1.5,
    delay: 0.7,
    ease: 'Power2.easeInOut',
  });
  gsap.from('.stats-block .details', {
    scrollTrigger: {
      trigger: '.stats-block',
      start: 'top 80%',
      // markers: true,
      // toggleActions: 'play complete complete reverse',
    },
    yPercent: -200,
    opacity: 0,
    duration: 1.5,
    delay: 0.7,
    ease: 'Power2.easeInOut',
  });
  gsap.from('.stats-block .divider', {
    scrollTrigger: {
      trigger: '.stats-block',
      start: 'top 80%',
      // markers: true,
      // toggleActions: 'play complete complete reverse',
    },
    scaleX: 0,
    transformOrigin: 'center center',
    duration: 1.5,
    ease: 'Power2.easeInOut',
  });
});
