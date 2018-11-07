<?php
class Jemaat
{
    private $_id;
    private $_keluarga_id;
    private $_first_name;
    private $_middle_name;
    private $_last_name;
    private $_gender;
    private $_birthday;
    private $_phone1;
    private $_phone2;
    private $_phone3;
    private $_notes;
    private $_status;
    private $table;
    private $joinKeluarga;
    private $itemPerPageAdmin;

    function __construct(){
        $this->table = "jemaat";
        $this->joinKeluarga = "LEFT JOIN keluarga keluarga ON keluarga.id = jemaat.keluarga_id";
        $this->itemPerPageAdmin = 20;
    }

    function setId($id){ 
        $this->_id = $id;
    }
    
    function getId(){ 
        return $this->_id;
    }

    function setKeluargaId($keluarga_id){ 
        $this->_keluarga_id = $keluarga_id;
    }
    
    function getKeluargaId(){ 
        return $this->_keluarga_id;
    }
    
    function setFirstName($first_name){ 
        $this->_first_name = $first_name;
    }
    
    function getFirstName(){ 
        return $this->_first_name;
    }

    function setMiddleName($middle_name){ 
        $this->_middle_name = $middle_name;
    }
    
    function getMiddleName(){ 
        return $this->_middle_name;
    }

    function setLastName($last_name){ 
        $this->_last_name = $last_name;
    }
    
    function getLastName(){ 
        return $this->_last_name;
    }

    function setGender($gender){ 
        $this->_gender = $gender;
    }
    
    function getGender(){ 
        return $this->_gender;
    }

    function setBirthday($birthday){ 
        $this->_birthday = $birthday;
    }
    
    function getBirthday(){ 
        return $this->_birthday;
    }

    function setPhone1($phone1){ 
        $this->_phone1 = $phone1;
    }
    
    function getPhone1(){ 
        return $this->_phone1;
    }

    function setPhone2($phone2){ 
        $this->_phone2 = $phone2;
    }
    
    function getPhone2(){ 
        return $this->_phone2;
    }

    function setPhone3($phone3){ 
        $this->_phone3 = $phone3;
    }
    
    function getPhone3(){ 
        return $this->_phone3;
    }

    function setNotes($notes){ 
        $this->_notes = $notes;
    }
    
    function getNotes(){ 
        return $this->_notes;
    }

    function setStatus($status){ 
        $this->_status = $status;
    }
    
    function getStatus(){ 
        return $this->_status;
    }
    
//START FUNCTION FOR ADMIN PAGE
    /*public function check_name($crud, $name){
        $query = "SELECT name FROM $this->table WHERE name = '$name'";
        $result = $crud->getData($query);
        if(!$result){
            return false;
        }
        return is_array($result) ? true : false;
    }*/

    public function get_all($crud, $page=1){
        return false;
        /*//get total data
        $query_total = "SELECT id FROM $this->table";
        $result_total = $crud->getData($query_total);
        $total_data = !$result_total ? 0 : count($result_total);

        //get total page
        $total_page  = ceil($total_data / $this->itemPerPageAdmin);
        $limitBefore = $page <= 1 || $page == null ? 0 : ($page-1) * $this->itemPerPageAdmin;

        $query = "SELECT jemaat.id, CONCAT(jemaat.first_name, jemaat.middle_name) AS name, jemaat.last_name, 
            jemaat.gender, jemaat.birthday, jemaat.phone1, jemaat.status, keluarga.name AS keluarga_name, 
            keluarga.sector AS sector jemaat.datetime, jemaat.timestamp FROM $this->table jemaat 
            $this->joinKeluarga ORDER BY jemaat.datetime DESC LIMIT $limitBefore, $this->itemPerPageAdmin";
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
        return $result;*/
    }

    /*public function get_detail($crud, $id){
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
    }*/
//END FUNCTION FOR ADMIN PAGE
}
?>