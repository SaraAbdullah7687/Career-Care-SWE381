<?php 
	session_start();

	require_once('Web/Login_v4/CONFIG-DB.php');// page name

    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);
    if(mysqli_connect_errno($con))
    die("Fail to connect to database :" . mysqli_connect_error());

	
	if(isset($_GET['delete'])){
		$email = $_GET['delete'];

		$query = "DELETE FROM `job_seeker` WHERE `job_seeker`.`j_email` LIKE '$email' "; //q 

		if($result = mysqli_query($con , $query)){
			$_SESSION['message']= "Profile has been deleted!";
			$_SESSION['msg_type'] = "danager"; //You can add to V-Home page a message.
			header("Location:V-Home.php"); // page name
			$_SESSION['j_email'] = null; 
		}
		else{
			echo mysqli_error();
		}
	}
?>
