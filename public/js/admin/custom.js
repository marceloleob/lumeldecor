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

eval("$(document).ready(function () {\n  /**\n   * Posta o token do form toda fez que for ativado um post por ajax\n   */\n  $.ajaxPrefilter(function (options, originalOptions, jqXHR) {\n    return jqXHR.setRequestHeader('X-CSRF-Token', $(\"meta[name='csrf-token']\").attr('content'));\n  });\n  /**\n   * Desloga do sistema\n   */\n\n  $('.logout').click(function (e) {\n    e.preventDefault();\n    document.getElementById('form-logout').submit();\n  });\n  /**\n   * Habilita a opcao de tooltips\n   */\n\n  $('[data-toggle=\"tooltip\"]').tooltip();\n  /**\n   * To style all selects\n   */\n\n  $('select').selectpicker({\n    size: 7\n  });\n  /**\n   * Mostra a mensagem de retorno por 4 segundos\n   */\n\n  $('.feedback').animate({\n    opacity: 1\n  }, 5000).fadeOut('slow');\n  /**\n   * Fecha a mensagem caso seja clicada\n   */\n\n  $('.feedback .close').click(function (e) {\n    e.preventDefault();\n    $(this).parent().parent().fadeOut('slow');\n    return false;\n  });\n  /**\n   * Tratamento dos blocos no cadastro de produtos\n   */\n\n  $('.check-card').click(function (e) {\n    // recupera o elemento clicado\n    var element = $(this).data('card'); // verifica se checou ou nao\n\n    if ($(this).is(':checked')) {\n      // adiciona background\n      $('.' + element).addClass('check-card');\n    } else {\n      // remove background\n      $('.' + element).removeClass('check-card');\n    }\n  });\n  /**\n   * forEach implementation for Objects/NodeLists/Arrays, automatic type loops and context options\n   *\n   * @private\n   * @author Todd Motto\n   * @link https://github.com/toddmotto/foreach\n   * @param {Array|Object|NodeList} collection - Collection of items to iterate, could be an Array, Object or NodeList\n   * @callback requestCallback      callback   - Callback function for each iteration.\n   * @param {Array|Object|NodeList} scope=null - Object/NodeList/Array that forEach is iterating over, to use as the this value when executing callback.\n   * @returns {}\n   */\n\n  var forEach = function forEach(t, o, r) {\n    if (\"[object Object]\" === Object.prototype.toString.call(t)) for (var c in t) {\n      Object.prototype.hasOwnProperty.call(t, c) && o.call(r, t[c], c, t);\n    } else for (var e = 0, l = t.length; l > e; e++) {\n      o.call(r, t[e], e, t);\n    }\n  };\n\n  var hamburgers = document.querySelectorAll(\".hamburger\");\n\n  if (hamburgers.length > 0) {\n    forEach(hamburgers, function (hamburger) {\n      hamburger.addEventListener(\"click\", function () {\n        this.classList.toggle(\"is-active\");\n      }, false);\n    });\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYWRtaW4vY3VzdG9tLmpzPzg0YWYiXSwibmFtZXMiOlsiJCIsImRvY3VtZW50IiwicmVhZHkiLCJhamF4UHJlZmlsdGVyIiwib3B0aW9ucyIsIm9yaWdpbmFsT3B0aW9ucyIsImpxWEhSIiwic2V0UmVxdWVzdEhlYWRlciIsImF0dHIiLCJjbGljayIsImUiLCJwcmV2ZW50RGVmYXVsdCIsImdldEVsZW1lbnRCeUlkIiwic3VibWl0IiwidG9vbHRpcCIsInNlbGVjdHBpY2tlciIsInNpemUiLCJhbmltYXRlIiwib3BhY2l0eSIsImZhZGVPdXQiLCJwYXJlbnQiLCJlbGVtZW50IiwiZGF0YSIsImlzIiwiYWRkQ2xhc3MiLCJyZW1vdmVDbGFzcyIsImZvckVhY2giLCJ0IiwibyIsInIiLCJPYmplY3QiLCJwcm90b3R5cGUiLCJ0b1N0cmluZyIsImNhbGwiLCJjIiwiaGFzT3duUHJvcGVydHkiLCJsIiwibGVuZ3RoIiwiaGFtYnVyZ2VycyIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJoYW1idXJnZXIiLCJhZGRFdmVudExpc3RlbmVyIiwiY2xhc3NMaXN0IiwidG9nZ2xlIl0sIm1hcHBpbmdzIjoiQUFBQUEsQ0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUMsS0FBWixDQUFrQixZQUNsQjtBQUNJOzs7QUFHQUYsR0FBQyxDQUFDRyxhQUFGLENBQWdCLFVBQVVDLE9BQVYsRUFBbUJDLGVBQW5CLEVBQW9DQyxLQUFwQyxFQUEyQztBQUN2RCxXQUFPQSxLQUFLLENBQUNDLGdCQUFOLENBQXVCLGNBQXZCLEVBQXVDUCxDQUFDLENBQUMseUJBQUQsQ0FBRCxDQUE2QlEsSUFBN0IsQ0FBa0MsU0FBbEMsQ0FBdkMsQ0FBUDtBQUNOLEdBRkU7QUFJSDs7OztBQUdBUixHQUFDLENBQUMsU0FBRCxDQUFELENBQWFTLEtBQWIsQ0FBbUIsVUFBVUMsQ0FBVixFQUFhO0FBQzVCQSxLQUFDLENBQUNDLGNBQUY7QUFDQVYsWUFBUSxDQUFDVyxj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ZW50IjpbIiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgpXG57XG4gICAgLyoqXG4gICAgICogUG9zdGEgbyB0b2tlbiBkbyBmb3JtIHRvZGEgZmV6IHF1ZSBmb3IgYXRpdmFkbyB1bSBwb3N0IHBvciBhamF4XG4gICAgICovXG4gICAgJC5hamF4UHJlZmlsdGVyKGZ1bmN0aW9uIChvcHRpb25zLCBvcmlnaW5hbE9wdGlvbnMsIGpxWEhSKSB7XG4gICAgICAgIHJldHVybiBqcVhIUi5zZXRSZXF1ZXN0SGVhZGVyKCdYLUNTUkYtVG9rZW4nLCAkKFwibWV0YVtuYW1lPSdjc3JmLXRva2VuJ11cIikuYXR0cignY29udGVudCcpKTtcblx0fSk7XG5cblx0LyoqXG5cdCAqIERlc2xvZ2EgZG8gc2lzdGVtYVxuXHQgKi9cblx0JCgnLmxvZ291dCcpLmNsaWNrKGZ1bmN0aW9uIChlKSB7XG5cdCAgICBlLnByZXZlbnREZWZhdWx0KCk7XG5cdCAgICBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZm9ybS1sb2dvdXQnKS5zdWJtaXQoKTtcbiAgICB9KTtcblxuICAgIC8qKlxuICAgICAqIEhhYmlsaXRhIGEgb3BjYW8gZGUgdG9vbHRpcHNcbiAgICAgKi9cbiAgICAkKCdbZGF0YS10b2dnbGU9XCJ0b29sdGlwXCJdJykudG9vbHRpcCgpO1xuXG4gICAgLyoqXG4gICAgICogVG8gc3R5bGUgYWxsIHNlbGVjdHNcbiAgICAgKi9cbiAgICAkKCdzZWxlY3QnKS5zZWxlY3RwaWNrZXIoe1xuXHRcdHNpemU6IDdcblx0fSk7XG5cbiAgICAvKipcbiAgICAgKiBNb3N0cmEgYSBtZW5zYWdlbSBkZSByZXRvcm5vIHBvciA0IHNlZ3VuZG9zXG4gICAgICovXG4gICAgJCgnLmZlZWRiYWNrJykuYW5pbWF0ZSh7XG4gICAgICAgIG9wYWNpdHk6IDFcbiAgICB9LCA1MDAwKS5mYWRlT3V0KCdzbG93Jyk7XG5cbiAgICAvKipcbiAgICAgKiBGZWNoYSBhIG1lbnNhZ2VtIGNhc28gc2VqYSBjbGljYWRhXG4gICAgICovXG4gICAgJCgnLmZlZWRiYWNrIC5jbG9zZScpLmNsaWNrKGZ1bmN0aW9uIChlKSB7XG4gICAgICAgIGUucHJldmVudERlZmF1bHQoKTtcbiAgICAgICAgJCh0aGlzKS5wYXJlbnQoKS5wYXJlbnQoKS5mYWRlT3V0KCdzbG93Jyk7XG4gICAgICAgIHJldHVybiBmYWxzZTtcblx0fSk7XG5cblx0LyoqXG5cdCAqIFRyYXRhbWVudG8gZG9zIGJsb2NvcyBubyBjYWRhc3RybyBkZSBwcm9kdXRvc1xuXHQgKi9cblx0JCgnLmNoZWNrLWNhcmQnKS5jbGljayhmdW5jdGlvbiAoZSkge1xuXHRcdC8vIHJlY3VwZXJhIG8gZWxlbWVudG8gY2xpY2Fkb1xuXHRcdGxldCBlbGVtZW50ID0gJCh0aGlzKS5kYXRhKCdjYXJkJyk7XG5cdFx0Ly8gdmVyaWZpY2Egc2UgY2hlY291IG91IG5hb1xuXHRcdGlmICgkKHRoaXMpLmlzKCc6Y2hlY2tlZCcpKSB7XG5cdFx0XHQvLyBhZGljaW9uYSBiYWNrZ3JvdW5kXG5cdFx0XHQkKCcuJyArIGVsZW1lbnQpLmFkZENsYXNzKCdjaGVjay1jYXJkJyk7XG5cdFx0fSBlbHNlIHtcblx0XHRcdC8vIHJlbW92ZSBiYWNrZ3JvdW5kXG5cdFx0XHQkKCcuJyArIGVsZW1lbnQpLnJlbW92ZUNsYXNzKCdjaGVjay1jYXJkJyk7XG5cdFx0fVxuXHR9KVxuXG4gICAgLyoqXG4gICAgICogZm9yRWFjaCBpbXBsZW1lbnRhdGlvbiBmb3IgT2JqZWN0cy9Ob2RlTGlzdHMvQXJyYXlzLCBhdXRvbWF0aWMgdHlwZSBsb29wcyBhbmQgY29udGV4dCBvcHRpb25zXG4gICAgICpcbiAgICAgKiBAcHJpdmF0ZVxuICAgICAqIEBhdXRob3IgVG9kZCBNb3R0b1xuICAgICAqIEBsaW5rIGh0dHBzOi8vZ2l0aHViLmNvbS90b2RkbW90dG8vZm9yZWFjaFxuICAgICAqIEBwYXJhbSB7QXJyYXl8T2JqZWN0fE5vZGVMaXN0fSBjb2xsZWN0aW9uIC0gQ29sbGVjdGlvbiBvZiBpdGVtcyB0byBpdGVyYXRlLCBjb3VsZCBiZSBhbiBBcnJheSwgT2JqZWN0IG9yIE5vZGVMaXN0XG4gICAgICogQGNhbGxiYWNrIHJlcXVlc3RDYWxsYmFjayAgICAgIGNhbGxiYWNrICAgLSBDYWxsYmFjayBmdW5jdGlvbiBmb3IgZWFjaCBpdGVyYXRpb24uXG4gICAgICogQHBhcmFtIHtBcnJheXxPYmplY3R8Tm9kZUxpc3R9IHNjb3BlPW51bGwgLSBPYmplY3QvTm9kZUxpc3QvQXJyYXkgdGhhdCBmb3JFYWNoIGlzIGl0ZXJhdGluZyBvdmVyLCB0byB1c2UgYXMgdGhlIHRoaXMgdmFsdWUgd2hlbiBleGVjdXRpbmcgY2FsbGJhY2suXG4gICAgICogQHJldHVybnMge31cbiAgICAgKi9cbiAgICB2YXIgZm9yRWFjaCA9IGZ1bmN0aW9uICh0LCBvLCByKSB7XG4gICAgICAgIGlmIChcIltvYmplY3QgT2JqZWN0XVwiID09PSBPYmplY3QucHJvdG90eXBlLnRvU3RyaW5nLmNhbGwodCkpXG4gICAgICAgICAgICBmb3IgKHZhciBjIGluIHQpIE9iamVjdC5wcm90b3R5cGUuaGFzT3duUHJvcGVydHkuY2FsbCh0LCBjKSAmJiBvLmNhbGwociwgdFtjXSwgYywgdCk7XG4gICAgICAgIGVsc2VcbiAgICAgICAgICAgIGZvciAodmFyIGUgPSAwLCBsID0gdC5sZW5ndGg7IGwgPiBlOyBlKyspIG8uY2FsbChyLCB0W2VdLCBlLCB0KVxuICAgIH07XG4gICAgdmFyIGhhbWJ1cmdlcnMgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKFwiLmhhbWJ1cmdlclwiKTtcbiAgICBpZiAoaGFtYnVyZ2Vycy5sZW5ndGggPiAwKSB7XG4gICAgICAgIGZvckVhY2goaGFtYnVyZ2VycywgZnVuY3Rpb24gKGhhbWJ1cmdlcikge1xuICAgICAgICAgICAgaGFtYnVyZ2VyLmFkZEV2ZW50TGlzdGVuZXIoXCJjbGlja1wiLCBmdW5jdGlvbiAoKSB7XG4gICAgICAgICAgICAgICAgdGhpcy5jbGFzc0xpc3QudG9nZ2xlKFwiaXMtYWN0aXZlXCIpO1xuICAgICAgICAgICAgfSwgZmFsc2UpO1xuICAgICAgICB9KTtcbiAgICB9XG59KTtcbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/admin/custom.js\n");

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