<?php
class Keluarga
{
    private $_id;
    private $_name;
    private $_sector;
    private $_address;
    private $_status;
    private $table;
    private $itemPerPageAdmin;

    function __construct(){
        $this->table = "keluarga";
        $this->itemPerPageAdmin = 20;
    }

    function setId($id){ 
        $this->_id = $id;
    }
    
    function getId(){ 
        return $this->_id;
    }
    
    function setName($name){ 
        $this->_name = $name;
    }
    
    function getName(){ 
        return $this->_name;
    }

    function setSector($sector){ 
        $this->_sector = $sector;
    }
    
    function getSector(){ 
        return $this->_sector;
    }

    function setAddress($address){ 
        $this->_address = $address;
    }
    
    function getAddress(){ 
        return $this->_address;
    }

    function setStatus($status){ 
        $this->_status = $status;
    }
    
    function getStatus(){ 
        return $this->_status;
    }
    
//START FUNCTION FOR ADMIN PAGE
    public function check_name($crud, $name){
        $query = "SELECT name FROM $this->table WHERE name = '$name'";
        $result = $crud->getData($query);
        if(!$result){
            return false;
        }
        return is_array($result) ? true : false;
    }

    public function get_all($crud, $page=1){
        //get total data
        $query_total = "SELECT id FROM $this->table";
        $result_total = $crud->getData($query_total);
        $total_data = !$result_total ? 0 : count($result_total);

        //get total page
        $total_page  = ceil($total_data / $this->itemPerPageAdmin);
        $limitBefore = $page <= 1 || $page == null ? 0 : ($page-1) * $this->itemPerPageAdmin;

        $query = "SELECT id, name, sector, status, datetime, timestamp FROM $this->table
            ORDER BY datetime DESC LIMIT $limitBefore, $this->itemPerPageAdmin";
        $result = $crud->getData($query);
        if(!$result){
            return false;
        }else{
            if(is_array($result)){
                $result[0]['total_page'] = $total_page;
                $result[0]['total_data_all'] = $total_data;
                $result[0]['total_data'] = count($result);
            }
        }
        return $result;
    }

    public function get_detail($crud, $id){
        $result = $crud->detail($id, $this->table);
        return !$result ? false : is_array($result) ? $result[0] : false;
    }

    public function insert_data($crud, $keluarga){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");

        $query = "INSERT INTO $this->table (id, name, sector, address, status, datetime, timestamp) 
            VALUES ('$keluarga->_id', '$keluarga->_name', '$keluarga->_sector', '$keluarga->_address', 
            '$keluarga->_status', '$now', '$now')";
        $result = $crud->execute($query);
        return $result;
    }

    public function update_data($crud, $keluarga){
        $query = "UPDATE $this->table SET name = '$keluarga->_name', sector = '$keluarga->_sector',
            address = '$keluarga->_address', status = '$keluarga->_status' WHERE id = '$keluarga->_id'";
        $result = $crud->execute($query);
        return $result;
    }

    public function delete_data($crud, $id){
        $result = $crud->delete($id, $this->table);
        return $result;
    }
//END FUNCTION FOR ADMIN PAGE
}
?>