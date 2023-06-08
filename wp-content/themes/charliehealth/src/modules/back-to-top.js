import { gsap } from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';

gsap.registerPlugin(ScrollTrigger);

export default function revealBackToTop() {
  let breakpoints = gsap.matchMedia();

  const backToTop = document.querySelector('.back-to-top');

  if (!document.querySelector('body').classList.contains('single-post')) {
    var sectionTrigger = '#mainArticleContent > section:nth-of-type(2)';
    var endSectionTrigger = '#mainArticleContent > section:last-of-type';
  } else {
    var sectionTrigger = '#articleContent';
    var endSectionTrigger = '#articleContent > div';
  }

  if (backToTop) {
    breakpoints.add('(min-width: 1024px)', () => {
      gsap.to('.back-to-top', {
        scrollTrigger: {
          trigger: sectionTrigger,
          start: 'top top',
          endTrigger: endSectionTrigger,
          end: 'bottom 20%',
          // markers: true,
          toggleActions: 'play reverse complete reverse',
        },
        opacity: 1,
        duration: 0.3,
        y: 0,
        position: 'fixed',
        autoAlpha: '1',
        display: 'block',
      });
    });
  }
}
