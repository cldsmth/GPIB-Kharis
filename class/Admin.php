<?php
class Admin{

    private $table = "tbl_admin";
    private $itemPerPageAdmin = 20;

//START FUNCTION FOR ADMIN PAGE
    public function get_salt($email){
        $result = 0;

        $text = "SELECT salt_hash FROM $this->table WHERE email = '$email'";
        $query = mysql_query($text);
        if(mysql_num_rows($query) >= 1){//HAS TO BE EXACT 1 RESULT
            $row = mysql_fetch_assoc($query);
            $result = $row['salt_hash'];
        }
        return $result;
    }
    
    public function login($email, $password){
        $result = 0;

        $text = "SELECT id, name, email, img, auth_code FROM $this->table 
            WHERE email = '$email' AND password = '$password' AND status = 1";
        $query = mysql_query($text);
        if(mysql_num_rows($query) >= 1){
            $row = mysql_fetch_assoc($query);
            $result = $row;
        }
        //$result = $text;
        return $result;
    }

    public function get_all($page=1){
        $result = 0;

        //get total data
        $text_total = "SELECT id FROM $this->table";
        $query_total = mysql_query($text_total);
        $total_data  = mysql_num_rows($query_total);
        if($total_data < 1){$total_data = 0;}

        //get total page
        $total_page  = ceil($total_data / $this->itemPerPageAdmin);
        $limitBefore = $page <= 1 || $page == null ? 0 : ($page-1) * $this->itemPerPageAdmin;

        $text = "SELECT id, name, email, img, status, create_date FROM $this->table
            ORDER BY create_date DESC LIMIT $limitBefore, $this->itemPerPageAdmin";
        $query = mysql_query($text);
        if(mysql_num_rows($query) >= 1){
            $result = array();
            while($row = mysql_fetch_assoc($query)){
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
//END FUNCTION FOR ADMIN PAGE
}
?>