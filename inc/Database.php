<?php

class Database {
    public $host = "localhost";
    public $user = "root";
    public $pass = "";
    public $data = "inventorydb";

    public $link;
    public $error;

    public function __construct()
    {
        $this->connectDataBase();
    }

    public function connectDataBase()
    {
        $this->link = new MySqli($this->host, $this->user, $this->pass, $this->data) or die("you are not allowed");
        if(!$this->link){
            $this->error = "Connection Faild". $this->link->connect_error;
        }
    }

    public function select($query)
    {
        $select = $this->link->query( $query ) or $this->link->error.__line__; 
        if( $select ){
            return $select;
        }
    }
    public function insert($query)
    {
        $insert = $this->link->query( $query ) or $this->link->error.__line__; 
        if( $insert ){
            return $insert;
        }
    }
    public function update($query)
    {
        $update = $this->link->query( $query ) or $this->link->error.__line__; 
        if( $update ){
            return $update;
        }
    }
    public function delete($query)
    {
        $delete = $this->link->query( $query ) or $this->link->error.__line__; 
        if( $delete ){
            return $delete;
        }
    }


}