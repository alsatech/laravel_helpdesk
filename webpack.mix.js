const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')  // Compilar SCSS en lugar de PostCSS
   .options({
       processCssUrls: false
   });
