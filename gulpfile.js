
var elixir = require('laravel-elixir');

require('laravel-elixir-browserify-official');
require('laravel-elixir-vueify');

elixir(function(mix) {
    mix.browserify('main.js');
});



