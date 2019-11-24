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

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css');

   mix.scripts([
	'jquery/dist/jquery.js',
	'bootstrap/dist/js/bootstrap.js'
	], 'public/js/all.js', 'node_modules')


mix.browserSync({
    proxy: 'http://notifications.com/'
});

if(mix.inProduction())
{
	mix.version();
}