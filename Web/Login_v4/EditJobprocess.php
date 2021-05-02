<?php

session_start();

if(isset($_POST['save']))

    require_once('CONFIG-DB.php');// page name

    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);

    if(mysqli_connect_errno($con))
        die("Fail to connect to database :" . mysqli_connect_error());

    if(!mysqli_select_db($con, DBNAME))
        die("Could not open the ".DBNAME." database.");

    $getJIDfromPre = $_GET['id'];
    $title= $_POST['title'];
    $major= $_POST['major'];
    $position= $_POST['position'];
    $gender= $_POST['gender'];
    $description=$_POST['description'];
    $type=$_POST['type'];
    $salary_starts_from=$_POST['salary'];
    $required_qualifications=$_POST['qualifications'];
    $required_skills=$_POST['skills'];
    $location=$_POST['location'];


    $query = "UPDATE `job` SET `title` = '$title', `major` = '$major', `description` = '$description', `required_skills` = '$required_skills', `required_qualifications` = '$required_qualifications', `position` = '$position', `location` = '$location', `type` = '$type', `salary_starts_from` = '$salary_starts_from', `gender` = '$gender' WHERE `job`.`jobID` = '$getJIDfromPre'";

    $result=mysqli_query($con,$query);

     if($result){
        header("Location: ../../Ejobs.php");
        mysqli_close($con);
     }
     else{
         echo mysqli_error($con); 
     }

?>