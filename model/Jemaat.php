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
    private $_phone1;
    private $_phone2;
    private $_phone3;
    private $_notes;
    private $_status;
    private $table;
    private $tableKeluarga;
    private $itemPerPageAdmin;

    function __construct(){
        $this->table = "jemaat";
        $this->tableKeluarga = "keluarga";
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
    public function get_all($crud, $page=1){
        //get total data
        $query_total = [];
        $total_data = $crud->count(
            new MongoDB\Driver\Command([
                'count' => $this->table, 
                'query' => $query_total
            ])
        );

        //get total page
        $total_page  = ceil($total_data / $this->itemPerPageAdmin);
        $limitBefore = $page <= 1 || $page == null ? 0 : ($page-1) * $this->itemPerPageAdmin;

        $command = new MongoDB\Driver\Command([
            'aggregate' => $this->table,
            'pipeline' => [
                [
                    '$lookup' => [
                        'from' => $this->tableKeluarga,
                        'localField' => "keluarga_id",
                        'foreignField' => "id",
                        'as' => "keluarga"
                    ]
                ],
                [
                    '$unwind' => '$keluarga'
                ],
                [
                    '$project' => [
                        '_id' => 0, 
                        'id' => 1, 
                        'full_name' => 1, 
                        'gender' => 1, 
                        'phone1' => 1, 
                        'birthday' => 1, 
                        'status' => 1, 
                        'datetime' => 1, 
                        'timestamp' => 1,
                        'keluarga' => [
                            'id' => 1, 
                            'name' => 1, 
                            'sector' => 1
                        ]
                    ],
                ],
                [
                    '$sort' => [
                        'datetime' => -1
                    ]
                ],
                [
                    '$skip' => $limitBefore
                ],
                [
                    '$limit' => $this->itemPerPageAdmin
                ]
            ],
            'cursor' => [
                'batchSize' => 4
            ]
        ]);
        $result = $crud->aggregate($command);
        if(!$result){
            return false;
        }else{
            if(is_array($result)){
                $obj = new stdClass;
                $obj->total_page = $total_page;
                $obj->total_data = count($result);
                $obj->total_data_all = $total_data;
                $obj->data = $result;
                $result = $obj;
            }
        }
        return $result;
    }

    public function get_detail($crud, $id){
        return $crud->findById($this->table, $id);
    }

    public function insert_data($crud, $jemaat){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");

        $query = [
            'id' => $jemaat->_id, 
            'keluarga_id' => $jemaat->_keluarga_id, 
            'first_name' => $jemaat->_first_name,
            'middle_name' => $jemaat->_middle_name,
            'last_name' => $jemaat->_last_name,
            'full_name' => $jemaat->_full_name,
            'gender' => $jemaat->_gender,
            'birthday' => $jemaat->_birthday, 
            'phone1' => $jemaat->_phone1, 
            'phone2' => $jemaat->_phone2, 
            'phone3' => $jemaat->_phone3, 
            'notes' => $jemaat->_notes, 
            'status' => (int) $jemaat->_status, 
            'timestamp' => $now, 
            'datetime' => $now
        ];
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->insert($query);
        $result = $crud->post($this->table, $bulk);
        return $result;
    }

    public function update_data($crud, $jemaat){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");

        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update(
            [
                'id' => $jemaat->_id
            ], 
            [
                '$set' => [
                    'keluarga_id' => $jemaat->_keluarga_id, 
                    'first_name' => $jemaat->_first_name,
                    'middle_name' => $jemaat->_middle_name,
                    'last_name' => $jemaat->_last_name,
                    'full_name' => $jemaat->_full_name,
                    'gender' => $jemaat->_gender,
                    'birthday' => $jemaat->_birthday, 
                    'phone1' => $jemaat->_phone1, 
                    'phone2' => $jemaat->_phone2, 
                    'phone3' => $jemaat->_phone3, 
                    'notes' => $jemaat->_notes, 
                    'status' => (int) $jemaat->_status, 
                    'timestamp' => $now
                ]
            ]
        );
        $result = $crud->put($this->table, $bulk);
        return $result;
    }

    public function delete_data($crud, $id){
        return $crud->removeById($this->table, $id);
    }
//END FUNCTION FOR ADMIN PAGE
}
?>