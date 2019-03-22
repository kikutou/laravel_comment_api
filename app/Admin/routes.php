<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
<<<<<<< HEAD

});
=======
    $router->resource('sites', SiteController::class);

});


>>>>>>> d5be1faefaa45c87249b11be9e3137e99105359a
