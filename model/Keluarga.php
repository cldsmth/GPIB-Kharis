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
    public function get_list($crud){
        $filter = [
            'status' => 1
        ];
        $options = [
            'projection' => [
                '_id' => 0, 
                'id' => 1, 
                'name' => 1
            ],
            'sort' => [
                'name' => 1
            ]
        ];
        $query = new MongoDB\Driver\Query($filter, $options);
        $result = $crud->find($this->table, $query);
        if(!$result){
            return false;
        }
        return $result;
    }

    public function check_name($crud, $name){
        $filter = [
            'name' => $name
        ];
        $options = [
            'projection' => [
                '_id' => 0, 
                'name' => 1
            ],
            'limit' => 1
        ]; 
        $query = new MongoDB\Driver\Query($filter, $options);
        $result = $crud->find($this->table, $query);
        if(!$result){
            return false;
        }
        return is_array($result) ? true : false;
    }

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

        $filter = [];
        $options = [
            'projection' => [
                '_id' => 0, 
                'id' => 1, 
                'name' => 1, 
                'sector' => 1,  
                'status' => 1,
                'datetime' => 1,
                'timestamp' => 1
            ],
            'sort' => [
                'datetime' => -1
            ],
            'limit' => $this->itemPerPageAdmin,
            'skip' => $limitBefore
        ];
        $query = new MongoDB\Driver\Query($filter, $options);
        $result = $crud->find($this->table, $query);
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

    public function insert_data($crud, $keluarga){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");

        $query = [
            'id' => $keluarga->_id, 
            'name' => $keluarga->_name, 
            'sector' => (int) $keluarga->_sector, 
            'address' => $keluarga->_address, 
            'status' => (int) $keluarga->_status, 
            'timestamp' => $now, 
            'datetime' => $now
        ];
        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->insert($query);
        $result = $crud->post($this->table, $bulk);
        return $result;
    }

    public function update_data($crud, $keluarga){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");

        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update(
            [
                'id' => $keluarga->_id
            ], 
            [
                '$set' => [
                    'name' => $keluarga->_name, 
                    'sector' => (int) $keluarga->_sector,
                    'address' => $keluarga->_address,
                    'status' => (int) $keluarga->_status, 
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