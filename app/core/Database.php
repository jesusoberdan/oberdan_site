<?php

class Database
{

    private PDO $conn;

    public function __construct(string $connstr)
    {
        try{
            $this->conn = new PDO($connstr);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }


    public function get(string $query): PDOStatement
    {
        return $this->conn->prepare($query);
    }


}

