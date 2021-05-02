<?php


if(!isset($_SESSION)) 
{ 
    session_start(); 
} 

    if(!($conn = mysqli_connect("localhost", "root", "")))
        die("<p> couldnt connect </p>"); 
                            
    if(!mysqli_select_db($conn,"group2db"))
        die("<p> failed <p>");  

    if(isset($_POST['addTime'])){
        $time = $_POST['time']; 
        $date = $_POST['date']; 
        $jobId =  $_POST['jobPick']; 
                

        $q= "INSERT INTO interview (jobID, Date, Time, status) VALUES ('$jobId','$date','$time', 'available')"; 
        if ($result = mysqli_query( $conn, $q )){
            mysqli_close($conn); 
            $_SESSION['message']= "New interview date has been added succefully!"; 
            $_SESSION['msg_type']= "success"; 

            header("location: ../Web/Login_v4/E-interview.php?jobChoice=$jobId&Selectj=");
        }
        else die("cant2"); 
    }

    if(isset($_GET['delete'])){
        $jd = $_GET['delete']; 
        $time2= $_GET['Time']; 
        $date3= $_GET['Date']; 


        $sql= "DELETE FROM `interview` WHERE `interview`.`JobID` = '$jd' AND `interview`.`Date` = '$date3' AND `interview`.`Time` = '$time2' LIMIT 1"; 

        if (mysqli_query($conn, $sql)) {
            $_SESSION['message']= "Date has been deleted succefully!"; 
            $_SESSION['msg_type']= "success"; 
            mysqli_close($conn); 
            header("location: ../Web/Login_v4/E-interview.php?jobChoice=$jd&Selectj=");

        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }

         
    }

?>