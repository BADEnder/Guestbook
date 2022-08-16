
let mix = require("laravel-mix")

mix.js('resources/js/app.js', 'public/js').extract().version();

mix.js('resources/js/app-vue.js', 'public/js').version();
mix.js('resources/js/check-sign-up.js', 'public/js').version();
mix.js('resources/js/forget-pw.js', 'public/js').version();
mix.js('resources/js/information.js', 'public/js').version();
mix.js('resources/js/counting-num.js', 'public/js').version();
mix.js('resources/js/check-log-in.js', 'public/js').version();

mix.css('resources/css/app.css', 'public/css').version();



