<?php

namespace App\Application;

use \Dotenv\Dotenv;

class Database
{
    /** @var PDO */
    private $pdo;

    /** @var PDO_STATEMENT */
    private $stmt;

    public function __construct()
    {
        $this->init();
    }
    public function init()
    {
        $dotenv = \Dotenv\Dotenv::create('../');
        $dotenv->load();
        // var_dump($dotenv);
        try 
        {
            // BASIC CONNECT
            // $this->pdo = new \PDO('mysql:host=localhost;dbname=dashboardJudo', 'root', 'online@2017');
            $this->pdo = new \PDO('mysql:host='.getenv('HOSTNAME').';dbname='.getenv('DBNAME'), getenv('USER'), getenv('PASSWORD'));
            // PERSISTENT CONNECT
            // $this->pdo = new \PDO('mysql:host='.getenv('HOSTNAME').';dbname='.getenv('DBNAME'), getenv('USER'), getenv('PASSWORD'), array(PDO::ATTR_PERSISTENT => true));
            // $stmt = $this->pdo->prepare('select * from user');
            // var_dump($this->pdo);
        }
        catch(Exception $e)
        {
            die('Erreur : '.$e->getMessage());
        }
    }

    protected function prepare($sql) { $this->stmt = $this->pdo->prepare($sql); }
    protected function bindParam($param, $var, $type) { $this->stmt->bindParam($param, $var, $type); }
    protected function execute() { $this->stmt->execute(); }
    protected function fetchAll() { return $this->stmt->fetchAll(\PDO::FETCH_ASSOC); }
    protected function fetch() { return $this->stmt->fetch(\PDO::FETCH_ASSOC); }
}