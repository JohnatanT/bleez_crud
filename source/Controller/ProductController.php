<?php
namespace App\Controller;

use App\Service\ProductService;

final class ProductController extends Controller
 {

    public function index() 
    {
        $products = (new ProductService)->get();
    
        return self::view('index', ['products' => $products]);
    }

    public function store()
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $photo = $_FILES["photo"];

        $data = ['name' => $name, 'price' => $price, 'description' => $description, 'photo' => $photo];
       
        if ($products = (new ProductService)->store($data)) {
            return $this->index();
        }   

        die('Houve um erro no cadastro');
        
    }

}