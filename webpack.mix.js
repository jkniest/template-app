const mix = require('laravel-mix');
require('laravel-mix-tailwind');

mix.ts('resources/ts/app.ts', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .tailwind('tailwind.config.js')
    .extract();

if (mix.inProduction()) {
    mix.version();
}
