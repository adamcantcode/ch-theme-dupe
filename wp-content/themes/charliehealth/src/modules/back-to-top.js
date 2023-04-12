export default function revealBackToTop() {
  gsap.to('.back-to-top', {
    scrollTrigger: {
      trigger: '#mainArticleContent > section:nth-of-type(2)',
      start: 'top top',
      // markers: true,
      toggleActions: 'play complete complete reverse'
    },
    opacity: 1,
    duration: 0.3,
    position: 'sticky',
    autoAlpha: '1',
    display: 'block',
  });
}
