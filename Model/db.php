<?php

class Database
{

    private static $instance = null;
    private $host;
    private $dbname;
    private $user;
    private $pass;
    private $connexion;

    private function __construct($host, $dbname, $user, $pass)
    {
        $this->host = $host;
        $this->dbname = $dbname;
        $this->user = $user;
        $this->pass = $pass;
    }

    public static function getInstance($host, $dbname, $user, $pass)
    {
        if (self::$instance === null) {
            self::$instance = new Database($host, $dbname, $user, $pass);
        }
        return self::$instance;
    }

    public function connect()
    {
        try {

            $ser = "mysql:host=$this->host;dbname=$this->dbname";
            $this->connexion = new PDO($ser, $this->user, $this->pass);
            return $this->connexion;
        } catch (PDOException $e) {
            die("Echec de la connexion à la base de données " . $e->getMessage());
        }
    }
}

$db = Database::getInstance('localhost', 'contacts', 'root', '');
$connexion = $db->connect();

