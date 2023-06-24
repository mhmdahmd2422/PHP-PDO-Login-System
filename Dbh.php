<?php

class Dbh
{
    private string $host = 'localhost';
    private string $user = 'root';
    private string $pwd = '';
    private string $dbName = 'loginsys';

    protected function connect(){
        try {
            $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->dbName;
            $pdo = new PDO($dsn, $this->user, $this->pwd);
            $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            return $pdo;
        } catch (PDOException $PDOException){
            echo 'Error!!: ' . $PDOException->getMessage() . '<br>';
            die();
        }

    }

}