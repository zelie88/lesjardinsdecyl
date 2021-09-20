var elixir = require('laravel-elixir');
require('laravel-elixir-livereload');

elixir.config.assetsPath = 'themes/lovata-bootstrap-shopaholic/assets/';
elixir.config.publicPath = 'themes/lovata-bootstrap-shopaholic/assets/compiled/';

elixir(function(mix) {

    mix.sass('style.css');

    mix.scripts([
        'jquery.js',
        'app.js'
    ]);
})