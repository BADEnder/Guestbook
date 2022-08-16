(self["webpackChunkguestbook"] = self["webpackChunkguestbook"] || []).push([["/js/app-vue"],{

/***/ "./resources/js/app-vue.js":
/*!*********************************!*\
  !*** ./resources/js/app-vue.js ***!
  \*********************************/
/***/ (() => {

var app = Vue.createApp({
  data: function data() {
    return {
      name: "test",
      datas: [],
      cur_page: 1,
      total_page: null,
      reply_target: null,
      api_token: ""
    };
  },
  methods: {
    get_data: function get_data(target_page) {
      var _this = this;

      var get_data_instance = axios({
        url: "/api/get_data",
        method: 'get',
        headers: {
          "Authorization": "Bearer " + this.api_token
        },
        params: {
          target_page: target_page
        }
      });
      get_data_instance.then(function (res) {
        _this.datas = res.data;

        if (_this.cur_page === 1) {
          p_page_but.disabled = true;
        } else {
          p_page_but.disabled = false;
        }

        if (_this.cur_page === _this.total_page) {
          n_page_but.disabled = true;
        } else {
          n_page_but.disabled = false;
        }
      });
    },
    get_total_num: function get_total_num() {
      var _this2 = this;

      var get_total_num_instance = axios({
        url: "/api/get_total_num",
        method: 'get',
        headers: {
          "Authorization": "Bearer " + this.api_token
        }
      });
      get_total_num_instance.then(function (res) {
        _this2.total_page = res.data;
      });
    },
    get_reply_target: function get_reply_target(number) {
      this.reply_target = number;
    },
    get_current_time_string: function get_current_time_string() {
      var time = new Date();
      var result = "";
      time = time.toISOString();

      for (var idx = 0; idx < time.length; idx++) {
        if (time[idx] == "T") {
          result += " ";
          indication = 1;
        } else if (time[idx] == ".") {
          break;
        } else {
          result += time[idx];
        }
      }

      return result;
    },
    go_previous_page: function go_previous_page() {
      if (this.cur_page != 1) {
        this.get_data(this.cur_page - 1);
        this.get_total_num();
        this.cur_page -= 1;
      }
    },
    go_next_page: function go_next_page() {
      if (this.cur_page != this.total_page) {
        this.get_data(this.cur_page + 1);
        this.get_total_num();
        this.cur_page += 1;
      }
    },
    show_submit_message: function show_submit_message(message) {
      var background_color = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : "rgb(170, 253, 223)";
      var shadow = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : "rgb(150, 248, 212)";
      var item_target = document.querySelector(".show_submit_message");
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
    },
    submit_new_message_fun: function submit_new_message_fun() {
      var _this3 = this;

      var message_id = document.querySelector("#message_id");
      var message_name = document.querySelector("#message_name");
      var message_title = document.querySelector("#message_title");
      var message_content = document.querySelector("#message_content"); // 不實例化，無法套用header

      if (message_title.value.trim() == "") {
        this.show_submit_message("Title cannot be empty", "rgb(255, 84, 72)", "rgb(250, 118, 109)");
      } else if (message_content.value.trim() == "") {
        this.show_submit_message("Message content cannot be empty", "rgb(255, 84, 72)", "rgb(250, 118, 109)");
      } else {
        var submit_new_message_instance = axios({
          url: "/api/submit_new_message",
          method: 'post',
          data: {
            user_id: message_id.value,
            name: message_name.value,
            title: message_title.value,
            content: message_content.value
          },
          headers: {
            "Authorization": "Bearer " + this.api_token
          }
        });
        submit_new_message_instance.then(function (res) {
          var current_time = _this3.get_current_time_string();

          if (_this3.cur_page == _this3.total_page) {
            if (_this3.datas.length < 10) {
              _this3.datas.push({
                id: Number(_this3.datas[_this3.datas.length - 1]["id"]) + 1,
                title: message_title.value,
                created_at: current_time,
                name: message_name.value,
                reply_data: [],
                content: message_content.value,
                updated_at: current_time,
                user_id: Number(message_id.value)
              });
            } else {
              _this3.total_page += 1;
              n_page_but.disabled = false;
            }
          }

          message_title.value = "";
          message_content.value = "";
          var hint_message = "Submit new message success!";
          console.log(hint_message);

          _this3.show_submit_message(hint_message);
        });
      }
    },
    submit_reply_fun: function submit_reply_fun() {
      var _this4 = this;

      var reply_id = document.querySelector("#reply_article_id");
      var discuss_name = document.querySelector("#reply_user_name");
      var discuss_content = document.querySelector("#reply_content");
      var current_time = this.get_current_time_string();

      if (discuss_content.value.trim() == "") {
        this.show_submit_message("Message content cannot be empty", "rgb(255, 84, 72)", "rgb(250, 118, 109)");
      } else {
        var submit_reply_instance = axios({
          url: "/api/submit_reply",
          method: 'post',
          data: {
            reply_id: reply_id.value,
            name: discuss_name.value,
            content: discuss_content.value
          },
          headers: {
            "Authorization": "Bearer " + this.api_token
          }
        });
        submit_reply_instance.then(function (res) {
          var idx_des = 0;

          for (var idx = 0; idx < _this4.datas.length; idx++) {
            if (_this4.datas[idx]['id'] == reply_id.value) {
              idx_des = idx;
              break;
            }
          }

          _this4.datas[idx_des].reply_data.push({
            reply_id: reply_id.value,
            name: discuss_name.value,
            content: discuss_content.value,
            create_at: current_time,
            updated_at: current_time
          });

          discuss_content.value = "";
          var hint_message = "Reply for Aritcle ID: ".concat(reply_id.value, " success!");
          console.log(hint_message);

          _this4.show_submit_message(hint_message);
        });
      }
    }
  },
  computed: {},
  created: function created() {// console.log("app created!")
  },
  updated: function updated() {// console.log("app updated!")
  },
  mounted: function mounted() {
    // this.api_token = "eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIyIiwianRpIjoiZGQ5M2ZlMjAxMDBhZjgxMTcxYzBiNTA3N2JjZjY0NzdlZDY3ZTlkNjk4NTFjYjJlZjBlNGJlOTJhYTIwMjUwNWMyMjc2YmUzNDk4MTIyN2EiLCJpYXQiOjE2NTk2Mjc3NjIuOTI5NTk0LCJuYmYiOjE2NTk2Mjc3NjIuOTI5NTk2LCJleHAiOjE2OTExNjM3NjIuOTIzNiwic3ViIjoiMSIsInNjb3BlcyI6W119.tdfdLRp8Dv0f1Qtp8mf3X7OFPgbQXzLltrqFuLglFUocAbYYKMoC_BWD4BJ6BNWKdc49TAynYoPoQ-mels0_UzV7a1LJHNKQRiyPDT_WnQo_ztZ9ztH70e8jSivl6PfYNUXSPDSAjO560psn0YcChV9vVBBHQtx2yHEihRf6qL1EOtI8dgfzO_W2H0eEbJBft_kfAgM5t2QzJB41CyZs7SmaHtBGXp_DW8v51AmwMcM_4pJQbQoOsUTVnGeLzJgCA4Pf_fxRobc4SE2DW3Wj9xYoxMSTB12uK6K0Hpt2d9kzpoS6M4KN-IdHl9Og5MvGEujQpPAX_Az4zbM3dOnsw_deUSrCfi4Lz64GeGx-Fspr32-IlMDcIHW_YMBmUD3K5kcXeCPvl79LgAyXUrRnMFscL28nIcN5pd1NmqqM1J8qNAloHjowrSGN5JwFrRN14mdDMPTvzbY4KNWmadLpAewKalgXX-RwzL5uPVUpPSEvrgm5Cf1mDvryQdT4wLhzhD9sEKTwW5nxC6qFQ-v45VzM2JL7DN65OkI7F5owBYvJaqjE0RFAUWxHTlATb_tiYRlZM_GvR1LjOKDYmZooto1G18o4b2c7OHEkL-AWKJYZzGB_LtEweW-uojOFsN2RTAPTOTjbjycB-FoA-hg2cvj4dXONw2URAgJ2TAG9o1M"
    this.get_data(this.cur_page);
    this.get_total_num();
    var p_page_but = document.querySelector("#p_page_but");
    var n_page_but = document.querySelector("#n_page_but");
  }
});
app.mount("#app"); // const discuss_fun = function (elem) {
//     let ref = elem.id.substring(8)
//     let discuss_block= document.querySelector(`#dis_block_${ref}`)
//     if(discuss_block.style.display === "block"){
//         discuss_block.style.display = "none"
//     }else{
//         discuss_block.style.display = "block"
//     }
// }

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ var __webpack_exports__ = (__webpack_exec__("./resources/js/app-vue.js"));
/******/ }
]);