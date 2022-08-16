(self["webpackChunkguestbook"] = self["webpackChunkguestbook"] || []).push([["/js/information"],{

/***/ "./resources/js/information.js":
/*!*************************************!*\
  !*** ./resources/js/information.js ***!
  \*************************************/
/***/ (() => {

var myform = document.querySelector("#myform");
var password = document.querySelector("#password");
var password_again = document.querySelector("#password_again");
var user = document.querySelector("#user");
var name = document.querySelector("#name");
var email = document.querySelector("#email"); // console.log(myform)
// console.log(password)
// console.log(user)
// password.addEventListener("keyup", ()=>{
//     name.value = password.value
// })

myform.addEventListener("submit", function (event) {
  if (user.value.trim() == "") {
    event.preventDefault();
    alert("User is empty");
  } else if (name.value.trim() == "") {
    event.preventDefault();
    alert("Name is empty");
  } else if (email.value.trim() == "") {
    event.preventDefault();
    alert("Email is empty");
  } else if (password.value !== password_again.value) {
    event.preventDefault();
    alert("Passwords are different!");
  }
}); // myform.addEventListener("submit", (event) => {
//     event.preventDefault()
//     console.log("event submitted.")
// })

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ var __webpack_exports__ = (__webpack_exec__("./resources/js/information.js"));
/******/ }
]);