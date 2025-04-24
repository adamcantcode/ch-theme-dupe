import { gsap } from 'gsap';

function cycleImages(
  selector,
  { interval = 5000, duration = 1, ease = 'power4.inOut', offset = 0 } = {}
) {
  const images = document.querySelectorAll(selector);
  if (images.length < 2) return;

  let currentIndex = 0;

  // Initialize visibility
  images.forEach((img, i) => {
    img.style.opacity = i === 0 ? 1 : 0;
  });

  setTimeout(() => {
    setInterval(() => {
      const current = images[currentIndex];
      const nextIndex = (currentIndex + 1) % images.length;
      const next = images[nextIndex];

      gsap.to(current, { opacity: 0, duration, ease });
      gsap.to(next, { opacity: 1, duration, ease });

      currentIndex = nextIndex;
    }, interval);
  }, offset);
}

window.addEventListener('DOMContentLoaded', () => {
  cycleImages('image.main', { offset: 0 });
  cycleImages('image.secondary', { offset: 1500 }); // starts 1s later
  cycleImages('image.tertiary', { offset: 2500 }); // starts 2s later
});
