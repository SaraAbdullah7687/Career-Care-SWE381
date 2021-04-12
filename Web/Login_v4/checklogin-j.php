<?php 
    session_start();
    // require_once() function can be used to include a PHP file in another one, when you may need to include the called file more than once. If it is found that the file has already been included, calling script is going to ignore further inclusions.
    require_once("CONFIG-DB.php");
    
    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);

    if(mysqli_connect_errno($con))
        die("Fail to connect to database :" . mysqli_connect_error());

    $username = $_POST['user-j'];
    $password = $_POST['pass-j'];

    $query = "SELECT * FROM job_seeker WHERE j_email = '$username' AND password = '$password'";

    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['user-j'] = $username;
        mysqli_close();
        header("Location: ../../J-Home.php");
    }
    else {
        mysqli_close();
        header("Location: logIn-j.php?error=Wrong Username/Password");
    }
?>