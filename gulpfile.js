var elixir = require('laravel-elixir');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir(function (mix) {
    mix
        .sass('app.scss')
        .browserify('app.js')
        .scripts([
            'resources/assets/js'
        ])
        .copy(
            'node_modules/font-awesome/fonts',
            'public/build/fonts'
        )
        .version([
            'css/all.css',
            'css/app.css',
            'js/app.js'
        ])
        .browserSync({
            proxy: 'curmo.app'
        });

    //mix.phpUnit();
});