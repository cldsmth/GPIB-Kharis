<?php
class Crud
{
    private $database;
    private $connection;

    function __construct(){
        $this->database = "gpib";
        if(!isset($this->connection)){
            $this->connection = new MongoDB\Driver\Manager("mongodb://localhost:27017");
            if(!$this->connection){
                echo "Cannot connect to database server mongodb";
                exit;
            }
        }
    }
    
    public function getData($table, $query){
        try {
            $result = $this->connection->executeQuery($this->database.".".$table, $query);
            if(!$result){
                return false;
            }
            $rows = array();
            foreach($result as $data){
                $rows[] = $data;
            }
            return $rows;   
        } catch (Throwable $t) {
            echo "Error: ".$t->getMessage();
        }
    }

    public function count($command){
        try {
            $result = $this->connection->executeCommand($this->database, $command);
            $res = current($result->toArray());
            $count = $res->n;
            return $count;
        } catch (Throwable $t) {
            echo "Error: ".$t->getMessage();
        }
    }
        
    /*public function execute($query){
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
    }*/
}
?>