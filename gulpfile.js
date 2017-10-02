
var elixir = require('laravel-elixir');

require('laravel-elixir-browserify-official');
require('laravel-elixir-vueify');

elixir(function(mix) {
    mix.sass('app.scss');
    mix.sass('admin.scss');
    mix.browserify('main.js');
    mix.browserify('front.js');
});



