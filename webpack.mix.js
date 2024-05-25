const mix = require('laravel-mix');

mix.sass('resources/sass/style.scss', 'public/css')
   .js('resources/js/app.js', 'public/js')
   .setPublicPath('public');
