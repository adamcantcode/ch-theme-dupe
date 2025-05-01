import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

document.addEventListener('scheduleRendered', () => {
  ScrollTrigger.getAll().forEach((trigger) => trigger.kill());

  gsap.fromTo(
    '#schedule',
    { autoAlpha: 0, y: 20 },
    {
      duration: 0.3,
      autoAlpha: 1,
      y: 0,
      ease: 'power2.out',
    }
  );
  gsap.from('.event-cards-js', {
    duration: 0.4,
    y: 20,
    autoAlpha: 0,
    stagger: 0.05,
    ease: 'power2.out',
  });

  document.addEventListener('tagFilterToggled', (e) => {
    const el = e.detail;
    gsap.fromTo(
      el,
      { scale: 0.95 },
      {
        scale: 1,
        duration: 0.2,
        ease: 'back.out(2)',
      }
    );
  });

  document.addEventListener('dropdownChanged', (e) => {
    const el = e.detail;
    gsap.fromTo(
      el,
      { scale: 0.97 },
      {
        scale: 1,
        duration: 0.2,
        ease: 'power1.out',
      }
    );
  });

  // Fade in/out on scroll for each card
  document.querySelectorAll('.event-day-js').forEach((card) => {
    gsap.fromTo(
      card,
      { autoAlpha: 0, y: 30 },
      {
        autoAlpha: 1,
        y: 0,
        ease: 'power2.out',
        duration: 0.6,
        scrollTrigger: {
          trigger: card,
          start: 'top 90%',
          end: 'bottom 10%',
          toggleActions: 'play reverse play reverse', // fade in and out
          markers: false, // enable for debug if needed
        },
      }
    );
  });
});
