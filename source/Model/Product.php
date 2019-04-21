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

    public function create(array $data)
    {
        return $this->db->insert($this->table, $data);
    }

    public function find($id)
    {
        return $this->db->selectById($this->table, $id);
    }

    public function update(array $data)
    {
        $id = $data['id'];
        unset($data['id']);
        return $this->db->update($this->table, $data, $id);
    }

}