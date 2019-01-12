<?php
class Jemaat
{
    private $_id;
    private $_keluarga_id;
    private $_first_name;
    private $_middle_name;
    private $_last_name;
    private $_full_name;
    private $_gender;
    private $_birthday;
    private $_age;
    private $_phone1;
    private $_phone2;
    private $_phone3;
    private $_notes;
    private $_married;
    private $_status;
    private $table;
    private $tableKeluarga;
    private $joinKeluarga;
    private $itemPerPageAdmin;

    function __construct(){
        $this->table = "jemaat";
        $this->joinKeluarga = "LEFT JOIN keluarga k ON k.id = j.keluarga_id";
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

    function setFullName($full_name){ 
        $this->_full_name = $full_name;
    }
    
    function getFullName(){ 
        return $this->_full_name;
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

    function setAge($age){ 
        $this->_age = $age;
    }
    
    function getAge(){ 
        return $this->_age;
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

    function setMarried($married){ 
        $this->_married = $married;
    }
    
    function getMarried(){ 
        return $this->_married;
    }

    function setStatus($status){ 
        $this->_status = $status;
    }
    
    function getStatus(){ 
        return $this->_status;
    }
    
//START FUNCTION FOR ADMIN PAGE
    public function get_count_by_keluarga($crud, $keluarga_id){
        $query = "SELECT id FROM $this->table WHERE id = '$keluarga_id'";
        $result = $crud->count($query);
        return $result;
    }

    public function check_name($crud, $name){
        $query = "SELECT full_name FROM $this->table WHERE full_name = '$name'";
        $result = $crud->getData($query);
        if(!$result){
            return false;
        }
        return is_array($result) ? true : false;
    }

    public function get_all($crud, $page=1, $keyword, $sector, $pelkat, $gender, $married, $status){
        $condKeyword = "";
        if($keyword != ""){
            $keywords = explode(" ", $keyword);
            if(is_array($keywords)){
                $q_string = "";
                $last_index = intval(count($keywords)) - 1;
                for($i = 0; $i < count($keywords); $i++){
                    $q_string = $q_string . "j.full_name LIKE '%".$keywords[$i]."%' OR
                        k.name LIKE '%".$keywords[$i]."%' OR j.phone1 LIKE '%".$keywords[$i]."%' OR
                        j.phone2 LIKE '%".$keywords[$i]."%' OR j.phone3 LIKE '%".$keywords[$i]."%' OR
                        k.address LIKE '%".$keywords[$i]."%'";
                    if($i != $last_index){
                      $q_string = $q_string . " OR ";
                    }
                }
                $condKeyword = "AND (".$q_string.")";
            }
        }
        $condSector = "";
        if($sector != ""){
            $condSector = "AND k.sector = '$sector'";
        }
        $condPelkat = "";
        if($pelkat != ""){
            if($pelkat == "pa"){
                $condPelkat = "HAVING age BETWEEN 0 AND 11 AND j.married = 0";
            }else if($pelkat == "pt"){
                $condPelkat = "HAVING age BETWEEN 12 AND 14 AND j.married = 0";
            }else if($pelkat == "gp"){
                $condPelkat = "HAVING age >= 15 AND j.married = 0";
            }else if($pelkat == "pkp"){
                $condPelkat = "HAVING age <= 59 AND j.gender = 'f' AND j.married = 1";
            }else if($pelkat == "pkb"){
                $condPelkat = "HAVING age <= 59 AND j.gender = 'm' AND j.married = 1";
            }else if($pelkat == "pklu"){
                $condPelkat = "HAVING age >= 60 AND j.married = 1";
            }
        }
        $condGender = "";
        if($gender != ""){
            $condGender = "AND j.gender = '$gender'";
        }
        $condMarried = "";
        if($married != ""){
            $condMarried = "AND j.married = '$married'";
        }
        $condStatus = "";
        if($status != ""){
            $condStatus = "AND j.status = '$status'";
        }

        //get total data
        $query_total = "SELECT j.id, j.married, j.gender, j.status, TIMESTAMPDIFF(YEAR, j.birthday, CURDATE()) AS age 
            FROM $this->table j $this->joinKeluarga WHERE j.id IS NOT NULL $condKeyword $condSector $condPelkat 
            $condGender $condMarried $condStatus";
        $total_data = $crud->count($query_total);

        //get total page
        if($page != ""){
            $total_page  = ceil($total_data / $this->itemPerPageAdmin);
            $limitBefore = $page <= 1 || $page == null ? 0 : ($page-1) * $this->itemPerPageAdmin;
            $limit = "LIMIT $limitBefore, $this->itemPerPageAdmin";
        }else{
            $total_page = $total_data;
            $limit = "";
        }

        $query = "SELECT j.id, j.keluarga_id, j.full_name, j.gender, j.phone1, j.phone2, j.phone3, j.birthday, 
            TIMESTAMPDIFF(YEAR, j.birthday, CURDATE()) AS age, j.married, j.status, j.datetime, j.timestamp 
            FROM $this->table j $this->joinKeluarga WHERE j.id IS NOT NULL $condKeyword $condSector $condPelkat 
            $condGender $condMarried $condStatus ORDER BY j.datetime DESC, k.name ASC $limit";
        $result = $crud->conn()->query($query);
        if($result->num_rows >= 1){
            $rows = array();
            $loop = 0;
            while($row = $result->fetch_assoc()){
                $rows[$loop] = $row;

                //query keluarga
                $query_detail = "SELECT id, name, sector FROM keluarga WHERE id = '{$row['keluarga_id']}'";
                $result_detail = $crud->getById($query_detail);
                if($result_detail){
                    $rows[$loop]['keluarga'] = $result_detail;
                }
                unset($rows[$loop]['keluarga_id']);
                $loop++;
            }
            $obj = array();
            $obj['total_page'] = $total_page;
            $obj['total_data'] = count($rows);
            $obj['total_data_all'] = $total_data;
            $obj['data'] = $rows;
            $result = $obj;
        }else{
            return false;
        }
        //$result = $query;
        return $result;
    }

    public function get_detail($crud, $id){
        $result = $crud->detail($id, $this->table);
        return !$result ? false : is_array($result) ? $result[0] : false;
    }

    public function insert_data($crud, $jemaat){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");

        $query = "INSERT INTO $this->table (id, keluarga_id, first_name, middle_name, last_name, full_name,
            gender, birthday, phone1, phone2, phone3, notes, married, status, datetime, timestamp) 
            VALUES ('$jemaat->_id', '$jemaat->_keluarga_id', '$jemaat->_first_name', '$jemaat->_middle_name', 
            '$jemaat->_last_name', '$jemaat->_full_name', '$jemaat->_gender', '$jemaat->_birthday', '$jemaat->_phone1', 
            '$jemaat->_phone2', '$jemaat->_phone3', '$jemaat->_notes', '$jemaat->_married', '$jemaat->_status', '$now', '$now')";
        $result = $crud->execute($query);
        return $result;
    }

    public function update_data($crud, $jemaat){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");

        $query = "UPDATE $this->table SET keluarga_id = '$jemaat->_keluarga_id', first_name = '$jemaat->_first_name',
            middle_name = '$jemaat->_middle_name', last_name = '$jemaat->_last_name', full_name = '$jemaat->_full_name',
            gender = '$jemaat->_gender', birthday = '$jemaat->_birthday', phone1 = '$jemaat->_phone1', phone2 = '$jemaat->_phone2', 
            phone3 = '$jemaat->_phone3', notes = '$jemaat->_notes', married = '$jemaat->_married', status = '$jemaat->_status', 
            timestamp = '$now' WHERE id = '$jemaat->_id'";
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