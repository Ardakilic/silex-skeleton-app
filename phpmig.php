<?php

/**
 * Silex Skeleton App version 0.1.0
 * https://github.com/Ardakilic/silex-skeleton-app
 * Arda Kilicdagi <arda@kilicdagi.com>
 */

use \Phpmig\Adapter;

use Illuminate\Database\Capsule\Manager as Capsule;

//This is needed for configuration credentials
require __DIR__ . '/bootstrap.php';


$app['phpmig.adapter'] = $app->share(function () use ($app) {
    return new Adapter\Illuminate\Database($app['db'], 'migrations');
});

$app['phpmig.migrations_path'] = function () {
    return __DIR__ . '/app/Database/migrations';
};

//I can run this directly, because Capsule is set as globally
//with $capsule->setAsGlobal(); line at /bootstrap.php
$app['schema'] = $app->share(function () {
    return Capsule::schema();
});

return $app;