<?php
if(!function_exists('getUploadFile'))
{
    function getUploadFile($url, $module, $thmb, $data){
        $data = trim($data);
        if($data != ""){
            switch ($module) {
                case "admin":
                $result = $url."uploads/admin/".$thmb.$data;
                break;
                default:
                $result = $url."img/placeholder-image.png";
                break;
            }
        }else{
            if($module == "admin"){
                $result = $url."img/placeholder-anonymous.jpg";
            }else{
                $result = $url."img/placeholder-image.png";
            }
        }
        return $result;
    }
}

if(!function_exists('colorStatus'))
{
    function colorStatus($status){
        return $status == 1 ? "" : "danger";
    }
}

if(!function_exists('checkStatus'))
{
    function checkStatus($status){
        return $status == 1 ? "Active" : "Inactive";
    }
}

if(!function_exists('PHPFilename'))
{
    function PHPFilename(){
        return basename($_SERVER['SCRIPT_FILENAME'], ".php");
    }
}

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
        $_SESSION['GpibKharis']['admin']['img'] = $datas['img'];
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

if(!function_exists('formatRupiah'))
{
    function formatRupiah($data) {
        $result = "";
        $result = 'Rp '.number_format($data,0,'.','.');

        return $result;
    }
}

if(!function_exists('formatNumber'))
{
    function formatNumber($data) {
        $result = "";
        $result = number_format($data,0,'.','.');

        return $result;
    }
}

if(!function_exists('cleanSpace'))
{
    function cleanSpace($string) {
        $string = trim($string);
        while(strpos($string,' ')){
            $string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.
        }
        return $string;
    }
}

if(!function_exists('calculate_age'))
{
    function calculate_age($date){
        list($day, $month, $year) = explode("-",$date);
        $year_diff  = date("Y") - $year;
        $month_diff = date("m") - $month;
        $day_diff   = date("d") - $day;
        if ($day_diff < 0 && $month_diff==0) $year_diff--;
        if ($day_diff < 0 && $month_diff < 0) $year_diff--;
        return $year_diff;
    }
}

if(!function_exists('relative_time'))
{
    function relative_time($ts)
    {
        if(!ctype_digit($ts))
            $ts = strtotime($ts);
        $diff = time() - $ts;
        if($diff == 0)
            return 'now';
        elseif($diff > 0)
        {
            $day_diff = floor($diff / 86400);
            if($day_diff == 0)
            {
                if($diff < 60) return 'just now';
                if($diff < 120) return '1 minute ago';
                if($diff < 3600) return floor($diff / 60) . ' minutes ago';
                if($diff < 7200) return '1 hour ago';
                if($diff < 86400) return floor($diff / 3600) . ' hours ago';
            }
            if($day_diff == 1) return 'Yesterday';
            if($day_diff < 7) return $day_diff . ' days ago';
            if($day_diff < 31) return ceil($day_diff / 7) . ' weeks ago';
            if($day_diff < 60) return 'last month';
            return date('F Y', $ts);
        }
        else
        {
            $diff = abs($diff);
            $day_diff = floor($diff / 86400);
            if($day_diff == 0)
            {
                if($diff < 120) return 'in a minute';
                if($diff < 3600) return 'in ' . floor($diff / 60) . ' minutes';
                if($diff < 7200) return 'in an hour';
                if($diff < 86400) return 'in ' . floor($diff / 3600) . ' hours';
            }
            if($day_diff == 1) return 'Tomorrow';
            if($day_diff < 4) return date('l', $ts);
            if($day_diff < 7 + (7 - date('w'))) return 'next week';
            if(ceil($day_diff / 7) < 4) return 'in ' . ceil($day_diff / 7) . ' weeks';
            if(date('n', $ts) == date('n') + 1) return 'next month';
            return date('F Y', $ts);
        }
    }
}

if(!function_exists('getBatch'))
{
    function getBatch($page){
        $test = 5;
        $batch = 1;
        $flag = false;
        while(!$flag){
          if($page > $test){
              $test = $test + 5;
              $batch++;
          }else{
              $flag = true;
          }
      }
      return $batch;
  }
}

if(!function_exists('encode'))
{
    function encode($param){
        $new_result = $param;
        if($param != null){
            $result = clean($param);
            $new_result = rawurlencode($result);
        }
        return $new_result;
    }
}

if(!function_exists('decode'))
{
    function decode($param){
        $new_result = $param;
        if($param != null){
            $new_result = str_replace('-',' ',$param);
        }
        return $new_result;
    }
}

if(!function_exists('isSelected'))
{
    function isSelected($value, $data){
        return $value == $data ? "selected" : "";
    }
}

if(!function_exists('nowDate'))
{
    function nowDate() {
        $date = date_create("", timezone_open('Asia/Jakarta'));
        $date = date_format($date, 'Y-m-d');
        return $date;
    }
}

if(!function_exists('nowDateComplete'))
{
    function nowDateComplete() {
        $date = date_create("", timezone_open('Asia/Jakarta'));
        $date = date_format($date, 'jS F Y - g:i A');
        return $date;
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

if(!function_exists('charLength'))
{
    //function to put 3dots after lengthy string
    function charLength($data, $length) {
        $strLength = strlen($data);
        if ($strLength > $length) {
            $data = substr(strip_tags($data), 0, $length) . "...";
        }
        return $data;
    }
}

if(!function_exists('doHash'))
{
    function doHash($secData, $salt) {
        //creates a random 5 character sequence
        $secData = hash('sha256', $salt . $secData);
        return $secData;
    }
}

if(!function_exists('correctDisplay'))
{
    function correctDisplay($data) {
        $data = htmlspecialchars_decode(stripslashes($data), ENT_QUOTES);
        return $data;
    }
}
?>