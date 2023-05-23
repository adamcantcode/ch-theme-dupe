/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./blocks/posts-list copy/index.css":
/*!******************************************!*\
  !*** ./blocks/posts-list copy/index.css ***!
  \******************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

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
/******/ 	!function() {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = function(exports) {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	}();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be isolated against other modules in the chunk.
!function() {
/*!*****************************************!*\
  !*** ./blocks/posts-list copy/index.js ***!
  \*****************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.css */ "./blocks/posts-list copy/index.css");

window.addEventListener('DOMContentLoaded', () => {
  if (window.innerWidth < 1024) {
    console.log(window.innerWidth);
    toggleDropdown();
  }
  function toggleDropdown() {
    const toggleButton = document.querySelector('.toggle-button');
    const cardWrapper = document.querySelector('.card-wrapper');
    cardWrapper.style.paddingBottom = toggleButton.clientHeight + 16 + 'px';
    toggleButton.addEventListener('click', () => {
      if (cardWrapper.style.maxHeight) {
        cardWrapper.style.maxHeight = null;
        toggleButton.textContent = 'Show more';
        console.log(toggleButton.textContent);
        toggleButton.classList.remove('button-primary');
        toggleButton.classList.add('button-secondary');
      } else {
        cardWrapper.style.maxHeight = cardWrapper.scrollHeight + 'px';
        toggleButton.textContent = 'Show less';
        toggleButton.classList.add('button-primary');
        toggleButton.classList.remove('button-secondary');
      }
    });
  }
  window.addEventListener('resize', toggleDropdown);
});
}();
/******/ })()
;
//# sourceMappingURL=index.js.map