<?php
require_once("packages/check_input.php");
require_once("packages/front_config.php");

require_once($global['root-url-class']."Connection.php");
$obj_connect = new Connection();

require_once($global['root-url-class']."Encryption.php");
$obj_encrypt = new Encryption();

if(isset($_GET['module']) && isset($_GET['type']) && isset($_GET['data'])){
	$obj_connect->up();

	$N_module = mysql_real_escape_string(check_input($_GET['module']));
	$N_type = mysql_real_escape_string(check_input($_GET['type']));
	$N_data = mysql_real_escape_string(check_input($_GET['data']));

	if($N_module != "" && $N_type != "" && $N_data != ""){
		$thmb = $N_type == "thmb" ? "thmb/" : "";
		$image = getUploadFile($global['root-url'], $N_module, $thmb, $obj_encrypt->decode($N_data));
	    $filesize = filesize($image); //Get the filesize of the image for headers
    	header( 'Content-Type: image' ); //Begin the header output
	    //Now actually output the image requested, while disregarding if the database was affected
	    header( 'Pragma: public' );
	    header( 'Expires: 0' );
	    header( 'Cache-Control: must-revalidate, post-check=0, pre-check=0' );
	    header( 'Cache-Control: private',false );
	    header( 'Content-Disposition: attachment; filename='.$image );
	    header( 'Content-Transfer-Encoding: binary' );
	    header( 'Content-Length: '.$filesize );
	    readfile($image);
	    exit; //All done, get out!
	}else{
		echo "No data";
	}
	$obj_connect->down();
}else{
	echo "No data";
}
?>