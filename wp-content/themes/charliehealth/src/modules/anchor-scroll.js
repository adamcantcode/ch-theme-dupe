import { gsap } from 'gsap';
import { ScrollToPlugin } from 'gsap/ScrollToPlugin';

gsap.registerPlugin(ScrollToPlugin);

export default function anchorScroll() {
  // Scroll to anchor links with GSAP ScrollToPlugin
  if (document.querySelector('body').classList.contains('single-post')) {
    var scrollOffset = document.querySelector('header').offsetHeight + 24;
  } else {
    var scrollOffset = document.querySelector('header').offsetHeight;
  }

  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      gsap.to(window, {
        scrollTo: {
          y: this.getAttribute('href'),
          offsetY: (self) => scrollOffset,
        },
        duration: 1,
        ease: 'Power2.easeInOut',
      });
    });
  });
}
