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
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/admin/pages/category.js":
/*!**********************************************!*\
  !*** ./resources/js/admin/pages/category.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("$(document).ready(function () {\n  // Validacao do formulario\n  if ($('#form-category').length) {\n    // validation\n    $('#form-category').validate({\n      rules: {\n        material_id: {\n          required: true\n        },\n        name: {\n          required: true,\n          minlength: 2,\n          maxlength: 100\n        }\n      }\n    });\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYWRtaW4vcGFnZXMvY2F0ZWdvcnkuanM/NjgyOSJdLCJuYW1lcyI6WyIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsImxlbmd0aCIsInZhbGlkYXRlIiwicnVsZXMiLCJtYXRlcmlhbF9pZCIsInJlcXVpcmVkIiwibmFtZSIsIm1pbmxlbmd0aCIsIm1heGxlbmd0aCJdLCJtYXBwaW5ncyI6IkFBQUFBLENBQUMsQ0FBQ0MsUUFBRCxDQUFELENBQVlDLEtBQVosQ0FBa0IsWUFDbEI7QUFDQztBQUNBLE1BQUlGLENBQUMsQ0FBQyxnQkFBRCxDQUFELENBQW9CRyxNQUF4QixFQUFnQztBQUMvQjtBQUNBSCxLQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQkksUUFBcEIsQ0FBNkI7QUFDNUJDLFdBQUssRUFBRTtBQUNOQyxtQkFBVyxFQUFFO0FBQ1pDLGtCQUFRLEVBQUU7QUFERSxTQURQO0FBSU5DLFlBQUksRUFBRTtBQUNMRCxrQkFBUSxFQUFFLElBREw7QUFFTEUsbUJBQVMsRUFBRSxDQUZOO0FBR0xDLG1CQUFTLEVBQUU7QUFITjtBQUpBO0FBRHFCLEtBQTdCO0FBWUE7QUFDRCxDQWxCRCIsImZpbGUiOiIuL3Jlc291cmNlcy9qcy9hZG1pbi9wYWdlcy9jYXRlZ29yeS5qcy5qcyIsInNvdXJjZXNDb250ZW50IjpbIiQoZG9jdW1lbnQpLnJlYWR5KGZ1bmN0aW9uICgpXG57XG5cdC8vIFZhbGlkYWNhbyBkbyBmb3JtdWxhcmlvXG5cdGlmICgkKCcjZm9ybS1jYXRlZ29yeScpLmxlbmd0aCkge1xuXHRcdC8vIHZhbGlkYXRpb25cblx0XHQkKCcjZm9ybS1jYXRlZ29yeScpLnZhbGlkYXRlKHtcblx0XHRcdHJ1bGVzOiB7XG5cdFx0XHRcdG1hdGVyaWFsX2lkOiB7XG5cdFx0XHRcdFx0cmVxdWlyZWQ6IHRydWUsXG5cdFx0XHRcdH0sXG5cdFx0XHRcdG5hbWU6IHtcblx0XHRcdFx0XHRyZXF1aXJlZDogdHJ1ZSxcblx0XHRcdFx0XHRtaW5sZW5ndGg6IDIsXG5cdFx0XHRcdFx0bWF4bGVuZ3RoOiAxMDAsXG5cdFx0XHRcdH0sXG5cdFx0XHR9XG5cdFx0fSk7XG5cdH1cbn0pO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/admin/pages/category.js\n");

/***/ }),

/***/ "./resources/js/admin/pages/material.js":
/*!**********************************************!*\
  !*** ./resources/js/admin/pages/material.js ***!
  \**********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("$(document).ready(function () {\n  // Validacao do formulario\n  if ($('#form-material').length) {\n    // validation\n    $('#form-material').validate({\n      rules: {\n        name: {\n          required: true,\n          minlength: 2,\n          maxlength: 100\n        }\n      }\n    });\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYWRtaW4vcGFnZXMvbWF0ZXJpYWwuanM/YTY2MSJdLCJuYW1lcyI6WyIkIiwiZG9jdW1lbnQiLCJyZWFkeSIsImxlbmd0aCIsInZhbGlkYXRlIiwicnVsZXMiLCJuYW1lIiwicmVxdWlyZWQiLCJtaW5sZW5ndGgiLCJtYXhsZW5ndGgiXSwibWFwcGluZ3MiOiJBQUFBQSxDQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFlBQ2xCO0FBQ0M7QUFDQSxNQUFJRixDQUFDLENBQUMsZ0JBQUQsQ0FBRCxDQUFvQkcsTUFBeEIsRUFBZ0M7QUFDL0I7QUFDQUgsS0FBQyxDQUFDLGdCQUFELENBQUQsQ0FBb0JJLFFBQXBCLENBQTZCO0FBQzVCQyxXQUFLLEVBQUU7QUFDTkMsWUFBSSxFQUFFO0FBQ0xDLGtCQUFRLEVBQUUsSUFETDtBQUVMQyxtQkFBUyxFQUFFLENBRk47QUFHTEMsbUJBQVMsRUFBRTtBQUhOO0FBREE7QUFEcUIsS0FBN0I7QUFTQTtBQUNELENBZkQiLCJmaWxlIjoiLi9yZXNvdXJjZXMvanMvYWRtaW4vcGFnZXMvbWF0ZXJpYWwuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKVxue1xuXHQvLyBWYWxpZGFjYW8gZG8gZm9ybXVsYXJpb1xuXHRpZiAoJCgnI2Zvcm0tbWF0ZXJpYWwnKS5sZW5ndGgpIHtcblx0XHQvLyB2YWxpZGF0aW9uXG5cdFx0JCgnI2Zvcm0tbWF0ZXJpYWwnKS52YWxpZGF0ZSh7XG5cdFx0XHRydWxlczoge1xuXHRcdFx0XHRuYW1lOiB7XG5cdFx0XHRcdFx0cmVxdWlyZWQ6IHRydWUsXG5cdFx0XHRcdFx0bWlubGVuZ3RoOiAyLFxuXHRcdFx0XHRcdG1heGxlbmd0aDogMTAwLFxuXHRcdFx0XHR9LFxuXHRcdFx0fVxuXHRcdH0pO1xuXHR9XG59KTtcbiJdLCJzb3VyY2VSb290IjoiIn0=\n//# sourceURL=webpack-internal:///./resources/js/admin/pages/material.js\n");

/***/ }),

/***/ "./resources/js/admin/pages/product.js":
/*!*********************************************!*\
  !*** ./resources/js/admin/pages/product.js ***!
  \*********************************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("$(document).ready(function () {\n  // Validacao do formulario\n  if ($('#form-product').length) {\n    // validation\n    $('#form-product').validate({\n      rules: {\n        supplier_id: {\n          required: true\n        },\n        material_id: {\n          required: true\n        },\n        category_id: {\n          required: true\n        },\n        name: {\n          required: true,\n          minlength: 2,\n          maxlength: 100\n        }\n      }\n    });\n  } // Combo AJAX\n\n\n  if ($('select[name=\"category_id\"]').length) {\n    // verifica se o combo ja tem valor setado\n    if ($('input[name=\"category_id\"]').val()) {\n      // binda o combo\n      setTimeout(function () {\n        // recupera o valor do combo principal\n        var material = $('select[name=\"material_id\"]').val(); // carrega o combo de categorias\n\n        loadCategory(material);\n      }, 2000);\n    } // binda combo\n\n\n    $('select[name=\"material_id\"]').change(function () {\n      var combobox = $('select[name=\"category_id\"]');\n      combobox.empty();\n      combobox.prepend($('<option></option>').html('Carregando...'));\n      combobox.selectpicker('refresh'); // carrega o combo\n\n      loadCategory($(this).val());\n    });\n  }\n  /**\n  * Funcao que executa o ajax\n   *\n   * @param int value\n  */\n\n\n  function loadCategory(value) {\n    // carrega o combo\n    $.ajax({\n      url: '../options/category',\n      type: 'POST',\n      dataType: 'html',\n      data: {\n        material: value\n      },\n      success: function success(response) {\n        var combobox = $('select[name=\"category_id\"]');\n        combobox.empty();\n        combobox.html(response);\n        combobox.selectpicker('refresh');\n      }\n    });\n  }\n});//# sourceURL=[module]\n//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9yZXNvdXJjZXMvanMvYWRtaW4vcGFnZXMvcHJvZHVjdC5qcz9kZjA0Il0sIm5hbWVzIjpbIiQiLCJkb2N1bWVudCIsInJlYWR5IiwibGVuZ3RoIiwidmFsaWRhdGUiLCJydWxlcyIsInN1cHBsaWVyX2lkIiwicmVxdWlyZWQiLCJtYXRlcmlhbF9pZCIsImNhdGVnb3J5X2lkIiwibmFtZSIsIm1pbmxlbmd0aCIsIm1heGxlbmd0aCIsInZhbCIsInNldFRpbWVvdXQiLCJtYXRlcmlhbCIsImxvYWRDYXRlZ29yeSIsImNoYW5nZSIsImNvbWJvYm94IiwiZW1wdHkiLCJwcmVwZW5kIiwiaHRtbCIsInNlbGVjdHBpY2tlciIsInZhbHVlIiwiYWpheCIsInVybCIsInR5cGUiLCJkYXRhVHlwZSIsImRhdGEiLCJzdWNjZXNzIiwicmVzcG9uc2UiXSwibWFwcGluZ3MiOiJBQUFBQSxDQUFDLENBQUNDLFFBQUQsQ0FBRCxDQUFZQyxLQUFaLENBQWtCLFlBQ2xCO0FBQ0M7QUFDQSxNQUFJRixDQUFDLENBQUMsZUFBRCxDQUFELENBQW1CRyxNQUF2QixFQUErQjtBQUM5QjtBQUNBSCxLQUFDLENBQUMsZUFBRCxDQUFELENBQW1CSSxRQUFuQixDQUE0QjtBQUMzQkMsV0FBSyxFQUFFO0FBQ05DLG1CQUFXLEVBQUU7QUFDWkMsa0JBQVEsRUFBRTtBQURFLFNBRFA7QUFJTkMsbUJBQVcsRUFBRTtBQUNaRCxrQkFBUSxFQUFFO0FBREUsU0FKUDtBQU9ORSxtQkFBVyxFQUFFO0FBQ1pGLGtCQUFRLEVBQUU7QUFERSxTQVBQO0FBVU5HLFlBQUksRUFBRTtBQUNMSCxrQkFBUSxFQUFFLElBREw7QUFFTEksbUJBQVMsRUFBRSxDQUZOO0FBR0xDLG1CQUFTLEVBQUU7QUFITjtBQVZBO0FBRG9CLEtBQTVCO0FBa0JBLEdBdEJGLENBd0JDOzs7QUFDQSxNQUFJWixDQUFDLENBQUMsNEJBQUQsQ0FBRCxDQUFnQ0csTUFBcEMsRUFBNEM7QUFDM0M7QUFDQSxRQUFJSCxDQUFDLENBQUMsMkJBQUQsQ0FBRCxDQUErQmEsR0FBL0IsRUFBSixFQUEwQztBQUN6QztBQUNBQyxnQkFBVSxDQUFDLFlBQVc7QUFDVDtBQUNBLFlBQUlDLFFBQVEsR0FBR2YsQ0FBQyxDQUFDLDRCQUFELENBQUQsQ0FBZ0NhLEdBQWhDLEVBQWYsQ0FGUyxDQUdUOztBQUNaRyxvQkFBWSxDQUFDRCxRQUFELENBQVo7QUFDUyxPQUxBLEVBS0UsSUFMRixDQUFWO0FBTU0sS0FWb0MsQ0FZckM7OztBQUNBZixLQUFDLENBQUMsNEJBQUQsQ0FBRCxDQUFnQ2lCLE1BQWhDLENBQXVDLFlBQ3ZDO0FBQ0ksVUFBSUMsUUFBUSxHQUFHbEIsQ0FBQyxDQUFDLDRCQUFELENBQWhCO0FBQ0FrQixjQUFRLENBQUNDLEtBQVQ7QUFDQUQsY0FBUSxDQUFDRSxPQUFULENBQWlCcEIsQ0FBQyxDQUFDLG1CQUFELENBQUQsQ0FBdUJxQixJQUF2QixDQUE0QixlQUE1QixDQUFqQjtBQUNBSCxjQUFRLENBQUNJLFlBQVQsQ0FBc0IsU0FBdEIsRUFKSixDQUtJOztBQUNBTixrQkFBWSxDQUFDaEIsQ0FBQyxDQUFDLElBQUQsQ0FBRCxDQUFRYSxHQUFSLEVBQUQsQ0FBWjtBQUNILEtBUkQ7QUFTTjtBQUVFOzs7Ozs7O0FBS0gsV0FBU0csWUFBVCxDQUFzQk8sS0FBdEIsRUFDQTtBQUNDO0FBQ0F2QixLQUFDLENBQUN3QixJQUFGLENBQU87QUFDTkMsU0FBRyxFQUFFLHFCQURDO0FBRU5DLFVBQUksRUFBRSxNQUZBO0FBR0dDLGNBQVEsRUFBRSxNQUhiO0FBSU5DLFVBQUksRUFBRTtBQUNMYixnQkFBUSxFQUFFUTtBQURMLE9BSkE7QUFPTk0sYUFBTyxFQUFFLGlCQUFTQyxRQUFULEVBQ1Q7QUFDYSxZQUFJWixRQUFRLEdBQUdsQixDQUFDLENBQUMsNEJBQUQsQ0FBaEI7QUFDQWtCLGdCQUFRLENBQUNDLEtBQVQ7QUFDQUQsZ0JBQVEsQ0FBQ0csSUFBVCxDQUFjUyxRQUFkO0FBQ0FaLGdCQUFRLENBQUNJLFlBQVQsQ0FBc0IsU0FBdEI7QUFDSDtBQWJKLEtBQVA7QUFlRztBQUNKLENBMUVEIiwiZmlsZSI6Ii4vcmVzb3VyY2VzL2pzL2FkbWluL3BhZ2VzL3Byb2R1Y3QuanMuanMiLCJzb3VyY2VzQ29udGVudCI6WyIkKGRvY3VtZW50KS5yZWFkeShmdW5jdGlvbiAoKVxue1xuXHQvLyBWYWxpZGFjYW8gZG8gZm9ybXVsYXJpb1xuXHRpZiAoJCgnI2Zvcm0tcHJvZHVjdCcpLmxlbmd0aCkge1xuXHRcdC8vIHZhbGlkYXRpb25cblx0XHQkKCcjZm9ybS1wcm9kdWN0JykudmFsaWRhdGUoe1xuXHRcdFx0cnVsZXM6IHtcblx0XHRcdFx0c3VwcGxpZXJfaWQ6IHtcblx0XHRcdFx0XHRyZXF1aXJlZDogdHJ1ZSxcblx0XHRcdFx0fSxcblx0XHRcdFx0bWF0ZXJpYWxfaWQ6IHtcblx0XHRcdFx0XHRyZXF1aXJlZDogdHJ1ZSxcblx0XHRcdFx0fSxcblx0XHRcdFx0Y2F0ZWdvcnlfaWQ6IHtcblx0XHRcdFx0XHRyZXF1aXJlZDogdHJ1ZSxcblx0XHRcdFx0fSxcblx0XHRcdFx0bmFtZToge1xuXHRcdFx0XHRcdHJlcXVpcmVkOiB0cnVlLFxuXHRcdFx0XHRcdG1pbmxlbmd0aDogMixcblx0XHRcdFx0XHRtYXhsZW5ndGg6IDEwMCxcblx0XHRcdFx0fSxcblx0XHRcdH1cblx0XHR9KTtcblx0fVxuXG5cdC8vIENvbWJvIEFKQVhcblx0aWYgKCQoJ3NlbGVjdFtuYW1lPVwiY2F0ZWdvcnlfaWRcIl0nKS5sZW5ndGgpIHtcblx0XHQvLyB2ZXJpZmljYSBzZSBvIGNvbWJvIGphIHRlbSB2YWxvciBzZXRhZG9cblx0XHRpZiAoJCgnaW5wdXRbbmFtZT1cImNhdGVnb3J5X2lkXCJdJykudmFsKCkpIHtcblx0XHRcdC8vIGJpbmRhIG8gY29tYm9cblx0XHRcdHNldFRpbWVvdXQoZnVuY3Rpb24oKSB7XG4gICAgICAgICAgICAgICAgLy8gcmVjdXBlcmEgbyB2YWxvciBkbyBjb21ibyBwcmluY2lwYWxcbiAgICAgICAgICAgICAgICB2YXIgbWF0ZXJpYWwgPSAkKCdzZWxlY3RbbmFtZT1cIm1hdGVyaWFsX2lkXCJdJykudmFsKCk7XG4gICAgICAgICAgICAgICAgLy8gY2FycmVnYSBvIGNvbWJvIGRlIGNhdGVnb3JpYXNcblx0XHRcdFx0bG9hZENhdGVnb3J5KG1hdGVyaWFsKVxuICAgICAgICAgICAgfSwgMjAwMCk7XG4gICAgICAgIH1cblxuICAgICAgICAvLyBiaW5kYSBjb21ib1xuICAgICAgICAkKCdzZWxlY3RbbmFtZT1cIm1hdGVyaWFsX2lkXCJdJykuY2hhbmdlKGZ1bmN0aW9uKClcbiAgICAgICAge1xuICAgICAgICAgICAgdmFyIGNvbWJvYm94ID0gJCgnc2VsZWN0W25hbWU9XCJjYXRlZ29yeV9pZFwiXScpO1xuICAgICAgICAgICAgY29tYm9ib3guZW1wdHkoKTtcbiAgICAgICAgICAgIGNvbWJvYm94LnByZXBlbmQoJCgnPG9wdGlvbj48L29wdGlvbj4nKS5odG1sKCdDYXJyZWdhbmRvLi4uJykpO1xuICAgICAgICAgICAgY29tYm9ib3guc2VsZWN0cGlja2VyKCdyZWZyZXNoJyk7XG4gICAgICAgICAgICAvLyBjYXJyZWdhIG8gY29tYm9cbiAgICAgICAgICAgIGxvYWRDYXRlZ29yeSgkKHRoaXMpLnZhbCgpKTtcbiAgICAgICAgfSk7XG5cdH1cblxuICAgIC8qKlxuXHQgKiBGdW5jYW8gcXVlIGV4ZWN1dGEgbyBhamF4XG4gICAgICpcbiAgICAgKiBAcGFyYW0gaW50IHZhbHVlXG5cdCAqL1xuXHRmdW5jdGlvbiBsb2FkQ2F0ZWdvcnkodmFsdWUpXG5cdHtcblx0XHQvLyBjYXJyZWdhIG8gY29tYm9cblx0XHQkLmFqYXgoe1xuXHRcdFx0dXJsOiAnLi4vb3B0aW9ucy9jYXRlZ29yeScsXG5cdFx0XHR0eXBlOiAnUE9TVCcsXG4gICAgICAgICAgICBkYXRhVHlwZTogJ2h0bWwnLFxuXHRcdFx0ZGF0YToge1xuXHRcdFx0XHRtYXRlcmlhbDogdmFsdWUsXG5cdFx0XHR9LFxuXHRcdFx0c3VjY2VzczogZnVuY3Rpb24ocmVzcG9uc2UpXG5cdFx0XHR7XG4gICAgICAgICAgICAgICAgdmFyIGNvbWJvYm94ID0gJCgnc2VsZWN0W25hbWU9XCJjYXRlZ29yeV9pZFwiXScpO1xuICAgICAgICAgICAgICAgIGNvbWJvYm94LmVtcHR5KCk7XG4gICAgICAgICAgICAgICAgY29tYm9ib3guaHRtbChyZXNwb25zZSk7XG4gICAgICAgICAgICAgICAgY29tYm9ib3guc2VsZWN0cGlja2VyKCdyZWZyZXNoJyk7XG4gICAgICAgICAgICB9XG4gICAgICAgIH0pO1xuICAgIH1cbn0pO1xuIl0sInNvdXJjZVJvb3QiOiIifQ==\n//# sourceURL=webpack-internal:///./resources/js/admin/pages/product.js\n");

/***/ }),

/***/ 8:
/*!*********************************************************************************************************************************!*\
  !*** multi ./resources/js/admin/pages/category.js ./resources/js/admin/pages/material.js ./resources/js/admin/pages/product.js ***!
  \*********************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(/*! /var/www/lumeldecor/resources/js/admin/pages/category.js */"./resources/js/admin/pages/category.js");
__webpack_require__(/*! /var/www/lumeldecor/resources/js/admin/pages/material.js */"./resources/js/admin/pages/material.js");
module.exports = __webpack_require__(/*! /var/www/lumeldecor/resources/js/admin/pages/product.js */"./resources/js/admin/pages/product.js");


/***/ })

/******/ });