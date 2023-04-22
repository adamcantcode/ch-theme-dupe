import { gsap } from "gsap";
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export default function revealBackToTop() {
  let breakpoints = gsap.matchMedia();

  const backToTop = document.querySelector('.back-to-top');

  if (backToTop) {
    breakpoints.add('(min-width: 1024px)', () => {
      gsap.to('.back-to-top', {
        scrollTrigger: {
          trigger: '#mainArticleContent > section:nth-of-type(2)',
          start: 'top top',
          // markers: true,
          toggleActions: 'play complete complete reverse',
        },
        opacity: 1,
        duration: 0.15,
        position: 'sticky',
        autoAlpha: '1',
        display: 'block',
      });
    });
  }
}
