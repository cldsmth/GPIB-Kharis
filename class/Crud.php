<?php
include_once("Database.php");
 
class Crud extends Database
{
    public function __construct(){
        parent::__construct();
    }

    public function conn(){
        return $this->connection;
    }

    public function count($query){
        $result = $this->connection->query($query);
        return $result ? $result->num_rows : 0;
    }
    
    public function getData($query){        
        $result = $this->connection->query($query);
        if($result == false){
            return false;
        }
        $rows = array();
        while($row = $result->fetch_assoc()){
            $rows[] = $row;
        }
        return $rows;
    }

    public function getById($query){
        $result = $this->connection->query($query);
        if($result == false){
            return false;
        }
        $rows = array();
        $rows = $result->fetch_assoc();
        return $rows;
    }
        
    public function execute($query){
        $result = $this->connection->query($query);
        if($result == false){
            return false;
        }else{
            return true;
        }        
    }

    public function detail($id, $table){
        $query = "SELECT * FROM $table WHERE id = '$id'";
        $result = $this->getData($query);
        return $result;
    }

    public function delete($id, $table){ 
        $query = "DELETE FROM $table WHERE id = '$id'";
        $result = $this->connection->query($query);
        if($result == false){
            return false;
        }else{
            return true;
        }
    }

    public function escape_string($value){
        return $this->connection->real_escape_string($value);
    }
}
?>