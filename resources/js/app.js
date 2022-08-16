

import './bootstrap';
// import Vue from 'vue';


const Vue = require('vue')
window.Vue = Vue
const Highcharts = require('highcharts')
window.Highcharts = Highcharts
const bootstrap = require('bootstrap')
window.bootstrap = bootstrap

const {check_counting_fun} = require("./counting-num")
window.check_fun = check_counting_fun

// const {check_fun} = require("./how-much.js");
// // import { check_fun } from './how-much.js';
// window.check_fun = check_fun;

// require('./app_vue.js')
// require('./check-sign-up.js')
// require('./forget_pw.js')
// require('./information.js')
// require('./how-much.js')

// import './app_vue.js';
// import './check-sign-up.js';
// import './forget_pw.js';
// import './information.js';
// import './how-much.js';


// const {check_fun} = require("./how-much.js");
// // import { check_fun } from './how-much.js';
// window.check_fun = check_fun;
