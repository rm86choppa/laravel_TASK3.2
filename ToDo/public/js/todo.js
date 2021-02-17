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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/todo.js":
/*!******************************!*\
  !*** ./resources/js/todo.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports) {

var table = document.getElementById('table');
var tr_array = table.querySelectorAll('tr');
var done_array = table.querySelectorAll('#done');
var working_array = table.querySelectorAll('#working');

function filtering(e) {
  switch (this.type) {
    case "all":
      //全ての行を表示
      tr_array.forEach(function (element) {
        if (element.style.display == 'none') {
          element.style.display = "";
        }
      });
      break;

    case "working":
      //完了の行を非表示
      done_array.forEach(function (element) {
        element.style.display = 'none';
      }); //作業中の行を表示(直前に完了のラジオボタンが押されていた場合、作業中が非表示のため)

      working_array.forEach(function (element) {
        element.style.display = '';
      });
      break;

    case "done":
      //作業中の行を非表示
      working_array.forEach(function (element) {
        element.style.display = 'none';
      }); //完了の行を表示(直前に作業中のラジオボタンが押されていた場合、完了が非表示のため)

      done_array.forEach(function (element) {
        element.style.display = '';
      });
      break;
  }
}

document.getElementById('all_radio').addEventListener('click', {
  type: 'all',
  handleEvent: filtering
});
document.getElementById('working_radio').addEventListener('click', {
  type: 'working',
  handleEvent: filtering
});
document.getElementById('done_radio').addEventListener('click', {
  type: 'done',
  handleEvent: filtering
});

/***/ }),

/***/ 1:
/*!************************************!*\
  !*** multi ./resources/js/todo.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! C:\xampp\htdocs\git\laravel_TASK3.2\ToDo\resources\js\todo.js */"./resources/js/todo.js");


/***/ })

/******/ });