<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['memid']) && isset($_POST['password'])
    && isset($_POST['memname']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$memid = validate($_POST['memid']);
	$pass = validate($_POST['password']);
	$memname = validate($_POST['memname']);
	
	$date = validate($_POST['date']);

	$re_pass = validate($_POST['re_password']);
	

	$pricm = 'memid='. $memid. 'memname='. $memname.  'password='. $password. '&date='. $date;


	if (empty($memid)) {
		header("Location: priCM.php?error=Memorial ID is required&$pricm");
	    exit();
	}else if(empty($pass)){
        header("Location: priCM.php?error=Password is required&$pricm");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: priCM.php?error=Re Password is required&$pricm");
	    exit();
	}

	else if(empty($memname)){
        header("Location: priCM.php?error=Memorial Name is required&$pricm");
	    exit();
	}


    else if(empty($date)){
        header("Location: priCM.php?error=DOD is required&$pricm");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: priCM.php?error=The confirmation password  does not match&$pricm");
	    exit();
	}

	else{

		
        $pass = ($pass);

	    $sql = "SELECT * FROM pricm WHERE memid='$memid' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: priCM.php?error=The Memorial ID is taken try another&$memid");
	        exit();
		}else {
           $sql2 = "INSERT INTO pricm(memid, password, memname,  date) VALUES('$memid', '$pass', '$memname', '$date')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: priCM.php?success=Your Memorial has been created successfully");
	         exit();
           }else {
	           	header("Location: priCM.php?error=unknown error occurred&$pricm");
		        exit();
           }
		}
	}
	
}else{
	header("Location: post.php");
	exit();
}