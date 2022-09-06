/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/pages/blog/blog.js ***!
  \*****************************************/
console.log("this is the blog js");
new Vue({
  el: "#blog_section",
  data: {
    opened_setting: null
  },
  methods: {
    openSetting: function openSetting(id) {
      if (!this.opened_setting) {
        this.opened_setting = id;
      } else {
        this.opened_setting = this.opened_setting == id ? null : this.opened_setting;
      }
    }
  }
});
/******/ })()
;