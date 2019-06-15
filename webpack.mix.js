const mix = require('laravel-mix');

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
    //mix.copy('vendor/foo/bar.css', 'public/css/bar.css');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .copy('node_modules/sweetalert/dist', 'public/js')
    .copy('resources/loadingoverlay/LoadingOverlay.js', 'public/js')
    .copy('resources/loadingoverlay/loading.gif', 'public/img')
    .copy('resources/js/forms/jquery.mask.min.js', 'public/js')
    .copy('resources/js/forms/jquery.validate.js', 'public/js')
    .copy('resources/js/forms/additional-methods.js', 'public/js');