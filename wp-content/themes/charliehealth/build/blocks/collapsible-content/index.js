/******/ (() => { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./blocks/collapsible-content/index.css":
/*!**********************************************!*\
  !*** ./blocks/collapsible-content/index.css ***!
  \**********************************************/
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
/*!*********************************************!*\
  !*** ./blocks/collapsible-content/index.js ***!
  \*********************************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _index_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./index.css */ "./blocks/collapsible-content/index.css");

window.addEventListener('DOMContentLoaded', () => {
  // Get each set of cards
  const contentWrappper = document.querySelectorAll('.collapsible-content-wrapper');

  // Check window size
  const handleResize = contentWrappperInstance => {
    toggleDropdown(contentWrappperInstance);
  };

  // Dropdown animation
  const toggleDropdown = contentWrappperInstance => {
    const toggleButton = contentWrappperInstance.querySelector('.toggle-button');
    contentWrappperInstance.style.paddingBottom = toggleButton.clientHeight + 16 + 'px';
    toggleButton.addEventListener('click', e => {
      e.preventDefault();
      if (contentWrappperInstance.style.maxHeight) {
        contentWrappperInstance.style.maxHeight = null;
        toggleButton.textContent = 'Show more';
        toggleButton.classList.remove('button-primary-ch');
        toggleButton.classList.add('button-secondary-ch');
      } else {
        contentWrappperInstance.style.maxHeight = contentWrappperInstance.scrollHeight + 'px';
        toggleButton.textContent = 'Show less';
        toggleButton.classList.add('button-primary-ch');
        toggleButton.classList.remove('button-secondary-ch');
      }
    });
  };

  // Remove padding just in case
  const removePadding = contentWrappperInstance => {
    if (contentWrappperInstance.style) {
      contentWrappperInstance.style.paddingBottom = 'unset';
    }
  };

  // Only run if card wrapper exist ($style === 'feed')
  if (contentWrappper) {
    contentWrappper.forEach(contentWrappperInstance => {
      handleResize(contentWrappperInstance);
    });
  }
});
})();

/******/ })()
;
//# sourceMappingURL=index.js.map