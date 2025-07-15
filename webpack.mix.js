// webpack.mix.js (in the root)
const mix = require('laravel-mix');

mix.sass('./resources/sass/tempo-bar.scss', 'public/css/tempo-bar.css')
    .sourceMaps();
