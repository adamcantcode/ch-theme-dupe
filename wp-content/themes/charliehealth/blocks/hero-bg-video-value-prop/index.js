import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  const phrases = [
    { text: 'mental health treatment', color: 'text-lavender-300' },
    { text: 'substance use disorder treatment', color: 'text-yellow-300' },
    { text: 'medication-assisted therapy', color: 'text-pale-blue-300' },
    { text: 'cognitive behavioral therapy', color: 'text-lavender-300' },
  ];

  const textEl = document.querySelector('.value-props-js');
  let index = 0;

  // Init
  textEl.textContent = phrases[index].text;
  textEl.classList.add(phrases[index].color);

  setInterval(() => {
    // Animate out
    gsap.to(textEl, {
      y: 30,
      opacity: 0,
      duration: 0.4,
      ease: 'power1.in',
      onComplete: () => {
        // Remove old color, update index
        textEl.classList.remove(phrases[index].color);
        index = (index + 1) % phrases.length;

        // Update text + color
        textEl.textContent = phrases[index].text;
        textEl.classList.add(phrases[index].color);

        // Animate in
        gsap.fromTo(
          textEl,
          { y: -30, opacity: 0 },
          { y: 0, opacity: 1, duration: 0.4, ease: 'power1.out' }
        );
      },
    });
  }, 3000);
});
