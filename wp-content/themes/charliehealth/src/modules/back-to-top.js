export default function revealBackToTop() {
  let breakpoints = gsap.matchMedia();

  const backToTop = document.querySelector('.back-to-top');

  if (backToTop) {
    breakpoints.add('(min-width: 1024px)', () => {
      gsap.to('.back-to-top', {
        scrollTrigger: {
          trigger: '#mainArticleContent > section:nth-of-type(2)',
          start: 'top top',
          endTrigger: '#mainArticleContent > section:last-of-type',
          end: 'bottom 20%',
          // markers: true,
          toggleActions: 'play reverse complete reverse',
        },
        opacity: 1,
        duration: 0.15,
        position: 'fixed',
        autoAlpha: '1',
        display: 'block',
      });
    });
  }
}
