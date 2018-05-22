<?php
if(!function_exists('check_input'))
{
    //Function To check and secure the login info from hacker attack
    function check_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = addslashes($data);
        $data = htmlspecialchars($data, ENT_QUOTES);
        return $data;
    }
}

if(!function_exists('create_session'))
{
    function create_session($encrypt, $datas){
        end_session();
        $_SESSION['GpibKharis']['admin']['id'] = $encrypt->encode($datas['id']);
        $_SESSION['GpibKharis']['admin']['name'] = $datas['name'];
        $_SESSION['GpibKharis']['admin']['email'] = $datas['email'];
    }
}

if(!function_exists('end_session'))
{
    function end_session(){
        if(isset($_SESSION['GpibKharis'])){
            unset($_SESSION['GpibKharis']);
        }
    }
}
?>