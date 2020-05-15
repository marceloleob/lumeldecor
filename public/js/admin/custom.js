/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/custom.js":
/*!**************************************!*\
  !*** ./resources/js/admin/custom.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("$(document).ready(function () {\n  /**\n   * Posta o token do form toda fez que for ativado um post por ajax\n   */\n  $.ajaxPrefilter(function (options, originalOptions, jqXHR) {\n    return jqXHR.setRequestHeader('X-CSRF-Token', $(\"meta[name='csrf-token']\").attr('content'));\n  });\n  /**\n   * Desloga do sistema\n   */\n\n  $('.logout').click(function (e) {\n    e.preventDefault();\n    document.getElementById('form-logout').submit();\n  });\n  /**\n   * Habilita a opcao de tooltips\n   */\n\n  $('[data-toggle=\"tooltip\"]').tooltip();\n  /**\n   * To style all selects\n   */\n\n  $('select').selectpicker({\n    size: 7\n  });\n  /**\n   * Mostra a mensagem de retorno por 4 segundos\n   */\n\n  $('.feedback').animate({\n    opacity: 1\n  }, 5000).fadeOut('slow');\n  /**\n   * Fecha a mensagem caso seja clicada\n   */\n\n  $('.feedback .close').click(function (e) {\n    e.preventDefault();\n    $(this).parent().parent().fadeOut('slow');\n    return false;\n  });\n  /**\n   * Abre e fecha o menu clicando no Hamburger\n   *\n   */\n\n  $(\".close-sidebar-btn\").click(function () {\n    // classe para fechar o menu\n    var toggle = $(this).attr(\"data-class\"); // adiciona ou remove do menu\n\n    $(\".app-container\").toggleClass(toggle);\n  });\n\n  var forEach = function forEach(t, o, r) {\n    if (\"[object Object]\" === Object.prototype.toString.call(t)) for (var c in t) {\n      Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t);\n    } else for (var e = 0, l = t.length; l > e; e++) {\n      o.call(r, t[e], e, t);\n    }\n  }; // recupera todos os Hamburgers\n\n\n  var hamburgers = document.querySelectorAll(\".hamburger\"); // verifica se encontrou\n\n  if (hamburgers.length > 0) {\n    // altera o formato dele\n    forEach(hamburgers, function (hamburger) {\n      hamburger.addEventListener(\"click\", function () {\n        this.classList.toggle(\"is-active\");\n      }, false);\n    });\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYWRtaW4vY3VzdG9tLmpzPzg0YWYiXSwibmFtZXMiOlsiJCIsImRvY3VtZW50IiwicmVhZHkiLCJhamF4UHJlZmlsdGVyIiwib3B0aW9ucyIsIm9yaWdpbmFsT3B0aW9ucyIsImpxWEhSIiwic2V0UmVxdWVzdEhlYWRlciIsImF0dHIiLCJjbGljayIsImUiLCJwcmV2ZW50RGVmYXVsdCIsImdldEVsZW1lbnRCeUlkIiwic3VibWl0IiwidG9vbHRpcCIsInNlbGVjdHBpY2tlciIsInNpemUiLCJhbmltYXRlIiwib3BhY2l0eSIsImZhZGVPdXQiLCJwYXJlbnQiLCJ0b2dnbGUiLCJ0b2dnbGVDbGFzcyIsImZvckVhY2giLCJ0IiwibyIsInIiLCJPYmplY3QiLCJwcm90b3R5cGUiLCJ0b1N0cmluZyIsImNhbGwiLCJjIiwiaGFzT3duUHJvcGVydHkiLCJsIiwibGVuZ3RoIiwiaGFtYnVyZ2VycyIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJoYW1idXJnZXIiLCJhZGRFdmVudExpc3RlbmVyIiwiY2xhc3NMaXN0Il0sIm1hcHBpbmdzIjoiQUFBQUEsQ0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUNsQjtBQUNDOzs7QUFHQUYsR0FBQyxDQUFDRyxhQUFGLENBQWdCLFVBQVVDLE9BQVYsRUFBbUJDLGVBQW5CLEVBQW9DQyxLQUFwQyxFQUEyQztBQUMxRCxXQUFPQSxLQUFLLENBQUNDLGdCQUFOLENBQXVCLGNBQXZCLEVBQXVDUCxDQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QlEsSUFBN0IsQ0FBa0MsU0FBbEMsQ0FBdkMsQ0FBUDtBQUNBLEdBRkQ7QUFJQTs7OztBQUdBUixHQUFDLENBQUMsU0FBRCxDQUFELENBQWFTLEtBQWIsQ0FBbUIsVUFBVUMsQ0FBVixFQUFhO0FBQy9CQSxLQUFDLENBQUNDLGNBQUY7QUFDQVYsWUFBUSxDQUFDVyxjQUFULENBQXdCLGFBQXhCLEVBQXVDQyxNQUF2QztBQUNBLEdBSEQ7QUFLQTs7OztBQUdBYixHQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QmMsT0FBN0I7QUFFQTs7OztBQUdBZCxHQUFDLENBQUMsUUFBRCxDQUFELENBQVllLFlBQVosQ0FBeUI7QUFDeEJDLFFBQUksRUFBRTtBQURrQixHQUF6QjtBQUlBOzs7O0FBR0FoQixHQUFDLENBQUMsV0FBRCxDQUFELENBQWVpQixPQUFmLENBQXVCO0FBQ3RCQyxXQUFPLEVBQUU7QUFEYSxHQUF2QixFQUVHLElBRkgsRUFFU0MsT0FGVCxDQUVpQixNQUZqQjtBQUlBOzs7O0FBR0FuQixHQUFDLENBQUMsa0JBQUQsQ0FBRCxDQUFzQlMsS0FBdEIsQ0FBNEIsVUFBVUMsQ0FBVixFQUFhO0FBQ3hDQSxLQUFDLENBQUNDLGNBQUY7QUFDQVgsS0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRb0IsTUFBUixHQUFpQkEsTUFBakIsR0FBMEJELE9BQTFCLENBQWtDLE1BQWxDO0FBQ0EsV0FBTyxLQUFQO0FBQ0EsR0FKRDtBQU1BOzs7OztBQUlBbkIsR0FBQyxDQUFDLG9CQUFELENBQUQsQ0FBd0JTLEtBQXhCLENBQStCLFlBQVk7QUFDMUM7QUFDQSxRQUFJWSxNQUFNLEdBQUdyQixDQUFDLENBQUMsSUFBRCxDQUFELENBQVFRLElBQVIsQ0FBYSxZQUFiLENBQWIsQ0FGMEMsQ0FHMUM7O0FBQ0FSLEtBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9Cc0IsV0FBcEIsQ0FBZ0NELE1BQWhDO0FBQ0EsR0FMRDs7QUFNQSxNQUFJRSxPQUFPLEdBQUcsU0FBVkEsT0FBVSxDQUFVQyxDQUFWLEVBQWFDLENBQWIsRUFBZ0JDLENBQWhCLEVBQW1CO0FBQ2hDLFFBQUksc0JBQXNCQyxNQUFNLENBQUNDLFNBQVAsQ0FBaUJDLFFBQWpCLENBQTBCQyxJQUExQixDQUErQk4sQ0FBL0IsQ0FBMUIsRUFDQyxLQUFLLElBQUlPLENBQVQsSUFBY1AsQ0FBZDtBQUFpQkcsWUFBTSxDQUFDQyxTQUFQLENBQWlCSSxjQUFqQixDQUFnQ0YsSUFBaEMsQ0FBcUNOLENBQXJDLEVBQXdDTyxDQUF4QyxLQUE4Q04sQ0FBQyxDQUFDSyxJQUFGLENBQU9KLENBQVAsRUFBVUYsQ0FBQyxDQUFDTyxDQUFELENBQVgsRUFBZ0JBLENBQWhCLEVBQW1CUCxDQUFuQixDQUE5QztBQUFqQixLQURELE1BR0MsS0FBSyxJQUFJZCxDQUFDLEdBQUcsQ0FBUixFQUFXdUIsQ0FBQyxHQUFHVCxDQUFDLENBQUNVLE1BQXRCLEVBQThCRCxDQUFDLEdBQUd2QixDQUFsQyxFQUFxQ0EsQ0FBQyxFQUF0QztBQUEwQ2UsT0FBQyxDQUFDSyxJQUFGLENBQU9KLENBQVAsRUFBVUYsQ0FBQyxDQUFDZCxDQUFELENBQVgsRUFBZ0JBLENBQWhCLEVBQW1CYyxDQUFuQjtBQUExQztBQUNELEdBTEQsQ0F0REQsQ0E0REM7OztBQUNBLE1BQUlXLFVBQVUsR0FBR2xDLFFBQVEsQ0FBQ21DLGdCQUFULENBQTBCLFlBQTFCLENBQWpCLENBN0RELENBOERDOztBQUNBLE1BQUlELFVBQVUsQ0FBQ0QsTUFBWCxHQUFvQixDQUF4QixFQUEyQjtBQUMxQjtBQUNBWCxXQUFPLENBQUNZLFVBQUQsRUFBYSxVQUFVRSxTQUFWLEVBQXFCO0FBQ3hDQSxlQUFTLENBQUNDLGdCQUFWLENBQTJCLE9BQTNCLEVBQW9DLFlBQVk7QUFDL0MsYUFBS0MsU0FBTCxDQUFlbEIsTUFBZixDQUFzQixXQUF0QjtBQUNBLE9BRkQsRUFFRyxLQUZIO0FBR0EsS0FKTSxDQUFQO0FBS0E7QUFDRCxDQXhFRCIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9hZG1pbi9jdXN0b20uanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKVxue1xuXHQvKipcblx0ICogUG9zdGEgbyB0b2tlbiBkbyBmb3JtIHRvZGEgZmV6IHF1ZSBmb3IgYXRpdmFkbyB1bSBwb3N0IHBvciBhamF4XG5cdCAqL1xuXHQkLmFqYXhQcmVmaWx0ZXIoZnVuY3Rpb24gKG9wdGlvbnMsIG9yaWdpbmFsT3B0aW9ucywganFYSFIpIHtcblx0XHRyZXR1cm4ganFYSFIuc2V0UmVxdWVzdEhlYWRlcignWC1DU1JGLVRva2VuJywgJChcIm1ldGFbbmFtZT0nY3NyZi10b2tlbiddXCIpLmF0dHIoJ2NvbnRlbnQnKSk7XG5cdH0pO1xuXG5cdC8qKlxuXHQgKiBEZXNsb2dhIGRvIHNpc3RlbWFcblx0ICovXG5cdCQoJy5sb2dvdXQnKS5jbGljayhmdW5jdGlvbiAoZSkge1xuXHRcdGUucHJldmVudERlZmF1bHQoKTtcblx0XHRkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZm9ybS1sb2dvdXQnKS5zdWJtaXQoKTtcblx0fSk7XG5cblx0LyoqXG5cdCAqIEhhYmlsaXRhIGEgb3BjYW8gZGUgdG9vbHRpcHNcblx0ICovXG5cdCQoJ1tkYXRhLXRvZ2dsZT1cInRvb2x0aXBcIl0nKS50b29sdGlwKCk7XG5cblx0LyoqXG5cdCAqIFRvIHN0eWxlIGFsbCBzZWxlY3RzXG5cdCAqL1xuXHQkKCdzZWxlY3QnKS5zZWxlY3RwaWNrZXIoe1xuXHRcdHNpemU6IDdcblx0fSk7XG5cblx0LyoqXG5cdCAqIE1vc3RyYSBhIG1lbnNhZ2VtIGRlIHJldG9ybm8gcG9yIDQgc2VndW5kb3Ncblx0ICovXG5cdCQoJy5mZWVkYmFjaycpLmFuaW1hdGUoe1xuXHRcdG9wYWNpdHk6IDFcblx0fSwgNTAwMCkuZmFkZU91dCgnc2xvdycpO1xuXG5cdC8qKlxuXHQgKiBGZWNoYSBhIG1lbnNhZ2VtIGNhc28gc2VqYSBjbGljYWRhXG5cdCAqL1xuXHQkKCcuZmVlZGJhY2sgLmNsb3NlJykuY2xpY2soZnVuY3Rpb24gKGUpIHtcblx0XHRlLnByZXZlbnREZWZhdWx0KCk7XG5cdFx0JCh0aGlzKS5wYXJlbnQoKS5wYXJlbnQoKS5mYWRlT3V0KCdzbG93Jyk7XG5cdFx0cmV0dXJuIGZhbHNlO1xuXHR9KTtcblxuXHQvKipcblx0ICogQWJyZSBlIGZlY2hhIG8gbWVudSBjbGljYW5kbyBubyBIYW1idXJnZXJcblx0ICpcblx0ICovXG5cdCQoXCIuY2xvc2Utc2lkZWJhci1idG5cIikuY2xpY2soIGZ1bmN0aW9uICgpIHtcblx0XHQvLyBjbGFzc2UgcGFyYSBmZWNoYXIgbyBtZW51XG5cdFx0dmFyIHRvZ2dsZSA9ICQodGhpcykuYXR0cihcImRhdGEtY2xhc3NcIik7XG5cdFx0Ly8gYWRpY2lvbmEgb3UgcmVtb3ZlIGRvIG1lbnVcblx0XHQkKFwiLmFwcC1jb250YWluZXJcIikudG9nZ2xlQ2xhc3ModG9nZ2xlKTtcblx0fSk7XG5cdHZhciBmb3JFYWNoID0gZnVuY3Rpb24gKHQsIG8sIHIpIHtcblx0XHRpZiAoXCJbb2JqZWN0IE9iamVjdF1cIiA9PT0gT2JqZWN0LnByb3RvdHlwZS50b1N0cmluZy5jYWxsKHQpKVxuXHRcdFx0Zm9yICh2YXIgYyBpbiB0KSBPYmplY3QucHJvdG90eXBlLmhhc093blByb3BlcnR5LmNhbGwodCwgYykgJiYgby5jYWxsKHIsIHRbY10sIGMsIHQpO1xuXHRcdGVsc2Vcblx0XHRcdGZvciAodmFyIGUgPSAwLCBsID0gdC5sZW5ndGg7IGwgPiBlOyBlKyspIG8uY2FsbChyLCB0W2VdLCBlLCB0KTtcblx0fTtcblx0Ly8gcmVjdXBlcmEgdG9kb3Mgb3MgSGFtYnVyZ2Vyc1xuXHR2YXIgaGFtYnVyZ2VycyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoXCIuaGFtYnVyZ2VyXCIpO1xuXHQvLyB2ZXJpZmljYSBzZSBlbmNvbnRyb3Vcblx0aWYgKGhhbWJ1cmdlcnMubGVuZ3RoID4gMCkge1xuXHRcdC8vIGFsdGVyYSBvIGZvcm1hdG8gZGVsZVxuXHRcdGZvckVhY2goaGFtYnVyZ2VycywgZnVuY3Rpb24gKGhhbWJ1cmdlcikge1xuXHRcdFx0aGFtYnVyZ2VyLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBmdW5jdGlvbiAoKSB7XG5cdFx0XHRcdHRoaXMuY2xhc3NMaXN0LnRvZ2dsZShcImlzLWFjdGl2ZVwiKTtcblx0XHRcdH0sIGZhbHNlKTtcblx0XHR9KTtcblx0fVxufSk7XG4iXSwic291cmNlUm9vdCI6IiJ9\n//# sourceURL=webpack-internal:///./resources/js/admin/custom.js\n");

/***/ }),

/***/ 2:
/*!********************************************!*\
  !*** multi ./resources/js/admin/custom.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/lumeldecor/resources/js/admin/custom.js */"./resources/js/admin/custom.js");


/***/ })

/******/ });