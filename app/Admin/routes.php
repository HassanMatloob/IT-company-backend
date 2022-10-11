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
    $router->resource('settings', SettingsController::class);
    $router->resource('nav-items', NavItemsController::class);
    $router->resource('services-cards', ServicesCardsController::class);
    $router->resource('teravision-nodes', TeravisionNodeController::class);
    $router->resource('testmonials', TestmonialsController::class);
    $router->resource('useful-links', UsefulLinksController::class);
    $router->resource('our-services-links', OurServicesLinksController::class);
    $router->resource('portfolios', PortfolioController::class);
    $router->resource('portfolio-tech-tags', PortfolioTechTagController::class);
    $router->resource('careers', CareerController::class);
    $router->resource('career-tech-tags', CareerTechTagController::class);
    $router->resource('messages', MessagesController::class);
}); 
