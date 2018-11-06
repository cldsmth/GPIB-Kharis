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
    /*public function check_email($crud, $email){
        $query = "SELECT email FROM $this->table WHERE email = '$email'";
        $result = $crud->getData($query);
        if(!$result){
            return false;
        }
        return is_array($result) ? true : false;
    }*/

    public function get_salt($crud, $email){
        $filter = [
            'email' => $email
        ];
        $options = [
            'projection' => [
                '_id' => 0, 
                'salt_hash' => 1
            ]
        ]; 
        $query = new MongoDB\Driver\Query($filter, $options);
        $result = $crud->getData($this->table, $query);
        if(!$result){
            return false;
        }
        return is_array($result) ? $result[0]->salt_hash : "";
    }

    public function login($crud, $email, $password){
        $filter = [
            'email' => $email, 
            'password' => $password
        ];
        $options = [
            'projection' => [
                '_id' => 0, 
                'id' => 1, 
                'name' => 1, 
                'email' => 1, 
                'img' => 1, 
                'auth_code' => 1
            ]
        ]; 
        $query = new MongoDB\Driver\Query($filter, $options);
        $result = $crud->getData($this->table, $query);
        if(!$result){
            return false;
        }
        return is_array($result) ? $result[0] : false;
    }

    /*public function get_all($crud, $page=1){
        //get total data
        $query_total = "SELECT id FROM $this->table";
        $result_total = $crud->getData($query_total);
        $total_data = !$result_total ? 0 : count($result_total);

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

    public function insert_data($crud, $admin){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");

        $query = "INSERT INTO $this->table (id, name, email, password, salt_hash, auth_code, status, img, datetime, 
            timestamp) VALUES ('$admin->_id', '$admin->_name', '$admin->_email', '$admin->_password', '$admin->_salt_hash', 
            '$admin->_auth_code', '$admin->_status', '$admin->_image', '$now', '$now')";
        $result = $crud->execute($query);
        return $result;
    }

    public function change_password($crud, $id, $password, $salt_hash){
        $query = "UPDATE $this->table SET password = '$password', salt_hash = '$salt_hash' WHERE id = '$id'";
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
            }
        }
        return $result;
    }*/
//END FUNCTION FOR ADMIN PAGE
}
?>