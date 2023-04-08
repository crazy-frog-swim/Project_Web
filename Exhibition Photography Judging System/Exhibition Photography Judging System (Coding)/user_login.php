<?php 
session_start(); 
include "connection.php";

if (isset($_POST['u_name']) && isset($_POST['u_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['u_name']);
	$pass = validate($_POST['u_password']);

	if (empty($uname)) {
		header("Location: login.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: login.php?error=Password is required");
	    exit();
	}else{
		$sql = "SELECT * FROM user WHERE Uname='$uname' AND Upassword='$pass'";

		$result = mysqli_query($con, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['Uname'] === $uname && $row['Upassword'] === $pass) {
            	if($row['Urole'] === 'organizer'){
					header("Location: view_result.php");
					exit;
				}elseif($row['Urole'] === 'admin'){
					header("Location: view_ms.php");
					exit;
				}else if($row['Urole'] === 'judger'){
					header("Location: update_mark.php");
					exit;
				}else{
					header("Location: login.php?error=Invalid information");
					exit;
				}
				
            }else{
				header("Location: login.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: login.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: login.php");
	exit();
	}