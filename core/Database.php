<?php

namespace Core;

class Database
{

    private $pdo;
    private $sql = '';

    public function connect(){
        $pdo = null;
        try {
            $pdo = new \PDO('mysql:host=127.0.0.1;dbname=pdo2', 'newuser', 'password');

        } catch (PDOException $e) {
            print "Error!: " . $e->getMessage() . "<br/>";
        }

        $this->pdo =  $pdo;
    }

    public function select($fields = '*'){
        $this->sql .= 'SELECT '.$fields;
        return $this;
    }

    public function from($table){
        $this->sql .= ' FROM '.$table;
        return $this;
    }
    public function where($field, $value){
        $this->sql .= ' WHERE '.$field.' = '."'$value'";
        return $this;
    }

    public function insert($tableName, $columns, $values){
        $this->sql .= "INSERT INTO $tableName ($columns) VALUES ($values)";

    }
    public function update($tableName, $setContent){
        $this->sql .= "UPDATE $tableName SET $setContent";
        return $this;
    }

    public function andWhere($field, $value){
        $this->sql .= " AND $field = '$value'";
    }

    public function delete(){

    }


    public function execute(){
        $this->connect();
        $sql = $this->sql;
        print_r($sql);
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute();
        $this->sql = '';
        return $stmt;
    }

    public function getAll(){
        $stmt = $this->execute();
        $data = [];
        while($row = $stmt->fetchObject()){
            $data[] = $row;
        }

        return $data;

    }

    public function get(){
        $stmt = $this->execute();
        return $stmt->fetchObject();
    }
}


