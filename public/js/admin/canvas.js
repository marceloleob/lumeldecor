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

/***/ "./resources/js/admin/canvas.js":
/*!**************************************!*\
  !*** ./resources/js/admin/canvas.js ***!
  \**************************************/
/*! no static exports found */
/***/ (function(module, exports) {

(function ($) {
  var chart = new CanvasJS.Chart("chartContainer", {
    theme: "light2",
    animationEnabled: true,
    title: {
      text: "Game of Thrones Viewers of the First Airing on HBO"
    },
    axisY: {
      includeZero: false,
      title: "Number of Viewers",
      suffix: "mn"
    },
    toolTip: {
      shared: "true"
    },
    legend: {
      cursor: "pointer",
      itemclick: toggleDataSeries
    },
    data: [{
      type: "spline",
      visible: false,
      showInLegend: true,
      yValueFormatString: "##.00mn",
      name: "Season 1",
      dataPoints: [{
        label: "Ep. 1",
        y: 2.22
      }, {
        label: "Ep. 2",
        y: 2.20
      }, {
        label: "Ep. 3",
        y: 2.44
      }, {
        label: "Ep. 4",
        y: 2.45
      }, {
        label: "Ep. 5",
        y: 2.58
      }, {
        label: "Ep. 6",
        y: 2.44
      }, {
        label: "Ep. 7",
        y: 2.40
      }, {
        label: "Ep. 8",
        y: 2.72
      }, {
        label: "Ep. 9",
        y: 2.66
      }, {
        label: "Ep. 10",
        y: 3.04
      }]
    }, {
      type: "spline",
      showInLegend: true,
      visible: false,
      yValueFormatString: "##.00mn",
      name: "Season 2",
      dataPoints: [{
        label: "Ep. 1",
        y: 3.86
      }, {
        label: "Ep. 2",
        y: 3.76
      }, {
        label: "Ep. 3",
        y: 3.77
      }, {
        label: "Ep. 4",
        y: 3.65
      }, {
        label: "Ep. 5",
        y: 3.90
      }, {
        label: "Ep. 6",
        y: 3.88
      }, {
        label: "Ep. 7",
        y: 3.69
      }, {
        label: "Ep. 8",
        y: 3.86
      }, {
        label: "Ep. 9",
        y: 3.38
      }, {
        label: "Ep. 10",
        y: 4.20
      }]
    }, {
      type: "spline",
      visible: false,
      showInLegend: true,
      yValueFormatString: "##.00mn",
      name: "Season 3",
      dataPoints: [{
        label: "Ep. 1",
        y: 4.37
      }, {
        label: "Ep. 2",
        y: 4.27
      }, {
        label: "Ep. 3",
        y: 4.72
      }, {
        label: "Ep. 4",
        y: 4.87
      }, {
        label: "Ep. 5",
        y: 5.35
      }, {
        label: "Ep. 6",
        y: 5.50
      }, {
        label: "Ep. 7",
        y: 4.84
      }, {
        label: "Ep. 8",
        y: 4.13
      }, {
        label: "Ep. 9",
        y: 5.22
      }, {
        label: "Ep. 10",
        y: 5.39
      }]
    }, {
      type: "spline",
      showInLegend: true,
      yValueFormatString: "##.00mn",
      name: "Season 4",
      dataPoints: [{
        label: "Ep. 1",
        y: 6.64
      }, {
        label: "Ep. 2",
        y: 6.31
      }, {
        label: "Ep. 3",
        y: 6.59
      }, {
        label: "Ep. 4",
        y: 6.95
      }, {
        label: "Ep. 5",
        y: 7.16
      }, {
        label: "Ep. 6",
        y: 6.40
      }, {
        label: "Ep. 7",
        y: 7.20
      }, {
        label: "Ep. 8",
        y: 7.17
      }, {
        label: "Ep. 9",
        y: 6.95
      }, {
        label: "Ep. 10",
        y: 7.09
      }]
    }, {
      type: "spline",
      showInLegend: true,
      yValueFormatString: "##.00mn",
      name: "Season 5",
      dataPoints: [{
        label: "Ep. 1",
        y: 8
      }, {
        label: "Ep. 2",
        y: 6.81
      }, {
        label: "Ep. 3",
        y: 6.71
      }, {
        label: "Ep. 4",
        y: 6.82
      }, {
        label: "Ep. 5",
        y: 6.56
      }, {
        label: "Ep. 6",
        y: 6.24
      }, {
        label: "Ep. 7",
        y: 5.40
      }, {
        label: "Ep. 8",
        y: 7.01
      }, {
        label: "Ep. 9",
        y: 7.14
      }, {
        label: "Ep. 10",
        y: 8.11
      }]
    }, {
      type: "spline",
      showInLegend: true,
      yValueFormatString: "##.00mn",
      name: "Season 6",
      dataPoints: [{
        label: "Ep. 1",
        y: 7.94
      }, {
        label: "Ep. 2",
        y: 7.29
      }, {
        label: "Ep. 3",
        y: 7.28
      }, {
        label: "Ep. 4",
        y: 7.82
      }, {
        label: "Ep. 5",
        y: 7.89
      }, {
        label: "Ep. 6",
        y: 6.71
      }, {
        label: "Ep. 7",
        y: 7.80
      }, {
        label: "Ep. 8",
        y: 7.60
      }, {
        label: "Ep. 9",
        y: 7.66
      }, {
        label: "Ep. 10",
        y: 8.89
      }]
    }, {
      type: "spline",
      showInLegend: true,
      yValueFormatString: "##.00mn",
      name: "Season 7",
      dataPoints: [{
        label: "Ep. 1",
        y: 10.11
      }, {
        label: "Ep. 2",
        y: 9.27
      }, {
        label: "Ep. 3",
        y: 9.25
      }, {
        label: "Ep. 4",
        y: 10.17
      }, {
        label: "Ep. 5",
        y: 10.72
      }, {
        label: "Ep. 6",
        y: 10.24
      }, {
        label: "Ep. 7",
        y: 12.07
      }]
    }]
  });
  chart.render();

  function toggleDataSeries(e) {
    if (typeof e.dataSeries.visible === "undefined" || e.dataSeries.visible) {
      e.dataSeries.visible = false;
    } else {
      e.dataSeries.visible = true;
    }

    chart.render();
  }
});

/***/ }),

/***/ 2:
/*!********************************************!*\
  !*** multi ./resources/js/admin/canvas.js ***!
  \********************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/lumeldecor/resources/js/admin/canvas.js */"./resources/js/admin/canvas.js");


/***/ })

/******/ });