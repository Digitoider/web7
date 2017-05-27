<?php

class DB
{
    protected $dbh;
    private $className;

    public function __construct()
    {
        $dsn = "mysql:dbname=web6;charset=UTF8;host=localhost";
        $username = "root";
        $password = "";
        $this->dbh = new PDO($dsn, $username, $password);

    }

    public function setClassName($className){
        $this->className = $className;
    }

    public function query($sql, $substitutions = []){
        $sth = $this->dbh->prepare($sql);
        $sth->execute($substitutions);
        return $sth->fetchAll(PDO::FETCH_CLASS, $this->className);
    }

    public function execute($sql, $substitutions = []){
        $sth = $this->dbh->prepare($sql);
        return $sth->execute($substitutions);
    }
    public function count($sql){
        $sth = $this->dbh->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }

    public function lastInsertId(){
        return $this->dbh->lastInsertId();
    }
}