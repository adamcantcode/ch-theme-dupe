/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./blocks/aoc-list/index.css":
/*!***********************************!*\
  !*** ./blocks/aoc-list/index.css ***!
  \***********************************/
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
/*!**********************************!*\
  !*** ./blocks/aoc-list/index.js ***!
  \**********************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.css */ "./blocks/aoc-list/index.css");

window.addEventListener('DOMContentLoaded', () => {
  const viewAllButton = document.querySelector('.view-all-button-js');
  const aocContent = document.querySelector('.view-all-js');
  let revealedContent = null;
  const setMaxHeight = () => {
    if (!revealedContent) {
      const listItems = aocContent.querySelectorAll('.list-item-height-js');
      const first5ListItems = Array.from(listItems).slice(0, 5);
      const combinedHeight = first5ListItems.reduce((totalHeight, listItem) => {
        return totalHeight + listItem.offsetHeight + 24;
      }, 0);
      aocContent.style.maxHeight = combinedHeight + 'px';
    }
  };
  function closeAccordion() {
    if (revealedContent) {
      aocContent.style.maxHeight = setMaxHeight();
      revealedContent = null;
      viewAllButton.innerText = 'View All';
    }
  }
  function toggleAccordion() {
    if (this === revealedContent) {
      closeAccordion();
    } else {
      closeAccordion();
      aocContent.style.maxHeight = aocContent.scrollHeight + 'px';
      revealedContent = this;
      viewAllButton.remove();
    }
  }
  viewAllButton.addEventListener('click', toggleAccordion);
  setMaxHeight();
  window.addEventListener('resize', () => {
    setMaxHeight();
  });
});
})();

/******/ })()
;
//# sourceMappingURL=index.js.map