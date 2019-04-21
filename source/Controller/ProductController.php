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

    public function edit() 
    {
        $id = $_POST['edit_id'];
        $product = (new ProductService)->find($id);

        return self::view('edit', ['product' => $product]);
    }

    public function update()
    {
        $name = $_POST['name'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $id = $_POST['id'];
        $photo = $_FILES["photo"];

        $data = ['id' => $id, 'name' => $name, 'price' => $price, 'description' => $description, 'photo' => $photo];

        if ($products = (new ProductService)->update($data)) {
            return $this->index();
        }   

        die('Houve um erro no update');
    }

    public function delete() 
    {
        $id = $_POST['delete_id'];
        if ($products = (new ProductService)->delete($id)) {
            return $this->index();
        }  

        die('Houve um erro em deletar');
    }

}