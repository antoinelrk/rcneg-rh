const mix = require('laravel-mix');

//Config
mix.browserSync({
    proxy: "localhost:8000",
    //logLevel: "silent",
    notify: false
});

mix.disableNotifications();
mix.setPublicPath("public");

mix.options({
    processCssUrls: false,
    clearConsole: true
});

mix.js('resources/js/app.js', 'public/js').sass('resources/sass/app.scss', 'public/css');
