/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./blocks/tabs/index.css":
/*!*******************************!*\
  !*** ./blocks/tabs/index.css ***!
  \*******************************/
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
/*!******************************!*\
  !*** ./blocks/tabs/index.js ***!
  \******************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.css */ "./blocks/tabs/index.css");

window.addEventListener('DOMContentLoaded', () => {
  const tabs = document.querySelectorAll('.tabs');
  const tabContents = document.querySelectorAll('.tab-contents');
  tabs.forEach(tab => {
    tab.addEventListener('click', e => {
      let tabID = e.target.getAttribute('data-tab');
      let tabContent = document.querySelector(`[data-tab-content='${tabID}']`);
      removeActive();
      e.target.classList.add('active');
      tabContent.classList.add('active');
      setTimeout(() => {
        tabContent.style.opacity = 1;
      }, 10);
    });
  });
  const removeActive = () => {
    tabs.forEach(tab => {
      tab.classList.remove('active');
    });
    tabContents.forEach(contents => {
      contents.classList.remove('active');
      contents.style.opacity = 0;
    });
  };
});
}();
/******/ })()
;
//# sourceMappingURL=index.js.map