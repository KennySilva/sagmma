var elixir = require('laravel-elixir');
require('laravel-elixir-vueify');
elixir(function(mix) {
    mix.less('app.less');
    mix.less('admin-lte/AdminLTE.less');
    mix.less('bootstrap/bootstrap.less');
    mix.less('admin-lte/skins/_all-skins.less');


    //--------------------------------------------------------------
    mix.browserify('main.js');

    //--------------------------------------------------------------
    mix.scripts(['front.js'],'public/js/front/front.js');

    //--------------------------------------------------------------
    mix.styles(['app.css'],'public/css/sagmma/app.css');
    mix.styles(['custom.css'], 'public/css/custom/custom.css');
    mix.styles(['front.css'], 'public/css/front/front.css');
    mix.styles(['back.css'], 'public/css/back/back.css');
});
