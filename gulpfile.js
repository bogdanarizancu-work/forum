const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

var gulp = require('gulp')

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
       .webpack('app.js');

    mix.sass('html.scss');

    mix.copy('resources/assets/bower/dropzone/dist/min/dropzone.min.css', 'public/css/dropzone.css');

    mix.copy('resources/assets/bower/dropzone/dist/min/dropzone.min.js', 'public/js/dropzone.js');
});
