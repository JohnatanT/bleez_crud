<?php
namespace App\Model;

use App\Database;

class Product
{

    protected $table;
    protected $db;

    public function __construct()
    {
        $this->db = new Database;
        $this->table = 'product';
    }

    public function get()
    {
        return $this->db->select($this->table);
    }

}