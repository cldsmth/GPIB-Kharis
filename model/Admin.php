<?php
class Admin
{
    private $table = "admin";
    private $itemPerPageAdmin = 20;

//START FUNCTION FOR ADMIN PAGE
    /*public function check_email($conn, $email){
        $result = 0;

        $text = "SELECT email FROM $this->table WHERE email = '$email'";
        $query = mysqli_query($conn, $text);
        if(mysqli_num_rows($query) >= 1){
            $result = 1;
        }
        return $result;
    }*/

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

    /*public function get_all($conn, $page=1){
        $result = 0;

        //get total data
        $text_total = "SELECT id FROM $this->table";
        $query_total = mysqli_query($conn, $text_total);
        $total_data  = mysqli_num_rows($query_total);
        if($total_data < 1){$total_data = 0;}

        //get total page
        $total_page  = ceil($total_data / $this->itemPerPageAdmin);
        $limitBefore = $page <= 1 || $page == null ? 0 : ($page-1) * $this->itemPerPageAdmin;

        $text = "SELECT id, name, email, img, status, create_date FROM $this->table
            ORDER BY create_date DESC LIMIT $limitBefore, $this->itemPerPageAdmin";
        $query = mysqli_query($conn, $text);
        if(mysqli_num_rows($query) >= 1){
            $result = array();
            while($row = mysqli_fetch_assoc($query)){
                $result[] = $row;
            }
        }
        if(is_array($result)){
            $result[0]['total_page'] = $total_page;
            $result[0]['total_data_all'] = $total_data;
            $result[0]['total_data'] = count($result);
        }
        return $result;
    }

    public function insert_data($conn, $id, $name, $email, $password, $salt_hash, $auth_code, $status, $img){
        $result = 0;
        date_default_timezone_set('Asia/Jakarta');
        $now = date("Y-m-d H:i:s");

        $text = "INSERT INTO $this->table (id, name, email, password, salt_hash, auth_code, status, img, create_date)
            VALUES ('$id', '$name', '$email', '$password', '$salt_hash', '$auth_code', '$status', '$img', '$now')";
        $query = mysqli_query($conn, $text);
        if($query){
            $result = 1;
        }
        return $result;
    }

    public function delete_data($conn, $id, $encrypt, $path){
        $result = 0;
        $this->remove_image($conn, $id, $encrypt, $path);

        $text = "DELETE FROM $this->table WHERE id = '$id'";
        $query = mysqli_query($conn, $text);
        if(mysqli_affected_rows($conn) == 1){
            $result = 1;
        }
        return $result;
    }

    public function remove_image($conn, $id, $encrypt, $path){
        $result = 0;

        $text = "SELECT img FROM $this->table WHERE id = '$id'";
        $query = mysqli_query($conn, $text);
        if(mysqli_num_rows($query) >= 1){
            $row = mysqli_fetch_assoc($query);
            if($row['img'] != ""){
                $deleteImg = $path.$encrypt->encrypt_decrypt("decrypt", $row['img']);
                if (file_exists($deleteImg)) {
                    unlink($deleteImg);
                }

                $deleteImgThmb = $path."thmb/".$encrypt->encrypt_decrypt("decrypt", $row['img']);
                if (file_exists($deleteImgThmb)) {
                    unlink($deleteImgThmb);
                }

                $result = 1;
            }
        }
        return $result;
    }*/
//END FUNCTION FOR ADMIN PAGE
}
?>