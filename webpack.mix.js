const mix = require('laravel-mix');
require('laravel-mix-tailwind');
const path = require('path');

mix.ts('resources/ts/app.ts', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .tailwind('tailwind.config.js')
    .webpackConfig({
        output: {
            chunkFilename: 'js/[name].js?id=[chunkhash]'
        },
        resolve: {
            alias: {
                vue$: 'vue/dist/vue.runtime.esm.js',
                '@': path.resolve('resources/ts')
            }
        }
    });

if (mix.inProduction()) {
    mix.version();
}
