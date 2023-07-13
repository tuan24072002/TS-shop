<?php
class Database
{
    protected $db_host;
    protected $db_name;
    protected $db_user;
    protected $db_pass;
    protected $db_port;
    public function __construct($host,$name,$user,$pass,$port)
    {
        $this->db_host=$host;
        $this->db_name=$name;
        $this->db_user=$user;
        $this->db_pass=$pass;
        $this->db_port=$port;
    }
    public function connectDB()
    {
        $dsn = "mysql:host={$this->db_host};port={$this->db_port};dbname={$this->db_name};charset=UTF8";
        try {
            $pdo = new PDO($dsn, $this->db_user, $this->db_pass);
            return $pdo;
        } catch (PDOException $ex) {
            echo $ex->getMessage();
            exit;
        }
    }
}