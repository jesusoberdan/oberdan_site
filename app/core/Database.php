<?php

declare(strict_types=1);
namespace App\Core;
use PDO;
use PDOException;
use PDOStatement;

class Database
{

    private PDO $conn;
    private PDOStatement $statement;

    public function __construct(string $connstr, string $user, string $password)
    {
        try{
            $this->conn = new PDO($connstr,$user,$password);
        }
        catch(PDOException $e){
            echo $e->getMessage();
        }
    }


    public function query(string $query):static
    {
        $this->statement = $this->conn->prepare($query);
        
        $this->statement->execute();

        return $this;

    }

    

    public function all():array
    {
        return $this->statement->fetchAll(PDO::FETCH_ASSOC);
    }




}

