<?php


if(!isset($_SESSION)) 
{ 
    session_start(); 
}

    if(!($conn = mysqli_connect("localhost", "root", "")))
        die("<p> couldnt connect </p>"); 
                            
    if(!mysqli_select_db($conn,"group2db"))
        die("<p> failed <p>");  


    if(isset($_GET['Pick'])){
        $jd = $_GET['Pick']; 
        $time= $_GET['Time']; 
        $date= $_GET['Date']; 
        $inter= $_GET['Interviewee']; 
        $count; 

        $sql= "SELECT * FROM `interview` WHERE `interview`.`JobID` = '$jd' AND `interview`.`bookedBy` = '$inter';"; 

        if ($result = mysqli_query( $conn, $sql )){

        }
        else die(mysqli_error($conn)); 

        while($row = $result->fetch_assoc()): 

            $count++; 

        endwhile;
        
        if ($count == 0) {

            $sql2= "UPDATE `interview` SET `bookedBy` = '$inter', `status`='booked' WHERE `interview`.`JobID` = '$jd' AND `interview`.`Date` = '$date' AND `interview`.`Time` = '$time' LIMIT 1;"; 

            if (mysqli_query($conn, $sql2)) {

                $_SESSION['message']= "interview has been booked successfully!"; 
                $_SESSION['msg_type'] = "success"; 

                mysqli_close($conn); 
                header("location: ../Web/Login_v4/j-interview.php?j-jobChoice=$jd&j-Selectj=");
            }
            else {
                echo "Error: " . mysqli_error($conn);  
   
           }
               
        } else {
            $_SESSION['message']= "already picked interview for this job!"; 
            $_SESSION['msg_type'] = "danger"; 

            header("location: ../Web/Login_v4/j-interview.php?j-jobChoice=$jd&j-Selectj=");
        }

    }


    if(isset($_GET['Cancel'])){
        $jd = $_GET['Cancel']; 
        $time= $_GET['Time']; 
        $date= $_GET['Date']; 
        $inter= $_GET['Interviewee']; 
        $count; 

        $sql= "SELECT * FROM `interview` WHERE `interview`.`JobID` = '$jd' AND `interview`.`bookedBy` = '$inter';"; 

        if ($result = mysqli_query( $conn, $sql )){

        }
        else die("cant"); 

        while($row = $result->fetch_assoc()): 

            $count++; 

        endwhile;
        
        if ($count > 0) {

            $sql2= "UPDATE `interview` SET `bookedBy` = NULL, `status`='available' WHERE `interview`.`JobID` = '$jd' AND `interview`.`bookedBy` = '$inter';"; 

            if (mysqli_query($conn, $sql2)) {

                $_SESSION['message']= "Interview removed successfully!"; 
                $_SESSION['msg_type'] = "success"; 
    
                

                mysqli_close($conn); 
                header("location: ../Web/Login_v4/j-interview.php?j-jobChoice=$jd&j-Selectj=");
            }
            else {
                echo "Error: " . mysqli_error($conn);  
   
           }
               
        } else {
            header("location: ../Web/Login_v4/j-interview.php?j-jobChoice=$jd&j-Selectj=");
        }

    }

    


?>