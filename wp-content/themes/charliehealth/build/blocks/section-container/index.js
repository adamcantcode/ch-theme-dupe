/******/ (function() { // webpackBootstrap
var __webpack_exports__ = {};
/*!*******************************************!*\
  !*** ./blocks/section-container/index.js ***!
  \*******************************************/
window.addEventListener('DOMContentLoaded', () => {
  const containers = document.querySelectorAll('.acf-innerblocks-container');
  containers.forEach((container, index) => {
    // console.log(container);
    // console.log(index);
    container.classList.add(`animate-container-${index}`);
    console.log(`.animate-container-${index}`);
    gsap.to(`.animate-container-${index}`, {
      scrollTrigger: {
        trigger: `.animate-container-${index}`,
        start: 'bottom 20%',
        markers: true,
        toggleActions: 'play complete reverse reverse'
      },
      yPercent: -5,
      scaleX: 0.9,
      opacity: 0,
      duration: 0.3
    });
  });
});
/******/ })()
;
//# sourceMappingURL=index.js.map