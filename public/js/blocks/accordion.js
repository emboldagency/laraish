/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!******************************************!*\
  !*** ./resources/js/blocks/accordion.js ***!
  \******************************************/
document.querySelectorAll('.accordion-title').forEach(function (el) {
  el.addEventListener('click', function (e) {
    var accordion = e.currentTarget;
    var accordionWrapper = accordion.parentElement;
    var content = accordion.parentElement.querySelector('.accordion-content-wrapper');
    var height = content.querySelector('.accordion-content').offsetHeight;

    if (accordionWrapper.classList.contains('content-hidden')) {
      accordionWrapper.classList.remove('content-hidden');
      content.style.height = "".concat(height, "px");
      return;
    }

    accordionWrapper.classList.add('content-hidden');
    content.style.height = "0px";
  });
});
/******/ })()
;