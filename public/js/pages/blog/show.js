/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************************!*\
  !*** ./resources/js/pages/blog/show.js ***!
  \*****************************************/
console.log("this is the show js");
new Vue({
  el: "#show_blog_section",
  data: {
    opened_setting: null
  },
  methods: {
    openSetting: function openSetting(id) {
      if (!this.opened_setting) {
        this.opened_setting = id;
      } else {
        this.opened_setting = this.opened_setting == id ? null : id;
      }
    }
  }
});
/******/ })()
;