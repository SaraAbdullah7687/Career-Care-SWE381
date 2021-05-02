<?php
session_start();

if(isset($_POST['submit']))

    require_once('CONFIG-DB.php'); // page name

    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);
    if(mysqli_connect_errno($con))
    die("Fail to connect to database :" . mysqli_connect_error());

    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $birthdate = $_POST['birthdate'];// Change the type in DB
    $nationality = $_POST['nationality'];
    $city = $_POST['city'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $job = $_POST['job'];
    $major = $_POST['major'];
    $experience = $_POST['experience'];
    $skills = $_POST['skills'];

    // Check if the email already exits ********
    $queryc = "SELECT * FROM `job_seeker` WHERE j_email = '$email' ";

        $result=mysqli_query($con,$queryc);
        if (mysqli_num_rows($result)>0)
        {
            header("Location: ../../V-Home.php?error=email exist"); // page name
            mysqli_close($con);
            exit;
        }

    $query="INSERT INTO `job_seeker` (`fname`, `lname`, `j_email`, `password`, `birthdate`, `nationality`, `city`, `phone`, `gender`, `current_job`, `major`, `experience`, `skills`) VALUES ('$fName', '$lName', '$email' , '$password', '$birthdate', '$nationality', '$city', '$phone', '$gender', '$job', '$major', '$experience', '$skills')";
    
    if(mysqli_query($con , $query)){
        $_SESSION['j_email'] = $email;
            header("Location: ../../ProfileJS.php"); // page name
            mysqli_close($con);
    }
    else {
        echo "Error: ". mysqli_error($con);
    }

?>