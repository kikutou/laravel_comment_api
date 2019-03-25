<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resource('sites', SiteController::class);
    $router->resource('topics', TopicController::class);
    $router->resource('items', ItemController::class);
    $router->resource('comments', CommentController::class);
    $router->resource('grades', GradeController::class);

});

