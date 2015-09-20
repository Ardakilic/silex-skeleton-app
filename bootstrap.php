<?php

/**
 * Silex Skeleton App version 0.1.0
 * https://github.com/Ardakilic/silex-skeleton-app
 * Arda Kilicdagi <arda@kilicdagi.com>
 */

require_once __DIR__ . '/vendor/autoload.php';

use Silex\Application;
use Symfony\Component\Yaml\Yaml;
use Illuminate\Database\Capsule\Manager as Capsule;
use GuzzleHttp\Client;

//Create the Silex instance
$app = new Application();
//Enable debugging
$app['debug'] = true;

//Enable whoops Service provider to handle errors
if ($app['debug']) {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');

    //Make sure class exists,
    //because this is a dev-dependency and may not be installed
    if (class_exists('Whoops\\Provider\\Silex\\WhoopsServiceProvider')) {
        $app->register(new Whoops\Provider\Silex\WhoopsServiceProvider());
    }
}

//Loading the configuration file
$app['config'] = $app->share(function () {
    return Yaml::parse(file_get_contents(__DIR__ . '/app/config.yml'));
});

//This is for proper time handling:
date_default_timezone_set($app['config']['settings']['timezone']);

$app['clients.trakt'] = $app->share(function () use ($app) {
    //Fill with your default parameters such as base_uri etc. of course
    return new Client();
});

$app['db'] = $app->share(function () use ($app) {

    //Set up Fluent Query Builder..
    $capsule = new Capsule;
    $capsule->addConnection(
        $app['config']['database']['connections'][$app['config']['database']['connection']]
    );
    return $capsule;

});

//These two have to be outside closure
// Make the Capsule instance available globally via static methods...
$app['db']->setAsGlobal();
// Setup the Eloquent ORM...
$app['db']->bootEloquent();

//Register the controllers:
//Registering the controller service provider
$app->register(new Silex\Provider\ServiceControllerServiceProvider());
$app['foo.controller'] = $app->share(function () use ($app) {
    return new App\Controllers\FooController;
});