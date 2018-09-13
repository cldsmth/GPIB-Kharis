<?php
if(!function_exists('in_array_any'))
{
    function in_array_any($needles, $haystack){
       return (bool) array_intersect($needles, $haystack);
    }
}

if(!function_exists('issetVar'))
{
    function issetVar($datas){
        $count = 0;
        $index = 0;
        $var_array = array();
        if(is_array($datas)){
            $count = count($datas);
            foreach($datas as $data){
                if(isset($_REQUEST[$data])){
                    if($_REQUEST[$data] != ""){
                        $var_array[$index] = $data;
                        $index++;
                    }
                }
            }
        }
        return $count == count($var_array) ? true : false;
    }
}

if(!function_exists('create_session'))
{
    function create_session($datas){
        end_session();
        $_SESSION['GpibKharis']['admin']['id'] = $datas['id'];
        $_SESSION['GpibKharis']['admin']['name'] = $datas['name'];
        $_SESSION['GpibKharis']['admin']['email'] = $datas['email'];
        $_SESSION['GpibKharis']['admin']['auth_code'] = $datas['auth_code'];
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

if(!function_exists('create_cookie'))
{
    function create_cookie($datas){
        $path = "/dev/gpib/admin/";
        $cookie_time = (3600 * 24 * 15); // 15 day
        setcookie("cookie_datas", $datas, time() + $cookie_time, $path);
    }
}

if(!function_exists('end_cookie'))
{
    function end_cookie(){
        $path = "/dev/gpib/admin/";
        $cookie_time = (3600 * 24 * 15); // 15 day
        setcookie("cookie_datas", "", time() - $cookie_time, $path);
    }
}

if(!function_exists('generate_code'))
{
    function generate_code($length=6, $type=1){
        $key = "";
        switch($type){
            case 2:
            $pattern = "abcdefghijklmnopqrstuvwxyzabcdefghijklmnopqrstuvwxyz";
            break;
            case 3:
            $pattern = "12345678901234567890123456789012345678901234567890";
            break;
            default:
            $pattern = "1234567890abcdefghijklmnopqrstuvwxyz";
            break;
        }
        for($i=0;$i<$length;$i++){
            $key .= $pattern{rand(0,35)};
        }
        return strtoupper($key);
    }
}

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
?>