let mix = require('laravel-mix').mix;

mix.js('resources/assets/js/app.js', 'public/js')
    .sass('resources/assets/sass/app.scss', 'public/css');


mix.js('resources/assets/js/app-vuejs.js', 'public/js')
    .sass('resources/assets/sass/app-vuejs.scss', 'public/css');

