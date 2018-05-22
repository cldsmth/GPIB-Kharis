<?php
class Admin{

    private $table = "tbl_admin";

//START FUNCTION FOR ADMIN PAGE
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
//END FUNCTION FOR ADMIN PAGE
}
?>