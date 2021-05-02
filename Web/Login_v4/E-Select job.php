<?php
    session_start(); 

  if(!(isset($_SESSION['e_email'])))
    header("Location: ../../V-Home.php?error=Please Sign in again!");//log in 

  if(!($database = mysqli_connect("localhost", "root", "")))
    die("<p> couldnt connect </p>"); 
    
  if(!mysqli_select_db($database,"group2db"))
    die("<p> failed <p>");  

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Select Job</title>
    <meta charset="UTF-8">
    <link rel="icon" href="images/cclogo2 (1).png" type="image/png" >
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <script src="https://kit.fontawesome.com/a41a18f86c.js" crossorigin="anonymous"></script>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">  
    <script src="http://code.jquery.com/jquery-1.9.0.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/header.css">
	<script src="../../back-forward.js"></script>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">

<!--===============================================================================================-->


</head>
<body>

<?php 
	
	if (isset($_SESSION['message'])){

		?>
		
		<div class="alert alert-<?=$_SESSION['msg_type'] ?>" >
	
		<?php echo $_SESSION['message'];  
		unset($_SESSION['message']); ?> 
	
		</div>
		
		<?php
	}
	
?> 

        <section id="header">
            <div class="menu-bar">
                <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="../../E-Home.php"><img src="images\logo.png" alt="logo" width="120px" height="30px" style="margin-top: -10px; margin-left: -2px; "></a>
               
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav ml-auto">
                          <!--
                        <li class="nav-item" >
                            <a class="nav-link" href="../../Search (EMP).php"  >SEARCH</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../../Ejobs.php">JOBS</a>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link" href="../../ProfileE.php">PROFILE</a>
                        </li>
                       
                          <li class="nav-item">
                            <a class="nav-link" href="../../V-Home.php">SIGN OUT</a>
                          </li>
-->
                          <li >
                            <div id="forward">
                              <img src="images/left-arrow.png">
                            </div>
                          </li>
                          <li >
                            <div id="back">
                              <img src="images/right-arrow.png">
                            </div>
                          </li>
                      </ul>
                    </div>
                  </nav>
            </div>
      </section>    


  <?php require_once '../../PHP/Set Interview.php' ?> 
    <div class="limiter">
        <div class="container-login100" style="background: rgb(76,81,109);
        background: linear-gradient(0deg, rgba(76,81,109,1) 0%, rgba(133,177,179,1) 82%);
                ">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="width: 32.5%; min-height: 500px">
                <form class="login100-form validate-form" method="GET" id="sjForm" action="E-interview.php" style="width: 100%;" >
                    <span class="login100-form-title p-b-49" style="width: 120%; margin-left: -10%">
                        INTERVIEW SCHEDULE
                    </span>

                    <div class="validate-input m-b-10">
                        <span class="label-input100 " style="font-size: large;" >Choose job:</span>
                    </div>

                    <div class="input100 validate-input" style="margin-bottom: 30%">
                        <select name="jobChoice" id="jobChoice" style="  width: 99% !important; border: none; border-radius: 2px; margin-left: -20px;">
                            <option value=""> Jobs </option>
                            <?php
                                                            
                                $e =  $_SESSION['e_email']; 

                                $query= "SELECT * FROM job WHERE `e-email` = '$e' "; 
                                if (!($result = mysqli_query( $conn, $query ))){
                                    die("cant"); 
                                } else {
                                while($row = $result->fetch_assoc()): 
                                ?> 
                                <option value="<?php echo $row['jobID'] ?>" > <?php echo $row['title']; ?> </option>

                            <?php endwhile; } ?>    
                                    
                            
                        </select>
                    </div>

                    <div class="container-login100-form-btn" style="width: 100%; ">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" style="text-align: center; width: 100%;" name="Selectj" ><a style="color: white;" class="login100-form-btn" >
                                Select
                            </a></button>
                            
                        </div>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    

    
<!--===============================================================================================-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/bootstrap/js/popper.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="vendor/daterangepicker/moment.min.js"></script>
    <script src="vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="js/main.js"></script>

</body>
</html>

