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

    public function data($table, $query){
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

    public function detail($table, $id){
        try {
            $filter = [
                'id' => $id
            ];
            $options = [
                'projection' => [
                    '_id' => 0
                ],
                'limit' => 1
            ]; 
            $query = new MongoDB\Driver\Query($filter, $options);
            $cursor = $this->connection->executeQuery($this->database.".".$table, $query);
            $cursor->setTypeMap(array('document' => 'array'));
            $result = $cursor->toArray();
            $result = current($result);
            return $result;
        } catch (Throwable $t) {
            echo "Error: ".$t->getMessage();
        }
    }

    public function insert($table, $bulk){
        try {
            $result = $this->connection->executeBulkWrite($this->database.".".$table, $bulk);
            return $result->getInsertedCount() >= 1 ? true : false;
        } catch (Throwable $t) {
            echo "Error: ".$t->getMessage();
        }
    }

    public function update($table, $bulk){
        try {
            $result = $this->connection->executeBulkWrite($this->database.".".$table, $bulk);
            return $result->getModifiedCount() >= 1 ? true : false;
        } catch (Throwable $t) {
            echo "Error: ".$t->getMessage();
        }
    }

    public function delete($table, $bulk){
        try {
            $result = $this->connection->executeBulkWrite($this->database.".".$table, $bulk);
            return $result->getDeletedCount() >= 1 ? true : false;
        } catch (Throwable $t) {
            echo "Error: ".$t->getMessage();
        }
    }

    public function deleteById($table, $id){
        try {
            $bulk = new MongoDB\Driver\BulkWrite;
            $bulk->delete(['id' => $id]);
            $result = $this->connection->executeBulkWrite($this->database.".".$table, $bulk);
            return $result->getDeletedCount() >= 1 ? true : false;
        } catch (Throwable $t) {
            echo "Error: ".$t->getMessage();
        }
    }
}
?>