<?php

class Database{
    private $db_type = DB_TYPE;
    private $host = DB_HOST;
    private $user = DB_USER;
    private $pass = DB_PASS;
    private $db_name = DB_NAME;

    //database handler & statement
    private $dbh;
    private $stmt;

    //koneksi database dengan PDO
    public function __construct()
    {
        $dsn = $this->db_type.':host='.$this->host.';dbname='.$this->db_name;

        //menjaga koneksi database
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];

        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);

        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    //jalankan query universal
    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    //binding data
    public function bind($param, $value, $type= null)
    {
        if(is_null($type)){
            switch(true){
                case is_int($value):
                    $type = PDO::PARAM_INT;
                    break;
                case is_bool($value):
                    $type = PDO::PARAM_BOOL;
                    break;
                case is_null($value):
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }
        }
        $this->stmt->bindValue($param, $value, $type);
    }

    //exceute query
    public function execute()
    {
        $this->stmt->execute();
    }

    //data banyak
    public function resultSet()
    {
        $this->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    //data tunggal
    public function singleSet()
    {
        $this->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    } 

    //hitung jumlah data
    public function rowCount(){
        return $this->stmt->rowCount();
    }

}