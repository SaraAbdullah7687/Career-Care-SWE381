<?php 
    session_start();
    // require_once() function can be used to include a PHP file in another one, when you may need to include the called file more than once. If it is found that the file has already been included, calling script is going to ignore further inclusions.
    define("DBHOST","localhost");
    define("DBUSER","root");
    define("DBPWD","");
    define("DBNAME","group2db");
    
    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);

    if(mysqli_connect_errno($con))
        die("Fail to connect to database :" . mysqli_connect_error());

    $username = $_POST['j_email'];
    $password = $_POST['pass-j'];
    
    $query = "SELECT job_seeker.j_email, job_seeker.password FROM `job_seeker` WHERE `j_email` = '$username' AND `password` = '$password'";
     
    $result = mysqli_query($con,$query);

    if(mysqli_num_rows($result) > 0){
        $_SESSION['j_email'] = $username;
        mysqli_close();
        header("Location: ../../J-Home.php");
    }
    else {
       # echo mysqli_error($con);
        mysqli_close();
        header("Location: logIn-j.php?error=Wrong Username/Password");
    }
?>