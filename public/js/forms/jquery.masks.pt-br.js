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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/forms/jquery.masks.pt-br.js":
/*!**************************************************!*\
  !*** ./resources/js/forms/jquery.masks.pt-br.js ***!
  \**************************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("$(document).ready(function () {\n  // binda o campo decimal\n  $(document).on('focus', '.decimal', function (e) {\n    // adiciona mascara\n    $('.decimal').maskMoney({\n      allowNegative: false,\n      thousands: '.',\n      decimal: ',',\n      affixesStay: true\n    });\n  }); // binda o campo decimal\n\n  $(document).on('focus', '.weight', function (e) {\n    // adiciona mascara\n    $('.weight').maskMoney({\n      allowNegative: false,\n      thousands: '.',\n      decimal: ',',\n      precision: 3,\n      affixesStay: true\n    });\n  }); // binda o campo de moeda\n\n  $(document).on('focus', '.money', function (e) {\n    // adiciona mascara\n    $('.money').maskMoney({\n      prefix: 'R$ ',\n      allowNegative: false,\n      thousands: '.',\n      decimal: ',',\n      affixesStay: true\n    });\n  }); // binda o campo de data\n\n  $(document).on('focus', '.date', function (e) {\n    // adiciona mascara\n    $('.date').mask(\"99/99/9999\");\n  }); // binda o campo de ssn\n\n  $(document).on('focus', '.ssn', function (e) {\n    // adiciona mascara\n    $('.ssn').mask(\"999.999.999-99\");\n  }); // binda o campo de cnpj\n\n  $(document).on('focus', '.cnpj', function (e) {\n    // adiciona mascara\n    $('.cnpj').mask(\"99.999.999/9999-99\");\n  }); // binda o campo de zip\n\n  $(document).on('focus', '.zip', function (e) {\n    // adiciona mascara\n    $('.zip').mask(\"99999\");\n  }); // binda o campo de phone\n\n  $(document).on('focus', '.phone', function (e) {\n    // adiciona mascara\n    $('.phone').mask(\"(99) 99999999?9\").focusin(function (event) {\n      $(this).unmask();\n      $(this).mask(\"(99) 99999999?9\");\n    }).focusout(function (event) {\n      var phone, element;\n      element = $(this);\n      phone = element.val().replace(/\\D/g, '');\n      element.unmask();\n\n      if (phone.length > 10) {\n        element.mask(\"(99) 99999-999?9\");\n      } else {\n        element.mask(\"(99) 9999-9999?9\");\n      }\n    });\n  });\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvZm9ybXMvanF1ZXJ5Lm1hc2tzLnB0LWJyLmpzPzAzMjMiXSwibmFtZXMiOlsiJCIsImRvY3VtZW50IiwicmVhZHkiLCJvbiIsImUiLCJtYXNrTW9uZXkiLCJhbGxvd05lZ2F0aXZlIiwidGhvdXNhbmRzIiwiZGVjaW1hbCIsImFmZml4ZXNTdGF5IiwicHJlY2lzaW9uIiwicHJlZml4IiwibWFzayIsImZvY3VzaW4iLCJldmVudCIsInVubWFzayIsImZvY3Vzb3V0IiwicGhvbmUiLCJlbGVtZW50IiwidmFsIiwicmVwbGFjZSIsImxlbmd0aCJdLCJtYXBwaW5ncyI6IkFBQUFBLENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFDbEI7QUFDQztBQUNBRixHQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZRSxFQUFaLENBQWUsT0FBZixFQUF3QixVQUF4QixFQUFvQyxVQUFTQyxDQUFULEVBQVk7QUFDL0M7QUFDQUosS0FBQyxDQUFDLFVBQUQsQ0FBRCxDQUFjSyxTQUFkLENBQ0E7QUFDVUMsbUJBQWEsRUFBRSxLQUR6QjtBQUVVQyxlQUFTLEVBQUUsR0FGckI7QUFHVUMsYUFBTyxFQUFFLEdBSG5CO0FBSVVDLGlCQUFXLEVBQUU7QUFKdkIsS0FEQTtBQU9HLEdBVEosRUFGRCxDQWFDOztBQUNBVCxHQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZRSxFQUFaLENBQWUsT0FBZixFQUF3QixTQUF4QixFQUFtQyxVQUFTQyxDQUFULEVBQVk7QUFDOUM7QUFDQUosS0FBQyxDQUFDLFNBQUQsQ0FBRCxDQUFhSyxTQUFiLENBQ0E7QUFDVUMsbUJBQWEsRUFBRSxLQUR6QjtBQUVVQyxlQUFTLEVBQUUsR0FGckI7QUFHQ0MsYUFBTyxFQUFFLEdBSFY7QUFJQ0UsZUFBUyxFQUFFLENBSlo7QUFLVUQsaUJBQVcsRUFBRTtBQUx2QixLQURBO0FBUUcsR0FWSixFQWRELENBMEJDOztBQUNBVCxHQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZRSxFQUFaLENBQWUsT0FBZixFQUF3QixRQUF4QixFQUFrQyxVQUFTQyxDQUFULEVBQVk7QUFDN0M7QUFDQUosS0FBQyxDQUFDLFFBQUQsQ0FBRCxDQUFZSyxTQUFaLENBQ007QUFDSU0sWUFBTSxFQUFFLEtBRFo7QUFFSUwsbUJBQWEsRUFBRSxLQUZuQjtBQUdJQyxlQUFTLEVBQUUsR0FIZjtBQUlJQyxhQUFPLEVBQUUsR0FKYjtBQUtJQyxpQkFBVyxFQUFFO0FBTGpCLEtBRE47QUFRRyxHQVZKLEVBM0JELENBdUNDOztBQUNBVCxHQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZRSxFQUFaLENBQWUsT0FBZixFQUF3QixPQUF4QixFQUFpQyxVQUFTQyxDQUFULEVBQVk7QUFDNUM7QUFDQUosS0FBQyxDQUFDLE9BQUQsQ0FBRCxDQUFXWSxJQUFYLENBQWdCLFlBQWhCO0FBQ0EsR0FIRCxFQXhDRCxDQTZDQzs7QUFDQVosR0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUUsRUFBWixDQUFlLE9BQWYsRUFBd0IsTUFBeEIsRUFBZ0MsVUFBU0MsQ0FBVCxFQUFZO0FBQzNDO0FBQ0FKLEtBQUMsQ0FBQyxNQUFELENBQUQsQ0FBVVksSUFBVixDQUFlLGdCQUFmO0FBQ0EsR0FIRCxFQTlDRCxDQW1EQzs7QUFDQVosR0FBQyxDQUFDQyxRQUFELENBQUQsQ0FBWUUsRUFBWixDQUFlLE9BQWYsRUFBd0IsT0FBeEIsRUFBaUMsVUFBU0MsQ0FBVCxFQUFZO0FBQzVDO0FBQ0FKLEtBQUMsQ0FBQyxPQUFELENBQUQsQ0FBV1ksSUFBWCxDQUFnQixvQkFBaEI7QUFDQSxHQUhELEVBcERELENBeURJOztBQUNIWixHQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZRSxFQUFaLENBQWUsT0FBZixFQUF3QixNQUF4QixFQUFnQyxVQUFTQyxDQUFULEVBQVk7QUFDM0M7QUFDQUosS0FBQyxDQUFDLE1BQUQsQ0FBRCxDQUFVWSxJQUFWLENBQWUsT0FBZjtBQUNBLEdBSEQsRUExREQsQ0ErREM7O0FBQ0FaLEdBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlFLEVBQVosQ0FBZSxPQUFmLEVBQXdCLFFBQXhCLEVBQWtDLFVBQVNDLENBQVQsRUFBWTtBQUM3QztBQUNBSixLQUFDLENBQUMsUUFBRCxDQUFELENBQ0VZLElBREYsQ0FDTyxpQkFEUCxFQUVFQyxPQUZGLENBRVUsVUFBU0MsS0FBVCxFQUNUO0FBQ0NkLE9BQUMsQ0FBQyxJQUFELENBQUQsQ0FBUWUsTUFBUjtBQUNBZixPQUFDLENBQUMsSUFBRCxDQUFELENBQVFZLElBQVIsQ0FBYSxpQkFBYjtBQUNBLEtBTkYsRUFPRUksUUFQRixDQU9XLFVBQVNGLEtBQVQsRUFDVjtBQUNDLFVBQUlHLEtBQUosRUFBV0MsT0FBWDtBQUNBQSxhQUFPLEdBQUdsQixDQUFDLENBQUMsSUFBRCxDQUFYO0FBQ0FpQixXQUFLLEdBQUdDLE9BQU8sQ0FBQ0MsR0FBUixHQUFjQyxPQUFkLENBQXNCLEtBQXRCLEVBQTZCLEVBQTdCLENBQVI7QUFDQUYsYUFBTyxDQUFDSCxNQUFSOztBQUVBLFVBQUlFLEtBQUssQ0FBQ0ksTUFBTixHQUFlLEVBQW5CLEVBQXVCO0FBQ3RCSCxlQUFPLENBQUNOLElBQVIsQ0FBYSxrQkFBYjtBQUNBLE9BRkQsTUFFTztBQUNOTSxlQUFPLENBQUNOLElBQVIsQ0FBYSxrQkFBYjtBQUNBO0FBQ0QsS0FuQkY7QUFxQkEsR0F2QkQ7QUF3QkEsQ0F6RkQiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvZm9ybXMvanF1ZXJ5Lm1hc2tzLnB0LWJyLmpzLmpzIiwic291cmNlc0NvbnRlbnQiOlsiJChkb2N1bWVudCkucmVhZHkoZnVuY3Rpb24oKVxue1xuXHQvLyBiaW5kYSBvIGNhbXBvIGRlY2ltYWxcblx0JChkb2N1bWVudCkub24oJ2ZvY3VzJywgJy5kZWNpbWFsJywgZnVuY3Rpb24oZSkge1xuXHRcdC8vIGFkaWNpb25hIG1hc2NhcmFcblx0XHQkKCcuZGVjaW1hbCcpLm1hc2tNb25leShcblx0XHR7XG4gICAgICAgICAgICBhbGxvd05lZ2F0aXZlOiBmYWxzZSxcbiAgICAgICAgICAgIHRob3VzYW5kczogJy4nLFxuICAgICAgICAgICAgZGVjaW1hbDogJywnLFxuICAgICAgICAgICAgYWZmaXhlc1N0YXk6IHRydWVcblx0XHR9KTtcbiAgICB9KTtcblxuXHQvLyBiaW5kYSBvIGNhbXBvIGRlY2ltYWxcblx0JChkb2N1bWVudCkub24oJ2ZvY3VzJywgJy53ZWlnaHQnLCBmdW5jdGlvbihlKSB7XG5cdFx0Ly8gYWRpY2lvbmEgbWFzY2FyYVxuXHRcdCQoJy53ZWlnaHQnKS5tYXNrTW9uZXkoXG5cdFx0e1xuICAgICAgICAgICAgYWxsb3dOZWdhdGl2ZTogZmFsc2UsXG4gICAgICAgICAgICB0aG91c2FuZHM6ICcuJyxcblx0XHRcdGRlY2ltYWw6ICcsJyxcblx0XHRcdHByZWNpc2lvbjogMyxcbiAgICAgICAgICAgIGFmZml4ZXNTdGF5OiB0cnVlXG5cdFx0fSk7XG4gICAgfSk7XG5cblx0Ly8gYmluZGEgbyBjYW1wbyBkZSBtb2VkYVxuXHQkKGRvY3VtZW50KS5vbignZm9jdXMnLCAnLm1vbmV5JywgZnVuY3Rpb24oZSkge1xuXHRcdC8vIGFkaWNpb25hIG1hc2NhcmFcblx0XHQkKCcubW9uZXknKS5tYXNrTW9uZXkoXG4gICAgICAgIHtcbiAgICAgICAgICAgIHByZWZpeDogJ1IkICcsXG4gICAgICAgICAgICBhbGxvd05lZ2F0aXZlOiBmYWxzZSxcbiAgICAgICAgICAgIHRob3VzYW5kczogJy4nLFxuICAgICAgICAgICAgZGVjaW1hbDogJywnLFxuICAgICAgICAgICAgYWZmaXhlc1N0YXk6IHRydWVcbiAgICAgICAgfSk7XG4gICAgfSk7XG5cblx0Ly8gYmluZGEgbyBjYW1wbyBkZSBkYXRhXG5cdCQoZG9jdW1lbnQpLm9uKCdmb2N1cycsICcuZGF0ZScsIGZ1bmN0aW9uKGUpIHtcblx0XHQvLyBhZGljaW9uYSBtYXNjYXJhXG5cdFx0JCgnLmRhdGUnKS5tYXNrKFwiOTkvOTkvOTk5OVwiKTtcblx0fSk7XG5cblx0Ly8gYmluZGEgbyBjYW1wbyBkZSBzc25cblx0JChkb2N1bWVudCkub24oJ2ZvY3VzJywgJy5zc24nLCBmdW5jdGlvbihlKSB7XG5cdFx0Ly8gYWRpY2lvbmEgbWFzY2FyYVxuXHRcdCQoJy5zc24nKS5tYXNrKFwiOTk5Ljk5OS45OTktOTlcIik7XG5cdH0pO1xuXG5cdC8vIGJpbmRhIG8gY2FtcG8gZGUgY25walxuXHQkKGRvY3VtZW50KS5vbignZm9jdXMnLCAnLmNucGonLCBmdW5jdGlvbihlKSB7XG5cdFx0Ly8gYWRpY2lvbmEgbWFzY2FyYVxuXHRcdCQoJy5jbnBqJykubWFzayhcIjk5Ljk5OS45OTkvOTk5OS05OVwiKTtcblx0fSk7XG5cbiAgICAvLyBiaW5kYSBvIGNhbXBvIGRlIHppcFxuXHQkKGRvY3VtZW50KS5vbignZm9jdXMnLCAnLnppcCcsIGZ1bmN0aW9uKGUpIHtcblx0XHQvLyBhZGljaW9uYSBtYXNjYXJhXG5cdFx0JCgnLnppcCcpLm1hc2soXCI5OTk5OVwiKTtcblx0fSk7XG5cblx0Ly8gYmluZGEgbyBjYW1wbyBkZSBwaG9uZVxuXHQkKGRvY3VtZW50KS5vbignZm9jdXMnLCAnLnBob25lJywgZnVuY3Rpb24oZSkge1xuXHRcdC8vIGFkaWNpb25hIG1hc2NhcmFcblx0XHQkKCcucGhvbmUnKVxuXHRcdFx0Lm1hc2soXCIoOTkpIDk5OTk5OTk5PzlcIilcblx0XHRcdC5mb2N1c2luKGZ1bmN0aW9uKGV2ZW50KVxuXHRcdFx0e1xuXHRcdFx0XHQkKHRoaXMpLnVubWFzaygpO1xuXHRcdFx0XHQkKHRoaXMpLm1hc2soXCIoOTkpIDk5OTk5OTk5PzlcIik7XG5cdFx0XHR9KVxuXHRcdFx0LmZvY3Vzb3V0KGZ1bmN0aW9uKGV2ZW50KVxuXHRcdFx0e1xuXHRcdFx0XHR2YXIgcGhvbmUsIGVsZW1lbnQ7XG5cdFx0XHRcdGVsZW1lbnQgPSAkKHRoaXMpO1xuXHRcdFx0XHRwaG9uZSA9IGVsZW1lbnQudmFsKCkucmVwbGFjZSgvXFxEL2csICcnKTtcblx0XHRcdFx0ZWxlbWVudC51bm1hc2soKTtcblxuXHRcdFx0XHRpZiAocGhvbmUubGVuZ3RoID4gMTApIHtcblx0XHRcdFx0XHRlbGVtZW50Lm1hc2soXCIoOTkpIDk5OTk5LTk5OT85XCIpO1xuXHRcdFx0XHR9IGVsc2Uge1xuXHRcdFx0XHRcdGVsZW1lbnQubWFzayhcIig5OSkgOTk5OS05OTk5PzlcIik7XG5cdFx0XHRcdH1cblx0XHRcdH1cblx0XHQpO1xuXHR9KTtcbn0pO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/forms/jquery.masks.pt-br.js\n");

/***/ }),

/***/ 4:
/*!********************************************************!*\
  !*** multi ./resources/js/forms/jquery.masks.pt-br.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/lumeldecor/resources/js/forms/jquery.masks.pt-br.js */"./resources/js/forms/jquery.masks.pt-br.js");


/***/ })

/******/ });