<?php
class Admin
{
    private $_id;
    private $_name;
    private $_email;
    private $_password;
    private $_repassword;
    private $_salt_hash;
    private $_auth_code;
    private $_status;
    private $_image;
    private $table;
    private $itemPerPageAdmin;

    function __construct(){
        $this->_image = "";
        $this->table = "admin";
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

    function setEmail($email){ 
        $this->_email = $email;
    }
    
    function getEmail(){ 
        return $this->_email;
    }

    function setPassword($password){ 
        $this->_password = $password;
    }
    
    function getPassword(){ 
        return $this->_password;
    }

    function setRepassword($repassword){ 
        $this->_repassword = $repassword;
    }
    
    function getRepassword(){ 
        return $this->_repassword;
    }

    function setSaltHash($salt_hash){ 
        $this->_salt_hash = $salt_hash;
    }
    
    function getSaltHash(){ 
        return $this->_salt_hash;
    }

    function setAuthCode($auth_code){ 
        $this->_auth_code = $auth_code;
    }
    
    function getAuthCode(){ 
        return $this->_auth_code;
    }

    function setStatus($status){ 
        $this->_status = $status;
    }
    
    function getStatus(){ 
        return $this->_status;
    }

    function setImage($image){ 
        $this->_image = $image;
    }
    
    function getImage(){ 
        return $this->_image;
    }
    
//START FUNCTION FOR ADMIN PAGE
    public function check_reset_code($crud, $email, $reset_code){
        $query = "SELECT id FROM $this->table WHERE email = '$email' AND reset_code = '$reset_code'";
        $result = $crud->getData($query);
        if(!$result){
            return false;
        }
        return is_array($result) ? true : false;
    }

    public function check_code($crud, $id, $auth_code){
        $query = "SELECT id FROM $this->table WHERE id = '$id' AND auth_code = '$auth_code'";
        $result = $crud->getData($query);
        if(!$result){
            return false;
        }
        return is_array($result) ? true : false;
    }

    public function check_email($crud, $email){
        $query = "SELECT email FROM $this->table WHERE email = '$email'";
        $result = $crud->getData($query);
        if(!$result){
            return false;
        }
        return is_array($result) ? true : false;
    }

    public function get_salt($crud, $email){
        $query = "SELECT salt_hash FROM $this->table WHERE email = '$email'";
        $result = $crud->getData($query);
        if(!$result){
            return false;
        }
        return is_array($result) ? $result[0]['salt_hash'] : "";
    }

    public function login($crud, $email, $password){
        $query = "SELECT id, name, email, img, auth_code, status FROM 
            $this->table WHERE email = '$email' AND password = '$password'";
        $result = $crud->getData($query);
        if(!$result){
            return false;
        }
        return is_array($result) ? $result[0] : false;
    }

    public function get_all($crud, $page=1){
        //get total data
        $query_total = "SELECT id FROM $this->table";
        $total_data = $crud->count($query_total);

        //get total page
        $total_page  = ceil($total_data / $this->itemPerPageAdmin);
        $limitBefore = $page <= 1 || $page == null ? 0 : ($page-1) * $this->itemPerPageAdmin;

        $query = "SELECT id, name, email, img, status, datetime, timestamp FROM $this->table
            ORDER BY datetime DESC LIMIT $limitBefore, $this->itemPerPageAdmin";
        $result = $crud->getData($query);
        if(!$result){
            return false;
        }else{
            if(is_array($result)){
                $obj = array();
                $obj['total_page'] = $total_page;
                $obj['total_data'] = count($result);
                $obj['total_data_all'] = $total_data;
                $obj['data'] = $result;
                $result = $obj;
            }
        }
        return $result;
    }

    public function get_detail($crud, $id){
        $result = $crud->detail($id, $this->table);
        return !$result ? false : is_array($result) ? $result[0] : false;
    }

    public function insert_data($crud, $admin){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");

        $query = "INSERT INTO $this->table (id, name, email, password, salt_hash, auth_code, status, img, datetime, 
            timestamp) VALUES ('$admin->_id', '$admin->_name', '$admin->_email', '$admin->_password', '$admin->_salt_hash', 
            '$admin->_auth_code', '$admin->_status', '$admin->_image', '$now', '$now')";
        $result = $crud->execute($query);
        return $result;
    }

    public function update_data($crud, $admin, $encrypt, $path){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");

        $cond = "";
        if($admin->_image != ""){
            $this->remove_image($crud, $admin->_id, $encrypt, $path);
            $cond = "img = '$admin->_image', ";
        }

        $query = "UPDATE $this->table SET name = '$admin->_name', email = '$admin->_email', $cond 
            status = '$admin->_status', timestamp = '$now' WHERE id = '$admin->_id'";
        $result = $crud->execute($query);
        return $result;
    }

    public function update_reset_code($crud, $email, $reset_code){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");

        $query = "UPDATE $this->table SET reset_code = '$reset_code', 
            timestamp = '$now' WHERE email = '$email'";
        $result = $crud->execute($query);
        return $result;
    }

    public function change_password($crud, $id, $password, $salt_hash){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");

        $query = "UPDATE $this->table SET password = '$password', salt_hash = '$salt_hash', 
            timestamp = '$now' WHERE id = '$id'";
        $result = $crud->execute($query);
        return $result;
    }

    public function reset_password($crud, $email, $reset_code, $password, $salt_hash){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");

        $query = "UPDATE $this->table SET password = '$password', salt_hash = '$salt_hash', 
            reset_code = '', timestamp = '$now' WHERE email = '$email' AND reset_code = '$reset_code'";
        $result = $crud->execute($query);
        return $result;
    }

    public function delete_data($crud, $id, $encrypt, $path){
        $this->remove_image($crud, $id, $encrypt, $path);
        $result = $crud->delete($id, $this->table);
        return $result;
    }

    public function remove_image($crud, $id, $encrypt, $path){
        $query = "SELECT img FROM $this->table WHERE id = '$id'";
        $result = $crud->getData($query);
        if(!$result){
            return false;
        }else{
            if(is_array($result)){
                foreach($result as $data){
                    if($data['img'] != ""){
                        $deleteImg = $path.$encrypt->encrypt_decrypt("decrypt", $data['img']);
                        if(file_exists($deleteImg)){
                            unlink($deleteImg);
                        }
                        $deleteImgThmb = $path."thmb/".$encrypt->encrypt_decrypt("decrypt", $data['img']);
                        if(file_exists($deleteImgThmb)){
                            unlink($deleteImgThmb);
                        }
                        $result = true;
                    }
                }
            }else{
                $result = false;
            }
        }
        return $result;
    }
//END FUNCTION FOR ADMIN PAGE
}
?>