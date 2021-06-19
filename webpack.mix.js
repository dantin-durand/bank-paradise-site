const mix = require("laravel-mix");

mix.js("resources/js/app.js", "public/js")
    .js("resources/js/navbar.js", "public/js")
    .postCss("resources/css/reset.css", "public/css")
    .postCss("resources/css/navbar/default.css", "public/css/navbar")
    .postCss("resources/css/app.css", "public/css")
    .postCss("resources/css/ck-content.css", "public/css")
    .postCss("resources/css/dashboard.css", "public/css")
    .options({
        processCssUrls: false,
    });
