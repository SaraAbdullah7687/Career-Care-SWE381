<?php

session_start();

if(isset($_POST['submit']))

    require_once('CONFIG-DB.php'); //page name

    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);

    if(mysqli_connect_errno($con))
        die("Fail to connect to database :" . mysqli_connect_error());

    if(!mysqli_select_db($con, DBNAME))
        die("Could not open the ".DBNAME." database.");

	$Cname = $_POST['Cname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $scope = $_POST['scope'];
    $description = $_POST['description'];
    $mission = $_POST['mission'];
    $vision = $_POST['vision'];

    $user = $_GET['edit'];

    $query = "UPDATE `employer` SET `e_email` = '$email', `password` = '$password', `phone` = '$phone', `address` = '$address', `company_scope` = '$scope', `company_description` = '$description', `mission` = '$mission', `vision` = '$vision', `company_name` = '$Cname' WHERE `employer`.`e_email` = '$user'"; //q

    if(mysqli_query($con , $query)){
        $_SESSION['e_email'] = $email;
            header("Location: ../../ProfileE.php"); // page name
            mysqli_close($con);
    }
    else {
        echo mysqli_error($con);
    }

?>