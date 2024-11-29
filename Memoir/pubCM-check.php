<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['memid']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$memid = validate($_POST['memid']);
	$pass = validate($_POST['password']);

	if (empty($memid)) {
		header("Location: pubCM.php?error=Memorial ID is required");
	    exit();
	}else if(empty($pass)){
        header("Location: pubCM.php?error=Password is required");
	    exit();
	}else{
		
        $pass = ($pass);

        
		$sql = "SELECT * FROM pricm WHERE memid='$memid' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['memid'] === $memid && $row['password'] === $pass) {
            	$_SESSION['memid'] = $row['memid'];
            	$_SESSION['memname'] = $row['memname'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: visit.php");
		        exit();
            }else{
				header("Location: pubCM.php?error=Incorect Memorial ID or password");
		        exit();
			}
		}else{
			header("Location: pubCM.php?error=Incorect Memorial ID or password");
	        exit();
		}
	}
	
}else{
	header("Location: pubCM.php");
	exit();
}