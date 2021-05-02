<?php

session_start();

if(isset($_POST['submit']))

    require_once('CONFIG-DB.php');// page name

    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);

    if(mysqli_connect_errno($con))
        die("Fail to connect to database :" . mysqli_connect_error());

    if(!mysqli_select_db($con, DBNAME))
        die("Could not open the ".DBNAME." database.");

	$fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $birthdate = $_POST['birthdate'];
    $nationality = $_POST['nationality'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $job = $_POST['job'];
    $major = $_POST['major'];
    $experience = $_POST['experience'];
    $skills = $_POST['skills'];

    $user = $_GET['edit'];

    $query = "UPDATE `job_seeker` SET `j_email` = '$email', `fname` = '$fName', `lname` = '$lName', `password` = '$password', `city` = '$city', `nationality` = '$nationality',`phone` = '$phone', `current_job` = '$job', `gender` = '$gender', `major` = '$major', `experience` = '$experience', `skills` = '$skills', `birthdate` = '$birthdate' WHERE `job_seeker`.`j_email` = '$user' "; // q

    if(mysqli_query($con , $query)){
        $_SESSION['j_email'] = $email;
            header("Location: ../../ProfileJS.php"); // page name
            mysqli_close($con);
    }
    else {
        echo mysqli_error($con); 
    }

?>