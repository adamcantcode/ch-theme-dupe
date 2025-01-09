/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./blocks/iop-overview/index.css":
/*!***************************************!*\
  !*** ./blocks/iop-overview/index.css ***!
  \***************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry needs to be wrapped in an IIFE because it needs to be isolated against other modules in the chunk.
(() => {
/*!**************************************!*\
  !*** ./blocks/iop-overview/index.js ***!
  \**************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.css */ "./blocks/iop-overview/index.css");

window.addEventListener('DOMContentLoaded', () => {
  const accordionItems = document.querySelectorAll('.accordion-item-iop');
  let openAccordionItem = null;
  function closeAccordion() {
    if (openAccordionItem) {
      openAccordionItem.classList.remove('active');
      const accordionContent = openAccordionItem.nextElementSibling;
      accordionContent.style.maxHeight = null;
      openAccordionItem = null;
    }
  }
  function toggleAccordion() {
    if (this === openAccordionItem) {
      closeAccordion();
    } else {
      closeAccordion();
      this.classList.add('active');
      const accordionContent = this.nextElementSibling;
      accordionContent.style.maxHeight = accordionContent.scrollHeight + 'px';
      openAccordionItem = this;
    }
  }
  accordionItems.forEach(item => {
    const accordionHeader = item.querySelector('.accordion-header-iop');
    accordionHeader.addEventListener('click', toggleAccordion);
  });
  const triggerAccordion = () => {
    if (window.innerWidth > 1024) {
      document.querySelector('.accordion-header-iop').click();
    }
  };
  window.addEventListener('resize', function () {
    if (!openAccordionItem) {
      triggerAccordion();
    } else {
      closeAccordion();
    }
  });
  triggerAccordion();
});
})();

/******/ })()
;
//# sourceMappingURL=index.js.map