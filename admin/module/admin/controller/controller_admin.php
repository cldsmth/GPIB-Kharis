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
	$conn = $obj_connect->setup();
	$O_page = isset($_GET['page']) ? $_GET['page'] : 1;

	$filename = PHPFilename();
    if($filename == "index"){
        $datas = $obj_admin->get_all($conn, $O_page);
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

    $obj_connect->close();

}else{

	if(isset($_GET['action'])){

	    if($_GET['action'] == "add" && issetVar(array('name', 'email', 'password', 'repassword'))){
	    	$conn = $obj_connect->setup();

			$N_id = $obj_generator->generate(32);
			$N_name = mysqli_real_escape_string($conn, check_input($_POST['name']));
			$N_email = mysqli_real_escape_string($conn, check_input($_POST['email']));
			$N_password = mysqli_real_escape_string($conn, check_input($_POST['password']));
			$N_repassword = mysqli_real_escape_string($conn, check_input($_POST['repassword']));
			$N_status = isset($_POST['status']) ? $_POST['status'] : 0;
			$N_auth_code = generate_code(32);
			$salt = substr(md5(time()), 0, 5);
            $password = substr(doHash($N_password, $salt), 0, 64);
            $file_name = "";

			$check_email = $obj_admin->check_email($conn, $N_email);
			if($check_email == 0){
				if($N_password == $N_repassword){
					//function uploading image
					$images = save_image("image", $global['root-url']."uploads/admin/");
					if($images['status'] == 200){
						$file_name = $obj_encrypt->encrypt_decrypt("encrypt", $images['data']['filename']);
					}
					$result = $obj_admin->insert_data($conn, $N_id, $N_name, $N_email, $password, $salt, $N_auth_code, $N_status, $file_name);
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

	        $obj_connect->close();
	        $_SESSION['status'] = $message;
	        $_SESSION['alert'] = $alert;
	        header("Location: index.php");
	    
	    } else if($_GET['action'] == "delete" && issetVar(array('id', 'name'))){
            $conn = $obj_connect->setup();

            $O_id = mysqli_real_escape_string($conn, check_input($_GET['id']));
            $O_name = mysqli_real_escape_string($conn, check_input($_GET['name']));
            $O_admin_id = $_SESSION['GpibKharis']['admin']['id'];

            if($O_admin_id != $O_id){
            	$result = $obj_admin->delete_data($conn, $O_id, $obj_encrypt, $global['root-url']."uploads/admin/");
	            if($result == 0){
	                $message = "Administrator '".$O_name."' failed to be deleted in system";
	                $alert = "failed";
	            }else if($result == 1){
	                $message = "Administrator '".$O_name."' success to be deleted in system";
	                $alert = "success";
	            }
	            $page = $path['admin'];
            }else{
            	$message = "You cannot delete '".$O_name."' when you're logged in";
            	$alert = "failed";
            	$page = $path['home'];
            }

            $obj_connect->close();
	        $_SESSION['status'] = $message;
	        $_SESSION['alert'] = $alert;
	        header("Location:".$page);

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