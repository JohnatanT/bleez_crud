<?php
require_once __DIR__.'/../vendor/autoload.php';
use App\Router;
$app = new Router();
$app->get('/', function () {
    return \App\Controller\ProductController::index();
});
// $app->get('/list', function () {
//     return \App\Controller\ProductController::list();
// });
// $app->post('/list', function () {
//     return \App\Controller\ProductController::write();
// });
// $app->get('/out', function () {
//     return \App\Controller\ProductController::logout();
// });
$app->run();