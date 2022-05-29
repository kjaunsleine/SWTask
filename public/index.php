<?php
require_once '../app/bootstrap.php';

use App\Controllers\Products;
use App\Core\Core;

$app = new App\Core\Core;

$app->router->get('/', function() {
    $pages = new App\Controllers\Products();
    return $pages->indexPage();
});

$app->router->get('/add', function($request) {
    $pages = new App\Controllers\Products();
    return $pages->addProductPage();
});

$app->router->post('/delete', function($request) {
    $product = new App\Controllers\Products();
    return $product->delete($request->getBody());
});

$app->router->post('/add/fields', function($request) {
    $fields = new App\Controllers\Products();
    return $fields->addFields($request->getBody());
});

$app->router->post('/add/product', function($request) {
    $product = new App\Controllers\Products();
    return $product->add($request->getBody());
});
