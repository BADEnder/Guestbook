(self["webpackChunkguestbook"] = self["webpackChunkguestbook"] || []).push([["/js/check-sign-up"],{

/***/ "./resources/js/check-sign-up.js":
/*!***************************************!*\
  !*** ./resources/js/check-sign-up.js ***!
  \***************************************/
/***/ (() => {

var myform = document.querySelector("#myform");
var password = document.querySelector("#password");
var password_again = document.querySelector("#password_again");
var user = document.querySelector("#user");
var name = document.querySelector("#name");
var email = document.querySelector("#email");
var item_target = document.querySelector(".show_submit_message");

var show_submit_message = function show_submit_message(message) {
  var background_color = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "rgb(170, 253, 223)";
  var shadow = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : "rgb(150, 248, 212)";
  item_target.innerText = message;
  item_target.style.backgroundColor = background_color;
  item_target.style.boxShadow = "0px 0px 10px " + shadow;
  item_target.style.display = "flex";
  item_target.style.opacity = 1;
  var cur_opi = 1;
  setTimeout(function () {
    var item_target_timeout = setInterval(function () {
      cur_opi -= 0.05;
      item_target.style.opacity = cur_opi;

      if (cur_opi <= 0) {
        clearInterval(item_target_timeout);
        item_target.style.display = "none";
      }
    }, 100);
  }, 3000);
};

myform.addEventListener("submit", function (event) {
  if (user.value.trim() == "") {
    event.preventDefault();
    show_submit_message("User is empty", "rgb(248, 255, 55)", "rgb(251, 255, 125)");
  } else if (name.value.trim() == "") {
    event.preventDefault();
    show_submit_message("Name is empty", "rgb(248, 255, 55)", "rgb(251, 255, 125)");
  } else if (email.value.trim() == "") {
    event.preventDefault();
    show_submit_message("Email is empty", "rgb(248, 255, 55)", "rgb(251, 255, 125)");
  } else if (password.value.trim() == "") {
    event.preventDefault();
    show_submit_message("Password is empty", "rgb(248, 255, 55)", "rgb(251, 255, 125)");
  } else if (password.value !== password_again.value) {
    event.preventDefault();
    show_submit_message("Passwords are different!", "rgb(248, 255, 55)", "rgb(251, 255, 125)");
  }
});

if (item_target.innerText.trim() != "") {
  show_submit_message(item_target.innerText.trim(), "rgb(255, 84, 72)", "rgb(250, 118, 109)");
}

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ var __webpack_exports__ = (__webpack_exec__("./resources/js/check-sign-up.js"));
/******/ }
]);