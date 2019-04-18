<?php
require_once __DIR__.'/../vendor/autoload.php';

use App\Router;
use App\Controller\ProductController;

$app = new Router();
$productController = new ProductController;

$app->get('/', function () use ($productController) {
    return $productController->index();
});

$app->run();