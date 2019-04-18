<?php
namespace App;

class Database{

    private $instance;
    
    public function select($table, array $columns = [])
    {
        $query = "SELECT ";

        if (! empty($columns)) {
            foreach ($columns as $key => $column) {
                $query = $query . $column . ", ";
            }

            return $this->prepare($query);
        }
        
        $query = "SELECT * FROM {$table};";

        return $this->prepare($query, true);
    }

    private function prepare($query, $select = false)
    {
        $instance = new \PDO('mysql:host=172.27.0.3;dbname=bleez', 'root', 'bleez');
        $p_sql = $instance->prepare($query);

        if (! $select){
            return $p_sql->execute();
        }
        $p_sql->execute();

        return $p_sql->fetchAll(\PDO::FETCH_OBJ);
    }

}