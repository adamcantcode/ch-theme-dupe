/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./blocks/card-grid/index.css":
/*!************************************!*\
  !*** ./blocks/card-grid/index.css ***!
  \************************************/
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
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
(() => {
/*!***********************************!*\
  !*** ./blocks/card-grid/index.js ***!
  \***********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.css */ "./blocks/card-grid/index.css");

window.addEventListener('DOMContentLoaded', () => {
  const cardWrappers = document.querySelectorAll('.card-wrapper');

  // Handles window resize and applies appropriate changes
  const handleResize = cardWrapperInstance => {
    window.innerWidth < 1024 ? toggleDropdown(cardWrapperInstance) : resetStyles(cardWrapperInstance);
  };

  // Adds toggle functionality for dropdowns
  const toggleDropdown = cardWrapperInstance => {
    const toggleButton = cardWrapperInstance.querySelector('.toggle-button');
    if (!toggleButton) return;

    // Set initial padding for dropdown animation
    cardWrapperInstance.style.paddingBottom = `${toggleButton.clientHeight + 16}px`;
    toggleButton.addEventListener('click', e => {
      e.preventDefault();
      const isExpanded = !!cardWrapperInstance.style.maxHeight;
      cardWrapperInstance.style.maxHeight = isExpanded ? null : `${cardWrapperInstance.scrollHeight}px`;

      // Update button styles and text accordingly
      toggleButton.textContent = isExpanded ? 'Show more' : 'Show less';
      toggleButton.classList.toggle('button-primary', !isExpanded);
      toggleButton.classList.toggle('button-secondary', isExpanded);
    });
  };

  // Resets padding and maxHeight when window width is above 1024px
  const resetStyles = cardWrapperInstance => {
    cardWrapperInstance.style.paddingBottom = '';
    cardWrapperInstance.style.maxHeight = '';
  };

  // Initialize functionality for each card wrapper
  if (cardWrappers.length) {
    cardWrappers.forEach(cardWrapperInstance => handleResize(cardWrapperInstance));
  }
  window.addEventListener('resize', () => {
    cardWrappers.forEach(handleResize);
  });
});
})();

/******/ })()
;
//# sourceMappingURL=index.js.map