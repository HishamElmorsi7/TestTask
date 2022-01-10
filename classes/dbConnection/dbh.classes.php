<?php

class Dbh {
    // Database handler attributes
    private $host = "localhost";
    private $name = "id18252991_hishamelmorsi";
    private $pwd = "lplhjs890098##*H";
    private $dbname = "id18252991_products";

    public function connect() {
        $dns = "mysql:host=" . $this->host . ";dbname=" . $this->dbname;

        //Checking the connection and raising an error if the connection failed
        try {
            $pdo = new PDO($dns, $this->name, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } 
        catch(PDOException $e){
            echo "Error: ". $e->getMessage();
            die();
        }

    }
}

