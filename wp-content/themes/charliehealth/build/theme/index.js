/******/ (function() { // webpackBootstrap
/******/ 	"use strict";
/******/ 	var __webpack_modules__ = ({

/***/ "./src/modules/anchor-scroll.js":
/*!**************************************!*\
  !*** ./src/modules/anchor-scroll.js ***!
  \**************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ anchorScroll; }
/* harmony export */ });
function anchorScroll() {
  jQuery(document).ready(function () {
    // Add smooth scrolling to all links with hash anchors
    jQuery('a[href^="#"]').on('click', function (event) {
      // Make sure this.hash has a value before overriding default behavior
      if (this.hash !== '') {
        // Prevent default anchor click behavior
        event.preventDefault();
        // Store hash
        var hash = this.hash;
        // Using jQuery's animate() method to add smooth page scroll
        jQuery('html, body').animate({
          scrollTop: jQuery(hash).offset().top - 96
        }, 800);
      }
    });
  });
}

/***/ }),

/***/ "./src/modules/animations.js":
/*!***********************************!*\
  !*** ./src/modules/animations.js ***!
  \***********************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ animations; }
/* harmony export */ });
/**
 * Man nav hover actions
 */
function animations() {
  var topLevelLinks = document.querySelectorAll('.nav-parent-menu');

  // Get all top level links
  topLevelLinks.forEach(link => {
    // Create a new timeline for the sub-links of the current top level link
    const linksTimeLine = gsap.timeline();

    // Add an animation to the timeline to animate the opacity and x position of the sub-links
    linksTimeLine.to(link.lastElementChild.querySelectorAll('.nav-link.sub-link'), {
      opacity: 1,
      y: 0,
      stagger: 0.025
    });
    // Add a mouseenter event listener to the current top level link
    link.addEventListener('mouseenter', () => {
      // If the timeline is not already active, play it from the beginning
      if (!linksTimeLine.isActive()) {
        console.log('not active');
        linksTimeLine.play(0);
      } else {
        console.log('active');
      }
    });
  });
}

/***/ }),

/***/ "./src/modules/back-to-top.js":
/*!************************************!*\
  !*** ./src/modules/back-to-top.js ***!
  \************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ revealBackToTop; }
/* harmony export */ });
function revealBackToTop() {
  gsap.to('.back-to-top', {
    scrollTrigger: {
      trigger: '#mainArticleContent > section:nth-of-type(2)',
      start: 'top top',
      // markers: true,
      toggleActions: 'play complete complete reverse'
    },
    opacity: 1,
    duration: 0.3
  });
}

/***/ }),

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
 * Main nav hover actions
 */
function mobileNav() {
  var menu = document.querySelector('.open-close');
  var slideOut = document.querySelector('.slide-out');
  var mainContent = document.querySelector('.site-main');
  var topLevelLinks = document.querySelectorAll('.nav-parent-menu > .nav-link:not(.static)');

  /**
   * On click, toggle active.
   */
  menu.addEventListener('click', () => {
    menu.classList.toggle('active');
    slideOut.classList.toggle('active');
    mainContent.classList.toggle('active');
  });

  /**
   * On click, add active to submenu item.
   */
  topLevelLinks.forEach(link => {
    link.addEventListener('click', () => {
      removeActive(link.nextElementSibling);
      link.nextElementSibling.classList.toggle('active');
    });
  });

  /**
   * Remove active from all submenus except the current.
   * @param {string} activeLink 
   */
  const removeActive = activeLink => {
    topLevelLinks.forEach(link => {
      if (activeLink !== link.nextElementSibling) {
        link.nextElementSibling.classList.remove('active');
      }
    });
  };
}

/***/ }),

/***/ "./src/modules/stop-animations.js":
/*!****************************************!*\
  !*** ./src/modules/stop-animations.js ***!
  \****************************************/
/***/ (function(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": function() { return /* binding */ stopAnimations; }
/* harmony export */ });
/**
 * Fix glitchiness of animations when screen resized from desltop to mobile and vice versa
 */
function stopAnimations() {
  let resizeTimer;
  window.addEventListener('resize', () => {
    document.body.classList.add('resize-animation-stopper');
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
      document.body.classList.remove('resize-animation-stopper');
    }, 400);
  });
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
/* harmony import */ var _modules_stop_animations__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./modules/stop-animations */ "./src/modules/stop-animations.js");
/* harmony import */ var _modules_animations__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./modules/animations */ "./src/modules/animations.js");
/* harmony import */ var _modules_anchor_scroll__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./modules/anchor-scroll */ "./src/modules/anchor-scroll.js");
/* harmony import */ var _modules_back_to_top__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./modules/back-to-top */ "./src/modules/back-to-top.js");






document.addEventListener('DOMContentLoaded', () => {
  (0,_modules_mobile_nav__WEBPACK_IMPORTED_MODULE_1__["default"])();
  (0,_modules_stop_animations__WEBPACK_IMPORTED_MODULE_2__["default"])();
  (0,_modules_animations__WEBPACK_IMPORTED_MODULE_3__["default"])();
  (0,_modules_anchor_scroll__WEBPACK_IMPORTED_MODULE_4__["default"])();
  (0,_modules_back_to_top__WEBPACK_IMPORTED_MODULE_5__["default"])();
});
}();
/******/ })()
;
//# sourceMappingURL=index.js.map