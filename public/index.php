<?php

/**
 * Silex Skeleton App version 0.1.0
 * https://github.com/Ardakilic/silex-skeleton-app
 * Arda Kilicdagi <arda@kilicdagi.com>
 */

require_once __DIR__ . '/../bootstrap.php';

use App\Models\Foo;

//Closure route example:
$app->get('eloquent', function () use ($app) {

    dump(Foo::all());

    return 'bar';
});

//Calling a method from Controller example:
$app->get('foo', 'foo.controller:bar');

$app->run();