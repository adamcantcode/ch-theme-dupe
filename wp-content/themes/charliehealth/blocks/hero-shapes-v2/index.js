import { gsap } from 'gsap';

function cycleImages(
  selector,
  {
    interval = 4000,
    duration = 2,
    ease = 'power4.inOut',
    offset = 0,
    scaleAmount = 1,
  } = {}
) {
  const images = document.querySelectorAll(selector);
  if (images.length < 2) return;

  let currentIndex = 0;

  // Initial setup
  images.forEach((img, i) => {
    gsap.set(img, {
      opacity: i === 0 ? 1 : 0,
      scale: i === 0 ? 1 : scaleAmount,
      transformOrigin: '50% 50%',
      position: 'absolute',
      top: 0,
      left: 0,
    });
  });

  setTimeout(() => {
    setInterval(() => {
      const current = images[currentIndex];
      const nextIndex = (currentIndex + 1) % images.length;
      const next = images[nextIndex];

      gsap.to(current, { opacity: 0, scale: gsap.utils.random(0.9, scaleAmount), duration, ease });
      gsap.to(next, { opacity: 1, scale: 1, duration, ease });

      currentIndex = nextIndex;
    }, interval);
  }, offset);
}

window.addEventListener('DOMContentLoaded', () => {
  cycleImages('image.main', {
    interval: 5000,
    offset: 0,
    scaleAmount: 0.93,
  });

  cycleImages('image.secondary', {
    interval: 6200,
    offset: 1000,
    scaleAmount: 0.93,
  });

  cycleImages('image.tertiary', {
    interval: 7400,
    offset: 2000,
    scaleAmount: 0.93,
  });
});
