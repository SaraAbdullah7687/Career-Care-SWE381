<?php 
    session_start();

    if(!isset($_SESSION['e_email']))
       header("Location: login-e.php?error=Please Login again!");//****** 

    else
    {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>POST JOB</title>
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
<body>
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
                            <a class="nav-link" href="../../signout.php">SIGN OUT</a>
                          </li>
    -->
						  <li >
                            <div id="forward">
                              <img src="images/left-arrow.png">
                            </div>
                          </li>
                          <li >
                            <div id="back" >
                              <img src="images/right-arrow.png">
                            </div>
                          </li>
                      </ul>
                    </div>
                  </nav>
            </div>
    </section>    

<!--END HEADER ########################33-->
    <div class="limiter">
        <div class="container-login100" style="background: rgb(76,81,109);
        background: linear-gradient(0deg, rgba(76,81,109,1) 0%, rgba(133,177,179,1) 82%);
                ">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" action="Postjobprocess.php?E2_email=<?php echo $_GET['E1_email']; ?>" method="post">
                    <span class="login100-form-title p-b-49">
                        JOB POST
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Reauired Feild">
                        <span class="label-input100">Job Title</span>
                        <input class="input100" type="text" name="title">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Reauired Feild">
                        <span class="label-input100">Major</span>
                        <input class="input100" type="text" name="major">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Reauired Feild">
                        <span class="label-input100">Position</span>
                        <input class="input100" type="text" name="position">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Reauired Feild">
                        <span class="label-input100">Job Description</span>
                        <input class="input100" type="text" name="description">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Reauired Feild">
                        <span class="label-input100">Required Skills</span>
                        <input class="input100" type="text" name="skills">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Reauired Feild">
                        <span class="label-input100">Required Qualifications</span>
                        <input class="input100" type="text" name="qualifications">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Reauired Feild">
                        <span class="label-input100">Location</span>
                        <input class="input100" type="text" name="location">
                        <span class="focus-input100"></span>
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Reauired Feild">
                        <span class="label-input100">Salary starts from</span>
                        <input class="input100" type="text" name="salary">
                        <span class="focus-input100"></span>
                    </div>

                    <!--
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Reauired Feild">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100"></span>
                    </div> -->
                
                    <div >
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Reauired Feild">
                        <p>Gender</p>
                        <p><input type="radio" id="male" name="gender" value="male" required="required">
                        <label for="male">Male</label></p>
                        <p><input type="radio" id="female" name="gender" value="female" required="required">
                        <label for="female">Female</label></p>
                        <p><input type="radio" id="both" name="gender" value="both" required="required">
                        <label for="both">Both</label></p><br> 
                        <span class="focus-input100"></span>
                        </div>
                    </div>
                    <div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Reauired Feild">
                        <p>Type</p>
                        <p><input type="radio" id="full" name="type" value="FullTime" required="required"> 
                        <label for="full">Full Time</label><br></p>
                        <p><input type="radio" id="part" name="type" value="PartTime"required="required">
                        <label for="part">Part Time</label><br></p>
                        <br>
                        </div>
                    </div>

                    <!-- <input type="hidden" id="E_email" name="p_email" value = "<?php echo $user ?>" > -->

                   <div class="container-login100-form-btn"> 
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <div id="NewButton"><button id="NewButton" type="submit" name="update">
                                    POST
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
     
</body>
</html>

<?php 
    }
?>