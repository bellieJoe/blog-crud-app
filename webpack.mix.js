const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/js/app.js', 'public/js')
    .js('resources/js/pages/sign_in.js', 'public/js')
    .js('resources/js/pages/sign_up.js', 'public/js')

    .sass('resources/scss/app.scss', 'public/css', [])
    .sass('resources/scss/auth/verify_email.scss', 'public/css', [])
    .sass('resources/scss/pages/sign_in.scss', 'public/css', [])
    .sass('resources/scss/pages/sign_up.scss', 'public/css', []);
