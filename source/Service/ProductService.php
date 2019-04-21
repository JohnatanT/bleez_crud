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

    public function store(array $data)
    {
        $photo = [];
        $errors = [];
        $types = [
            'image/gif',
            'image/jpeg',
            'image/png',
        ];

        if (! in_array($data['photo']['type'], $types)) {
            $errors[] = "Tipo da Imagem não aceita! <br>";
        }

        if (! empty($errors)) {
            return false;
        }

        switch ($data['photo']['type']) {
            case 'image/gif':
                $photo['type'] = 'gif';
                break;
            case 'image/jpeg':
                $photo['type'] = 'jpeg';
                break;
            case 'image/png':
                $photo['type'] = 'png';
                break;
        }

         $photo['name'] = md5(uniqid(time())) . '.' . $photo['type'];
         $dir =  $_SERVER['DOCUMENT_ROOT'] . "/img/" .$photo['name'];

         move_uploaded_file($data['photo']['tmp_name'], $dir);

         return $this->model->create([
            'name' => $data['name'],
            'price' => (int) $data['price'],
            'description' =>  $data['description'],
            'image_name' => $photo['name']
        ]);

    }

    public function find($id)
    {
        return $this->model->find($id);
    }

    public function update(array $data)
    {
        $photo = [];
        $errors = [];
        $photo['name'] = null;

        $types = [
            'image/gif',
            'image/jpeg',
            'image/png',
        ];

        if($data['photo']) {
            if (! in_array($data['photo']['type'], $types)) {
                $errors[] = "Tipo da Imagem não aceita! <br>";
            }

            switch ($data['photo']['type']) {
                case 'image/gif':
                    $photo['type'] = 'gif';
                    break;
                case 'image/jpeg':
                    $photo['type'] = 'jpeg';
                    break;
                case 'image/png':
                    $photo['type'] = 'png';
                    break;
            }
    
             $photo['name'] = md5(uniqid(time())) . '.' . $photo['type'];
             $dir =  $_SERVER['DOCUMENT_ROOT'] . "/img/" .$photo['name'];
    
             move_uploaded_file($data['photo']['tmp_name'], $dir);
        }

        if (! empty($errors)) {
            return false;
        }

        if ($photo['name']) {
            return $this->model->update([
                'id' => $data['id'],
                'name' => $data['name'],
                'price' => (int) $data['price'],
                'description' =>  $data['description'],
                'image_name' => $photo['name']
            ]);
        }

        return $this->model->update([
            'id' => $data['id'],
            'name' => $data['name'],
            'price' => (int) $data['price'],
            'description' =>  $data['description']
        ]);

         
    }

}