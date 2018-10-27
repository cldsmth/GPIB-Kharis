<?php
class Admin
{
    private $table = "admin";
    private $itemPerPageAdmin = 20;

//START FUNCTION FOR ADMIN PAGE
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
        $query = "SELECT id, name, email, img, auth_code FROM $this->table 
            WHERE email = '$email' AND password = '$password' AND status = 1";
        $result = $crud->getData($query);
        if(!$result){
            return false;
        }
        return is_array($result) ? $result[0] : "";
    }

    public function get_all($crud, $page=1){
        //get total data
        $query_total = "SELECT id FROM $this->table";
        $result_total = $crud->getData($query_total);
        $total_data = !$result_total ? 0 : count($result_total);

        //get total page
        $total_page  = ceil($total_data / $this->itemPerPageAdmin);
        $limitBefore = $page <= 1 || $page == null ? 0 : ($page-1) * $this->itemPerPageAdmin;

        $query = "SELECT id, name, email, img, status, create_date FROM $this->table
            ORDER BY create_date DESC LIMIT $limitBefore, $this->itemPerPageAdmin";
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

    public function insert_data($crud, $id, $name, $email, $password, $salt_hash, $auth_code, $status, $img){
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");

        $query = "INSERT INTO $this->table (id, name, email, password, salt_hash, auth_code, status, img, create_date)
            VALUES ('$id', '$name', '$email', '$password', '$salt_hash', '$auth_code', '$status', '$img', '$now')";
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
    }
//END FUNCTION FOR ADMIN PAGE
}
?>