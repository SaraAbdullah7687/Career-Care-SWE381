<?php

session_start();

if(isset($_POST['update']))

   require_once('CONFIG-DB.php');
    
    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);

    if(mysqli_connect_errno($con)){
        die("Fail to connect to database :" . mysqli_connect_error());
    }

    $email = $_GET['E2_email']; 
    $id = rand(10,10000);
    $title = $_POST['title'];
    $major = $_POST['major'];
    $description = $_POST['description'];
    $skills = $_POST['skills'];
    $qualifications = $_POST['qualifications'];
    $position = $_POST['position'];
    $location = $_POST['location'];
    $type = $_POST['type'];
    $salary = $_POST['salary'];
    $gender = $_POST['gender'];
    
        
    echo "OMG" . $id . "OMG";


    $query="INSERT INTO `job`(`jobID`, `title`, `major`, `description`, `required_skills`, `required_qualifications`, 
        `position`, `location`, `type`, `salary_starts_from`,`gender`,`e-email`) VALUES ('$id','$title','$major',
        '$description','$skills','$qualifications','$position','$location','$type','$salary','$gender','$email')";

        $resuelt=mysqli_query($con,$query); 

        if($resuelt){
        //echo "<script> alert('Job is posted!')</script>"; 
        header("Location: ../../Ejobs.php");
        mysqli_close($con);
        }
        else{
            echo mysqli_error($con);    
        }
    