<?php
class Category
{
    private $_id;
    private $_title;
    private $_slug;
    private $_type;
    private $_status;
    private $table;

    function __construct(){
        $this->_image = "";
        $this->table = "category";
    }

    function setId($id){ 
        $this->_id = $id;
    }
    
    function getId(){ 
        return $this->_id;
    }
    
    function setTitle($title){ 
        $this->_title = $title;
    }
    
    function getTitle(){ 
        return $this->_title;
    }

    function setSlug($slug){ 
        $this->_slug = $slug;
    }
    
    function getSlug(){ 
        return $this->_slug;
    }

    function setType($type){ 
        $this->_type = $type;
    }
    
    function getType(){ 
        return $this->_type;
    }

    function setStatus($status){ 
        $this->_status = $status;
    }
    
    function getStatus(){ 
        return $this->_status;
    }
    
//START FUNCTION FOR ADMIN PAGE
    public function get_all($crud, $type){
        $query = "SELECT id, title, status, datetime FROM $this->table ORDER BY title ASC";
        $result = $crud->getData($query);
        if(!$result){
            return false;
        }
        return $result;
    }

    /*public function get_detail($crud, $id){
        $query = "SELECT * FROM $this->table WHERE id = '$id'";
        $result = $crud->getData($query);
        if(!$result){
            return false;
        }
        return is_array($result) ? $result[0] : false;
    }

    public function insert_data($crud, $admin){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");

        $query = "INSERT INTO $this->table (id, name, email, password, salt_hash, auth_code, status, img, datetime)
            VALUES ('$admin->_id', '$admin->_name', '$admin->_email', '$admin->_password', '$admin->_salt_hash', 
            '$admin->_auth_code', '$admin->_status', '$admin->_image', '$now')";
        $result = $crud->execute($query);
        return $result;
    }

    public function update_data($crud, $admin, $encrypt, $path){
        $cond = "";
        if($admin->_image != ""){
            $this->remove_image($crud, $admin->_id, $encrypt, $path);
            $cond = "img = '$admin->_image', ";
        }

        $query = "UPDATE $this->table SET name = '$admin->_name', email = '$admin->_email', $cond 
            status = '$admin->_status' WHERE id = '$admin->_id'";
        $result = $crud->execute($query);
        return $result;
    }

    public function delete_data($crud, $id, $encrypt, $path){
        $this->remove_image($crud, $id, $encrypt, $path);
        $result = $crud->delete($id, $this->table);
        return $result;
    }*/
//END FUNCTION FOR ADMIN PAGE
}
?>