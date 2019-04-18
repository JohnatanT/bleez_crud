<?php
namespace App\Controller;

use App\Service\ProductService;

final class ProductController extends Controller {

    public function index() 
    {
        $products = (new ProductService)->get();
    
        return self::view('index', ['products' => $products]);
    }

}