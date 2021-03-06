const elixir = require('laravel-elixir');

require('laravel-elixir-vue-2');

const jquery = require( 'jquery' );
const datatables = require( 'datatables.net' );

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for your application as well as publishing vendor resources.
 |
 */

elixir((mix) => {
    mix.sass('app.scss')
       .webpack('app.js')
       .scripts('main.js')
       .scripts(['datepicker.js','autofill.js'])
       .styles('../../../node_modules/element-ui/lib/theme-default/index.css','public/assets/index.css')
});
