<?php

// let bootstrap create Dependency Injection container
$container = require __DIR__ . '/app/bootstrap.php';

#$params['fileStackDir'] = realpath(__DIR__ . '/static/filestack');
// run application
$container->getService('application')->run();
