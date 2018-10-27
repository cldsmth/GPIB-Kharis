<?php
include_once($global['root-url']."class/Crud.php");
$crud = new Crud();

include_once($global['root-url']."class/Encryption.php");
$encrypt = new Encryption();

include_once($global['root-url']."class/RandomStringGenerator.php");
$generator = new RandomStringGenerator();

include_once($global['root-url']."class/SimpleImage.php");
$image = new SimpleImage();

include_once($global['root-url']."model/Admin.php");
$admin = new Admin();

if(!isset($_GET['action'])){
	$_page = isset($_GET['page']) ? $_GET['page'] : 1;
	$filename = PHPFilename();
    if($filename == "index"){
        $datas = $admin->get_all($crud, $_page);
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
}else{

	if(isset($_GET['action'])){

	    if($_GET['action'] == "add" && issetVar(array('name', 'email', 'password', 'repassword'))){
	    	$_id = $generator->generate(32);
			$_name = $crud->escape_string(check_input($_POST['name']));
			$_email = $crud->escape_string(check_input($_POST['email']));
			$_password = $crud->escape_string(check_input($_POST['password']));
			$_repassword = $crud->escape_string(check_input($_POST['repassword']));
			$_status = isset($_POST['status']) ? $_POST['status'] : 0;
			$_auth_code = generate_code(32);
			$salt = substr(md5(time()), 0, 5);
            $password = substr(doHash($_password, $salt), 0, 64);
            $file_name = "";

			$check_email = $admin->check_email($crud, $_email);
			if($check_email){
				$message = "E-mail '".$_email."' already exist";
				$alert = "failed";
			}else{
				if($_password == $_repassword){
					//function uploading image
					$images = save_image($image, "image", $global['root-url']."uploads/admin/");
					if($images['status'] == 200){
						$file_name = $encrypt->encrypt_decrypt("encrypt", $images['data']['filename']);
					}
					$result = $admin->insert_data($crud, $_id, $_name, $_email, $password, $salt, $_auth_code, $_status, $file_name);
	               	if($result){
	                    $message = "Add New Administrator '".$_name."' success";
	                    $alert = "success";
	                }else{
	                    $message = "Add New Administrator '".$_name."' failed. Please try again";
	                    $alert = "failed";
	                }
				}else{
					$message = "Password does not match";
	                $alert = "failed";
				}
			}

	        $_SESSION['status'] = $message;
	        $_SESSION['alert'] = $alert;
	        header("Location:".$path['admin']);
	    
	    } else if($_GET['action'] == "delete" && issetVar(array('id', 'name'))){
            $_id = $crud->escape_string(check_input($_GET['id']));
            $_name = $crud->escape_string(check_input($_GET['name']));
            $_admin_id = $_SESSION['GpibKharis']['admin']['id'];

            if($_admin_id != $_id){
            	$result = $admin->delete_data($crud, $_id, $encrypt, $global['root-url']."uploads/admin/");
	            if($result){
	                $message = "Administrator '".$_name."' success to be deleted in system";
	                $alert = "success";
	            }else{
	                $message = "Administrator '".$_name."' failed to be deleted in system";
	                $alert = "failed";
	            }
	            $page = $path['admin'];
            }else{
            	$message = "You cannot delete '".$_name."' when you're logged in";
            	$alert = "failed";
            	$page = $path['home'];
            }

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