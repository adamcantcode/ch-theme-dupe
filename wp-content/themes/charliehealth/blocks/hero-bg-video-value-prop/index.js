import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

window.addEventListener('DOMContentLoaded', () => {
  const phrases = [
    { text: 'behavioral health treatment', color: 'text-lavender-300' },
    { text: 'mental health treatment', color: 'text-yellow-300' },
    { text: 'substance use disorder treatment', color: 'text-pale-blue-300' },
    { text: 'medication-assisted therapy', color: 'text-lavender-300' },
    { text: 'cognitive behavioral therapy', color: 'text-yellow-300' },
  ];

  const textEl = document.querySelector('.value-props-js');
  let index = 0;

  // Hardcoded initial phrase (this avoids blank space on load)
  textEl.textContent = phrases[index].text;
  textEl.classList.add(phrases[index].color);

  setInterval(() => {
    // Animate out
    gsap.to(textEl, {
      scale: 1,
      opacity: 0,
      duration: 0.4,
      ease: 'power4.in',
      onComplete: () => {
        textEl.classList.remove(phrases[index].color);
        index = (index + 1) % phrases.length;
        textEl.textContent = phrases[index].text;
        textEl.classList.add(phrases[index].color);

        gsap.fromTo(
          textEl,
          { scale: 0.9, opacity: 0 },
          { scale: 1, opacity: 1, duration: 0.4, ease: 'power4.out' }
        );
      },
    });
  }, 3000);
});
