<?php
class Database
{	
	private $_username = "root";
	private $_password = "";
	private $_hostname = "localhost";
	private $_database = "cldsmth_gpib";
    
    protected $connection;
    
    public function __construct(){
        if(!isset($this->connection)){
            $this->connection = new mysqli($this->_hostname, $this->_username, $this->_password, $this->_database);
            if(!$this->connection){
                echo "Cannot connect to database server";
                exit;
            }            
        }    
        return $this->connection;
    }
}
?>