<?php


if(!isset($_SESSION)) 
{ 
    session_start(); 
}

    if(!($conn = mysqli_connect("localhost", "root", "")))
		die("<p> couldnt connect </p>"); 
							
	if(!mysqli_select_db($conn,"group2db"))
	    die("<p> failed <p>");	


    if(isset($_GET['apply'])){

        $jd = $_GET['apply']; 
        $jsId= $_GET['applicant']; 
        $page= $_GET['page']; 

        $sql2= "SELECT * FROM `applicants` WHERE `job_ID` = '$jd' AND `j_email` = '$jsId'"; 

        if ($result1= mysqli_query($conn, $sql2)) {
            $rnumber= mysqli_num_rows ( $result1 );

            if ($rnumber == 0){
                $query= "SELECT `e-email` FROM `job` WHERE `job`.`JobID` = '$jd'";

                if ($result = mysqli_query($conn, $query)) {

                        $e = $result->fetch_assoc(); 
                        $email= $e['e-email']; 
                        $sql= "INSERT INTO `applicants` (`job_ID`, `j_email`, `accepted`, `e_email`) VALUES ('$jd', '$jsId', '-1', '$email');"; 

                        if (mysqli_query($conn, $sql)) {
                           
                            $_SESSION['message']= "you've applied successfully!"; 
                            $_SESSION['msg_type']= "success"; 

                            mysqli_close($conn); 
                            if($page=='postedjobs')
                                header("location: ../postedJobs.php");
                            else  header("location: ../Search.php");
                            exit(); 
                        } 

                } 
                
            } else {
                $_SESSION['message']= "you've already applied for this job!!"; 
                $_SESSION['msg_type']= "danger"; 
                mysqli_close($conn); 
                if($page=='postedjobs')
                    header("location: ../postedJobs.php");
                else  header("location: ../Search.php");
                exit(); 
            }

        } else {
            $_SESSION['message']= "fail!"; 
            $_SESSION['msg_type']= "danger"; 
            mysqli_close($conn); 
            if($page=='postedjobs')
                header("location: ../postedJobs.php");
            else  header("location: ../Search.php");
      
            exit();  }
    }
         
    

?>