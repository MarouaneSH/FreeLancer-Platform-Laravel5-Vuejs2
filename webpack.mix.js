let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.sass('resources/assets/sass/modify-profile.scss', 'public/css/') 
    .sass('resources/assets/sass/profile.scss', 'public/css/') 
    .sass('resources/assets/sass/home.scss', 'public/css/') 
    .sass('resources/assets/sass/mission.scss', 'public/css/') 
    .js('resources/assets/js/app.js', 'public/js/')
    .options({
        processCssUrls: false
     });

     
 if (mix.inProduction()) {
    mix.version();
}