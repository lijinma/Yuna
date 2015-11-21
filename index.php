<?php

require 'vendor/autoload.php';


$config = require('config.php');

$app = new \Yuna\Lib\Site($config);

$app->get('/', function() use ($app) {
    $app->setLayout('layout.php')
        ->render('test.php', ['data' => 'this is data']);
});
$app->run();