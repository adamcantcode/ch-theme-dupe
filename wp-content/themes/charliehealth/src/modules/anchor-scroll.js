export default function anchorScroll() {
  // Scroll to anchor links with GSAP ScrollToPlugin
  document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      gsap.to(window, {
        scrollTo: {
          y: this.getAttribute('href'),
          offsetY: self => document.querySelector('header').offsetHeight,
        },
        duration: 1,
        ease: 'Power2.easeInOut',
      });
    });
  });
}
