<?php

session_start();

if(isset($_POST['submit']))

    require_once('CONFIG-DB.php');

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

    $queryc = "SELECT * FROM `employer` WHERE `e_email` = '$email' ";

        $result=mysqli_query($con,$queryc);
        if (mysqli_num_rows($result)>0)
        {
            header("Location: ../../V-Home.php?error=email exist"); // page name
            mysqli_close($con);
            exit;
        }


    $query="INSERT INTO `employer` (`e_email`, `password`, `phone`, `address`, `company_scope`, `company_description`, `mission`, `vision`, `company_name`) VALUES ('$email', '$password', '$phone', '$address', '$scope', '$description', '$mission', '$vision', '$Cname');"; 

    if(mysqli_query($con , $query)){
        $_SESSION['e_email'] = $email;
            header("Location: ../../ProfileE.php"); //page name  , location 
            mysqli_close($con);
    }
    else {
        echo mysqli_error($con); 
    }

?>