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
        $query = "SELECT id, title, status, datetime, timestamp FROM 
            $this->table WHERE type = '$type' ORDER BY title ASC";
        $result = $crud->getData($query);
        if(!$result){
            return false;
        }
        return $result;
    }

    public function insert_data($crud, $category){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");

        $query = "INSERT INTO $this->table (id, title, slug, type, status, datetime, timestamp)
            VALUES ('$category->_id', '$category->_title', '$category->_slug', '$category->_type', 
            '$category->_status', '$now', '$now')";
        $result = $crud->execute($query);
        return $result;
    }

    public function update_data($crud, $category){
        $query = "UPDATE $this->table SET title = '$category->_title', slug = '$category->_slug', 
            status = '$category->_status' WHERE id = '$category->_id'";
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