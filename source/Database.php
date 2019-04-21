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

    private function prepare($query = null, $select = false)
    {
        try {
            $instance = new \PDO('mysql:host='. $this->host .';dbname='.$this->database.'', ''.$this->user.'', ''.$this->password.'');
            
            if (! $select){
                return $instance;
            }

            $p_sql = $instance->prepare($query);

            $p_sql->execute();

            return $p_sql->fetchAll(\PDO::FETCH_OBJ);
        } catch (\PDOException $th) {
           return $th->getMessage();
        }
        
    }

    public function insert($table, array $data = [])
    {
        try {
            $sql = "INSERT INTO {$table} ( ";      

            $x = count($data);
            $i = 0;
            foreach ($data as $key => $value) {
                $i++;
                if ($i == $x) {
                    $sql = $sql . $key;
                } else {
                    $sql = $sql . $key . ', ';
                }
                    
            }
            $sql = $sql . ') VALUES (';

            $x = count($data);
            $i = 0;
            foreach ($data as $key => $value) {
                $i++;
                if ($i == $x) {
                    $sql = $sql . ':' . $key;
                } else {
                    $sql = $sql . ':' . $key . ', ';
                }
                    
            }
            $sql = $sql . ')';

            $cn = $this->prepare();
            $stmt = $cn->prepare($sql);
            foreach ($data as $key => $value) {
                $stmt->bindValue(":{$key}", $value);
                
            }

            return $stmt->execute($dados);
        } catch (Exception $e) {
            
        }
    }

}