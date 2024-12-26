/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./blocks/region-map/index.css":
/*!*************************************!*\
  !*** ./blocks/region-map/index.css ***!
  \*************************************/
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
/*!************************************!*\
  !*** ./blocks/region-map/index.js ***!
  \************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.css */ "./blocks/region-map/index.css");

window.addEventListener('DOMContentLoaded', () => {
  // simplemaps_usmap.hooks.over_region = function (id) {
  //   const listItem = document.querySelector(`[data-region-id="${id}"]`);
  //   listItem.classList.toggle('active');

  //   listItem.scrollIntoView({
  //     behavior: 'smooth',
  //     block: 'nearest',
  //     inline: 'start',
  //   });
  // };
  // simplemaps_usmap.hooks.out_region = function (id) {
  //   const listItem = document.querySelector(`[data-region-id="${id}"]`);
  //   listItem.classList.toggle('active');
  // };
  // const listItems = document.querySelectorAll(`[data-region-id`);
  // listItems.forEach((item) => {
  //   item.addEventListener('click', () => {
  //     window.location =
  //       simplemaps_usmap.mapdata.regions[
  //         `${item.getAttribute('data-region-id')}`
  //       ].url;
  //   });
  // });

  // Select the element you want to prevent from being created
  const elementSelector = 'a[href="https://simplemaps.com"]';

  // Create a MutationObserver instance with a callback function
  const observer = new MutationObserver(mutationsList => {
    // Use try catch to stop console error
    try {
      // Loop through each mutation that has occurred
      for (const mutation of mutationsList) {
        // Check if the added node matches the element selector
        if (mutation.addedNodes.length > 0 && mutation.addedNodes[0].matches(elementSelector)) {
          // If it does, remove the element from the DOM
          mutation.addedNodes[0].remove();
        }
      }
    } catch (e) {
      return;
    }
  });

  // Start observing changes to the DOM
  observer.observe(document.body, {
    childList: true,
    subtree: true
  });
});
})();

/******/ })()
;
//# sourceMappingURL=index.js.map