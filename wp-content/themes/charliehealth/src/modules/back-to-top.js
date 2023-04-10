export default function revealBackToTop() {
  gsap.to('.back-to-top', {
    scrollTrigger: {
      trigger: '#mainArticleContent > section:nth-of-type(2)',
      start: 'top top',
      // markers: true,
      toggleActions: 'play pause reset reset'
    },
    opacity: 100,
    duration: 50,
  });
}
