import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export default function fadeUpIn() {
  const containers = document.querySelectorAll(
    'section .acf-innerblocks-container .fade-up-in'
  );
  containers.forEach((container, index) => {
    container.classList.add(`animate-container-${index}`);
    gsap.from(`.animate-container-${index}`, {
      scrollTrigger: {
        trigger: `.animate-container-${index}`,
        start: 'top 80%',
        toggleActions: 'play reverse play reverse',
      },
      yPercent: 10,
      scaleX: 0.95,
      opacity: 0,
      duration: 1,
      ease: 'power4.out',
    });
  });
  // TODO make sure this is not too taxing
  document.addEventListener('click', () => {
    setTimeout(() => {
      ScrollTrigger.refresh(true);
    }, 500);
  });
  document.addEventListener('resize', () => {
    setTimeout(() => {
      ScrollTrigger.refresh(true);
    }, 500);
  });
}
