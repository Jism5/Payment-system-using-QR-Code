<?php 
session_start(); 
include "config.php";

if (isset($_POST['uname']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = $_POST['uname'];
	$pass = $_POST['password'];

	if (empty($uname)) {
		header("Location: index1.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index1.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM users_log WHERE username='$uname' and password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['username'] === $uname && $row['password'] === $pass) {
            	$_SESSION['username'] = $row['username'];
            	$_SESSION['name'] = $row['name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: main.php");
		        exit();
            }else{
				header("Location: index1.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index1.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index1.php");
	exit();
}