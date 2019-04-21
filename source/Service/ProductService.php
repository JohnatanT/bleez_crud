<?php
namespace App\Service;

use App\Model\Product;

class ProductService 
{

    protected $model;

    public function __construct()
    {
        $this->model = new Product;
    }

    public function get()
    {
        return $this->model->get();
    }

}