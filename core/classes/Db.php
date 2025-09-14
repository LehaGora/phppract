<?php

class Db
{

    private $conn;

    public function __construct(array $db_config)
    {
        try {
            $this->conn = new PDO(
                "mysql:host={$db_config['host']};dbname={$db_config['dbname']};charset={$db_config['charset']}", 
                $db_config['username'], 
                $db_config['password'], 
                $db_config['options']
            );
        } catch (PDOException $e) {
            //echo "DB Error: {$e->getMessage()}";
            abort(500);
        }
    }

    public function query($query)
    {
        $stmt = $this->conn->prepare($query);
        $stmt->execute();
        return $stmt;
    }

    public function query_noexecute($query)
    {
        $stmt = $this->conn->prepare($query);
        return $stmt;
    }
    
}