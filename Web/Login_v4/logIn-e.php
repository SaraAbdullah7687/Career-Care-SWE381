<?php 
    session_start();
    
    // Check if the user has already logged in
    if(isset($_SESSION['e_email']))
        // header() is used to send a raw HTTP header. It must be called before any actual output is sent.

        header("Location: ../../E-Home.php"); // NEED to be fixed > it is outside the folder (DONE fixing)

    else
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
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
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<link rel="stylesheet" type="text/css" href="css/header.css">
	<script src="../../back-forward.js"></script>


<!--===============================================================================================-->


</head>
<body >
		<section id="header">
            <div class="menu-bar">
                <nav class="navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand" href="../../E-Home.php"><img src="images\logo.png" alt="logo" width="120px" height="30px" style="margin-top: -10px; margin-left: -2px; "></a>
               
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav ml-auto">
        
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


	
	<div class="limiter">
		<div class="container-login100" style="background: rgb(76,81,109);
		background: linear-gradient(0deg, rgba(76,81,109,1) 0%, rgba(133,177,179,1) 82%);
				">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="checklogin-e.php" method="post">
					<span class="login100-form-title p-b-49">
						LOGIN
					</span>
					

					<div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
						<span class="label-input100">Email</span>
						<input class="input100" type="text" name="e_email" placeholder="Type your Email">
						<span class="focus-input100" data-symbol="&#xf206;"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Password is required">
						<span class="label-input100">Password</span>
						<input class="input100" type="password" name="pass-e" placeholder="Type your password">
						<span class="focus-input100" data-symbol="&#xf190;"></span>
					</div>
					
					<div class="text-right p-t-8 p-b-31">
						<a href="forgetPass.html">
							Forgot password?
						</a>
					</div>
					
					<div class="container-login100-form-btn">
					 <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button id="NewButton" type="submit" style="width: 100%; "><a class="login100-form-btn" style="color: white;">
                                    LOGIN </a>
                            </button>
                        </div>
					</div>
<!------------------------------------------------>
					<div class="flex-col-c p-t-155">

						<a href="SignUPENEW.html" class="txt2">
							Sign Up
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>
	
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
<?php
    }
?>