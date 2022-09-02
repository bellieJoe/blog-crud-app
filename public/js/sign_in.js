/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/pages/sign_in.js ***!
  \***************************************/
new Vue({
  el: "#sign_in_section",
  data: {
    is_password_hidden: true
  },
  methods: {
    toggle_password: function toggle_password() {
      this.is_password_hidden = this.is_password_hidden ? false : true;
    }
  }
});
/******/ })()
;