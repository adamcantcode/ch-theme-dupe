/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/modules/mobile-nav.js":
/*!***********************************!*\
  !*** ./src/modules/mobile-nav.js ***!
  \***********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ mobileNav; }
/* harmony export */ });
/**
 * Man nav hover actions
 */
function mobileNav() {
  var menu = document.querySelector('.open-close');
  var slideOut = document.querySelector('.slide-out');
  var mainContent = document.querySelector('.site-main');
  var topLevelLinks = document.querySelectorAll('.nav-parent-menu > .nav-link');
  menu.addEventListener('click', () => {
    menu.classList.toggle('active');
    slideOut.classList.toggle('active');
    mainContent.classList.toggle('active');
  });
  topLevelLinks.forEach(link => {
    link.addEventListener('click', e => {
      console.log(link);
      e.preventDefault();
      link.nextElementSibling.classList.toggle('active');
    });
  });

  // Set active state for top level nav link on hover
  // navItem.forEach((item) => {
  //   item.addEventListener('mouseenter', () => {
  //     item.classList.toggle('active');
  //   });
  //   item.addEventListener('mouseleave', () => {
  //     item.classList.toggle('active');
  //   });
  // });
  // // Set active state for top level nav link on hover of sub menu
  // navItemSub.forEach((sub) => {
  //   sub.addEventListener('mouseenter', () => {
  //     sub.previousElementSibling.classList.toggle('active');
  //   });
  //   sub.addEventListener('mouseleave', () => {
  //     sub.previousElementSibling.classList.toggle('active');
  //   });
  // });
}

/***/ }),

/***/ "./src/css/main.css":
/*!**************************!*\
  !*** ./src/css/main.css ***!
  \**************************/
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
/******/ 	/* webpack/runtime/define property getters */
/******/ 	!function() {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = function(exports, definition) {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	}();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	!function() {
/******/ 		__webpack_require__.o = function(obj, prop) { return Object.prototype.hasOwnProperty.call(obj, prop); }
/******/ 	}();
/******/ 	
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
/*!**********************!*\
  !*** ./src/index.js ***!
  \**********************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _css_main_css__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./css/main.css */ "./src/css/main.css");
/* harmony import */ var _modules_mobile_nav__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./modules/mobile-nav */ "./src/modules/mobile-nav.js");


document.addEventListener('DOMContentLoaded', event => {
  (0,_modules_mobile_nav__WEBPACK_IMPORTED_MODULE_1__["default"])();
});
}();
/******/ })()
;
//# sourceMappingURL=index.js.map