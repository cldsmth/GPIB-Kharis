<?php
require_once($global['root-url-class']."Connection.php");
$obj_connect = new Connection();

require_once($global['root-url-class']."Admin.php");
$obj_admin = new Admin();

require_once($global['root-url-class']."Encryption.php");
$obj_encrypt = new Encryption();

require_once($global['root-url-class']."RandomStringGenerator.php");
$obj_generator = new RandomStringGenerator();

if(!isset($_GET['action'])){
	$obj_connect->up();
	$O_page = isset($_GET['page']) ? $_GET['page'] : 1;

	$filename = PHPFilename();
    if($filename == "index"){
        $datas = $obj_admin->get_all($O_page);
	    //var_dump($datas);
	    $total_data = is_array($datas) ? $datas[0]['total_data_all'] : 0;
	    $total_page = is_array($datas) ? $datas[0]['total_page'] : 0;

	    if(isset($_SESSION['status'])){
	        $message = $_SESSION['status'];
	        unset($_SESSION['status']);
	    } else {
	        $message = "";
	    }

	    if(isset($_SESSION['alert'])){
	        $alert = $_SESSION['alert'];
	        unset($_SESSION['alert']);
	    } else {
	        $alert = "";
	    }
    }else{
        //insert.php
    }

    $obj_connect->down();

}else{

	if(isset($_GET['action'])){

	    if($_GET['action'] == 'add' && issetVar(array('name', 'email', 'password', 'repassword'))){
	    	$obj_connect->up();

			$N_id = $obj_generator->generate(32);
			$N_name = mysql_real_escape_string(check_input($_POST['name']));
			$N_email = mysql_real_escape_string(check_input($_POST['email']));
			$N_password = mysql_real_escape_string(check_input($_POST['password']));
			$N_repassword = mysql_real_escape_string(check_input($_POST['repassword']));
			$N_status = isset($_POST['status']) ? $_POST['status'] : 0;
			$N_auth_code = generate_code(32);
			$salt = substr(md5(time()), 0, 5);
            $password = substr(doHash($N_password, $salt), 0, 64);
            $file_name = "";

			$check_email = $obj_admin->check_email($N_email);
			if($check_email == 0){
				if($N_password == $N_repassword){
					//function uploading image
					$images = save_image("image", $global['root-url']."uploads/admin/");
					if($images['status'] == 200){
						$file_name = $images['data']['filename'];
					}
					$result = $obj_admin->insert_data($N_id, $N_name, $N_email, $password, $salt, $N_auth_code, $N_status, $file_name);
	               	if($result == 1){
	                    $message = "Add New Administrator '".$N_name."' success";
	                    $alert = "success";
	                }else{
	                    $message = "Add New Administrator '".$N_name."' failed. Please try again";
	                    $alert = "failed";
	                }
				}else{
					$message = "Password does not match";
	                $alert = "failed";
				}
			}else{
				$message = "E-mail '".$N_email."' already exist";
				$alert = "failed";
			}

	        $obj_connect->down();
	        $_SESSION['status'] = $message;
	        $_SESSION['alert'] = $alert;
	        header("Location: index.php");
	    
	    } else {
	    	$_SESSION['status'] = "Action Not Found.";
	        $_SESSION['alert'] = "failed";
	        header("Location:".$path['home']);
	    }

	} else {
		$_SESSION['status'] = "Not Found.";
        $_SESSION['alert'] = "failed";
        header("Location:".$path['home']);
	}
	
}
?>