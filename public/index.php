<?php
require_once __DIR__.'/../vendor/autoload.php';

use App\Router;
use App\Controller\ProductController;

$app = new Router();
$productController = new ProductController;

$app->get('/', function () use ($productController) {
    return $productController->index();
});

$app->post('/create', function () use ($productController) {
    return $productController->store();
});

$app->post('/edit', function () use ($productController) {
    return $productController->edit();
});

$app->post('/update', function () use ($productController) {
    return $productController->update();
});

$app->post('/delete', function () use ($productController) {
    return $productController->delete();
});

$app->run();