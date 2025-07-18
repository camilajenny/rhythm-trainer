// webpack.mix.js (in the root)
const mix = require('laravel-mix');
const glob = require('glob');

glob.sync('./resources/sass/**/*.scss').forEach(file => {
    mix.sass(file, 'public/css')
        .sourceMaps();
});
