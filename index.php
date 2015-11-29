<?php

require 'vendor/autoload.php';


$config = require('config.php');

$app = new \Yuna\Lib\Site($config);

$app->add(new \Slim\Middleware\HttpBasicAuthentication([
    "path" => "/admin",
    "realm" => "Protected",
    "users" => [
        "lijinma" => "lijinma",
    ]
]));

$app->get('/', function () use ($app) {
    $app->setLayout('layout.php')
        ->render('index.php', ['data' => 'this is data']);
});

$app->get('/admin/post', function () use ($app) {
    $app->setLayout('adminLayout.php')
        ->render('admin.php');
});

$app->post('/admin/post', function () use ($app) {
    var_dump($app->request());
});

$app->get(':name', function () use ($app) {
    $app->setLayout('layout.php')
        ->render('post.php', ['data' => 'this is data']);
});


$app->run();