(self["webpackChunkguestbook"] = self["webpackChunkguestbook"] || []).push([["/js/forget-pw"],{

/***/ "./resources/js/forget-pw.js":
/*!***********************************!*\
  !*** ./resources/js/forget-pw.js ***!
  \***********************************/
/***/ (() => {

var send_email_but = document.querySelector("#send_email_but"); // console.log(send_email_but)

send_email_but.addEventListener("click", function (event) {
  event.preventDefault();
});

var sendEmail = function sendEmail(elem) {
  var user = document.querySelector("#user");

  if (user.value.trim() == "") {
    alert("You didn't enter the user.");
  } else {
    elem.disabled = true;
    setTimeout(function () {
      elem.disabled = false;
    }, 30000);
  }
};

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ var __webpack_exports__ = (__webpack_exec__("./resources/js/forget-pw.js"));
/******/ }
]);