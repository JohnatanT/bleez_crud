<?php
namespace App;

class Database
{

    private $instance;
    private $host;
    private $user;
    private $password;
    private $database;

    public function __construct()
    {
        $this->host = '172.27.0.3';
        $this->user = 'root';
        $this->password = 'bleez';
        $this->database = 'bleez';
    }

    public function select($table, array $columns = [])
    {
        $query = "SELECT ";

        if (! empty($columns)) {
            $i = 0;
            $total = count($columns);

            foreach ($columns as $key => $column) {
                $i++;

                if ($i == $total) {
                    $query = $query . '`' . $column . '`';
                } else {
                    $query = $query . '`' .$column . '`' . ", ";
                }
            }
            $query = $query . " FROM {$table};";

            return $this->prepare($query, true);
        }
        
        $query = "SELECT * FROM {$table};";

        return $this->prepare($query, true);
    }

    private function prepare($query, $select = false)
    {
        try {
            $instance = new \PDO('mysql:host='. $this->host .';dbname='.$this->database.'', ''.$this->user.'', ''.$this->password.'');
            $p_sql = $instance->prepare($query);

            if (! $select){
                return $p_sql->execute();
            }
            $p_sql->execute();

            return $p_sql->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $th) {
           return $th->getMessage();
        }
        
    }

}