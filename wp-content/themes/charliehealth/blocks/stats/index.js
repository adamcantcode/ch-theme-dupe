import { CountUp } from 'countup.js';

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
      duration: 3,
      easingFn,
    };
    var countUp = new CountUp(target, number, options);
    countUp.start();
  });
});
