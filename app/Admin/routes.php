<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
    'as'            => config('admin.route.prefix') . '.',
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('home');
    $router->resource('users', UsersController::class);
    $router->resource('consume', ConsumeController::class);
    $router->resource('consume_type', ConsumeTypeController::class);
    $router->get('charjsBor', 'ConsumeController@ajaxChartJsBorRequest');
    $router->get('/api/consumeTypeList','ApiController@ConsumeTypeList');
});

