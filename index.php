<?php

require 'vendor/autoload.php';


$config = require('config.php');

$app = new \Yuna\Lib\Site($config);

$app->get('/', function() use ($app) {
    $app->render('test.php', []);
});
$app->run();