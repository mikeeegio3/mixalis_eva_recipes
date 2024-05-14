<?php 
session_start(); 
include "connect_db.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
    $data = trim($data);
	  $data = stripslashes($data);
	  $data = htmlspecialchars($data);
	  return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);

	if (empty($uname)) {
		header("Location: admin_login.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: admin_login.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM admins WHERE admin_username='$uname' AND admin_pass='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['admin_username'] === $uname && $row['admin_pass'] === $pass) {
            	$_SESSION['user_name'] = $row['admin_username'];
            	$_SESSION['name'] = $row['admin_first'];
            	
            	header("Location: logged_in.php");
		        exit();
            }else{
				header("Location: admin_login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: admin_login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: admin_login.php");
	exit();
}