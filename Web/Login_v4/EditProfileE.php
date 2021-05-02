<?php
    session_start();

    if(!isset($_SESSION['e_email']) || isset($_SESSION['j_email']))
       header("Location:V-Home.php?error=Please Sign in again!");//log in 

    else
    {

    require_once('CONFIG-DB.php');

    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);

    if(mysqli_connect_errno($con))
    die("Fail to connect to database :" . mysqli_connect_error());
    
    if(!mysqli_select_db($con, DBNAME))
    die("Could not open the ".DBNAME." database.");
    $user = $_GET['edit'];

    $query = "SELECT * FROM `employer` WHERE `e_email` LIKE '$user'"; //q

    

    if($result = mysqli_query($con , $query)){
        while($row = mysqli_fetch_row($result)){

        $email =        $row[0];
        $password =     $row[1];
        $phone =        $row[2]; 
        $address =      $row[3]; 
        $scope =        $row[4];
        $description =  $row[5];  
        $mission =      $row[6];
        $vision  =      $row[7]; 
        $cname =        $row[8];
        }
    }
    else {
        echo mysqli_error($con);
    }
    mysqli_close($con);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Edit Profile</title>
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
    <link rel="stylesheet" type="text/css" href="../../styles.css">
    <!--===============================================================================================-->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
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
        <div class="container-login100" style="background: rgb(76,81,109); background: linear-gradient(0deg, rgba(76,81,109,1) 0%, rgba(133,177,179,1) 82%);">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" id="SignUPE" method="post" action="EditProfileEprocess.php?edit=<?php echo $user; ?>"> <!-- page name --> 
                    <span class="login100-form-title p-b-49">
                        Edit Profile
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Company's name</span>
                        <input class="input100" type="text" name="Cname" id="form_Cname" value="<?php echo $cname ?>">
                        <span class="focus-input100" id="Cname_error_message"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Email </span>
                        <input class="input100" type="text" name="email" id="form_email" value="<?php echo $email ?>">
                        <span class="focus-input100" id="email_error_message"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Password </span>
                        <input class="input100" type="text" name="password" id="form_password" value="<?php echo $password ?>">
                        <span class="focus-input100" id="password_error_message"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Phone number</span>
                        <input class="input100" type="text" name="phone" id="form_phone" value="<?php echo "0" . $phone ?>" pattern="[0]{1}[5]{1}[0-9]{8}">
                        <span class="focus-input100" id="phone_error_message"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Address </span>
                        <textarea class="input100" name="address" cols="25" rows="3" id="form_empty" ><?php echo $address?></textarea>
                        <span class="focus-input100" id="empty_error_message"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Company scope</span>
                        <textarea class="input100" name="scope" cols="25" rows="3" id="form_empty1"><?php echo $scope?></textarea>
                        <span class="focus-input100" id="empty_error_message1"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Description of company </span>
                        <textarea class="input100" name="description" cols="25" rows="3" id="form_empty2"><?php echo $description?></textarea>
                        <span class="focus-input100" id="empty_error_message2"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Mission</span>
                        <textarea class="input100" name="mission" cols="25" rows="3" id="form_empty3"><?php echo $mission?></textarea>
                        <span class="focus-input100" id="empty_error_message3"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Vision </span>
                        <textarea class="input100" name="vision" cols="25" rows="3" id="form_empty4"><?php echo $vision?></textarea>
                        <span class="focus-input100" id="empty_error_message4"></span>
                    </div>



                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <div id="NewButton"><button id="NewButton" type="submit" name="submit">
                                    Update
                                </button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    
    <script type="text/javascript">
        $(document).ready(function() {

            $("#Cname_error_message").hide();
            $("#email_error_message").hide();
            $("#password_error_message").hide();
            $("#phone_error_message").hide();
            $("#empty_error_message").hide();
            $("#empty_error_message1").hide();
            $("#empty_error_message2").hide();
            $("#empty_error_message3").hide();
            $("#empty_error_message4").hide();

            var error_Cname = false;
            var error_email = false;
            var error_password = false;
            var error_phone = false;
            var error_empty = false;
            var error_empty1 = false;
            var error_empty2 = false;
            var error_empty3 = false;
            var error_empty4 = false;


            $("#form_Cname").focusout(function() {
                check_Cname();
            });

            $("#form_email").focusout(function() {
                check_email();
            });

            $("#form_password").focusout(function() {
                check_password();
            });

            $("#form_phone").focusout(function() {
                check_phone();
            });

            $("#form_empty").focusout(function() {
                check_empty();
            });

            $("#form_empty1").focusout(function() {
                check_empty1();
            });
            $("#form_empty2").focusout(function() {
                check_empty2();
            });
            $("#form_empty3").focusout(function() {
                check_empty3();
            });
            $("#form_empty4").focusout(function() {
                check_empty4();
            });


            function check_Cname() {
                var pattern = /^[a-zA-Z]*$/;
                var Cname = $("#form_Cname").val();
                if (pattern.test(Cname) && Cname !== '') {
                    $("#Cname_error_message").hide();
                    $("#form_Cname").css("border-bottom", "2px solid #34F458");

                } else if (!pattern.test(Cname)){
                    $("#Cname_error_message").html("*Only Characters are allowed");
                    $("#Cname_error_message").show();
                    $("#Cname_error_message").css("text-align", "right");
                    $("#Cname_error_message").css("font-size", "12px");
                    $("#Cname_error_message").css("padding-top", "5px");
                    $("#Cname_error_message").css("color", "#F90A0A");
                    $("#form_Cname").css("border-bottom", "2px solid #F90A0A");
                    error_Cname = true;

                }

                else {
                    $("#Cname_error_message").html("*Required");
                    $("#Cname_error_message").show();
                    $("#Cname_error_message").css("text-align", "right");
                    $("#Cname_error_message").css("font-size", "12px");
                    $("#Cname_error_message").css("padding-top", "5px");
                    $("#Cname_error_message").css("color", "#F90A0A");
                    $("#form_Cname").css("border-bottom", "2px solid #F90A0A");
                    error_Cname = true;
                }
            }

            function check_email() {
                var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var email = $("#form_email").val();
                if (pattern.test(email) && email !== '') {
                    $("#email_error_message").hide();
                    $("#form_email").css("border-bottom", "2px solid #34F458");
                } else {
                    $("#email_error_message").html("*Invalid Email");
                    $("#email_error_message").show();
                    $("#email_error_message").css("text-align", "right");
                    $("#email_error_message").css("font-size", "12px");
                    $("#email_error_message").css("padding-top", "5px");
                    $("#email_error_message").css("color", "#F90A0A");
                    $("#form_email").css("border-bottom", "2px solid #F90A0A");
                    error_email = true;
                }
            }

            function check_password() {
                var password_length = $("#form_password").val().length;
                if (password_length < 8) {
                    $("#password_error_message").html("*At least 8 Characters");
                    $("#password_error_message").show();
                    $("#password_error_message").css("text-align", "right");
                    $("#password_error_message").css("font-size", "12px");
                    $("#password_error_message").css("padding-top", "5px");
                    $("#password_error_message").css("color", "#F90A0A");
                    $("#form_password").css("border-bottom", "2px solid #F90A0A");
                    error_password = true;
                } else {
                    $("#password_error_message").hide();
                    $("#form_password").css("border-bottom", "2px solid #34F458");
                }
            }

            function check_phone() {
                var phone_length = $("#form_phone").val().length;
                var phone = $("#form_phone").val();
                var pattern = /^[0]{1}[5]{1}[0-9]{8} *$/;
                if (phone_length < 10 || phone_length > 10 ) {
                    $("#phone_error_message").html("*Only 10 digits");
                    $("#phone_error_message").show();
                    $("#phone_error_message").css("text-align", "right");
                    $("#phone_error_message").css("font-size", "12px");
                    $("#phone_error_message").css("padding-top", "5px");
                    $("#phone_error_message").css("color", "#F90A0A");
                    $("#form_phone").css("border-bottom", "2px solid #F90A0A");
                    error_phone = true;
                }
                else if (!pattern.test(phone)){

                    $("#phone_error_message").html("*Phone format 05xxxxxxxx");
                    $("#phone_error_message").show();
                    $("#phone_error_message").css("text-align", "right");
                    $("#phone_error_message").css("font-size", "12px");
                    $("#phone_error_message").css("padding-top", "5px");
                    $("#phone_error_message").css("color", "#F90A0A");
                    $("#form_phone").css("border-bottom", "2px solid #F90A0A");
                    error_phone = true;
                } 
                else {
                    $("#phone_error_message").hide();
                    $("#form_phone").css("border-bottom", "2px solid #34F458");
                }
            }

            function check_empty() {
                var fields = $("#form_empty").val();
                if (fields !== '' && fields !== ' ') {
                    $("#empty_error_message").hide();
                    $("#form_empty").css("border-bottom", "2px solid #34F458");

                } else {
                    $("#empty_error_message").html("*Required");
                    $("#empty_error_message").show();
                    $("#empty_error_message").css("text-align", "right");
                    $("#empty_error_message").css("font-size", "12px");
                    $("#empty_error_message").css("padding-top", "5px");
                    $("#empty_error_message").css("color", "#F90A0A");
                    $("#form_empty").css("border-bottom", "2px solid #F90A0A");
                    error_empty = true;
                }
            }

            function check_empty1() {
                var fields = $("#form_empty1").val();
                if (fields !== '' && fields !== ' ') {
                    $("#empty_error_message1").hide();
                    $("#form_empty1").css("border-bottom", "2px solid #34F458");

                } else {
                    $("#empty_error_message1").html("*Required");
                    $("#empty_error_message1").show();
                    $("#empty_error_message1").css("text-align", "right");
                    $("#empty_error_message1").css("font-size", "12px");
                    $("#empty_error_message1").css("padding-top", "5px");
                    $("#empty_error_message1").css("color", "#F90A0A");
                    $("#form_empty1").css("border-bottom", "2px solid #F90A0A");
                    error_empty1 = true;
                }
            }

            function check_empty2() {
                var fields = $("#form_empty2").val();
                if (fields !== '' && fields !== ' ') {
                    $("#empty_error_message2").hide();
                    $("#form_empty2").css("border-bottom", "2px solid #34F458");

                } else {
                    $("#empty_error_message2").html("*Required");
                    $("#empty_error_message2").show();
                    $("#empty_error_message2").css("text-align", "right");
                    $("#empty_error_message2").css("font-size", "12px");
                    $("#empty_error_message2").css("padding-top", "5px");
                    $("#empty_error_message2").css("color", "#F90A0A");
                    $("#form_empty2").css("border-bottom", "2px solid #F90A0A");
                    error_empty2 = true;
                }
            }

            function check_empty3() {
                var fields = $("#form_empty3").val();
                if (fields !== '' && fields !== ' ') {
                    $("#empty_error_message3").hide();
                    $("#form_empty3").css("border-bottom", "2px solid #34F458");

                } else {
                    $("#empty_error_message3").html("*Required");
                    $("#empty_error_message3").show();
                    $("#empty_error_message3").css("text-align", "right");
                    $("#empty_error_message3").css("font-size", "12px");
                    $("#empty_error_message3").css("padding-top", "5px");
                    $("#empty_error_message3").css("color", "#F90A0A");
                    $("#form_empty3").css("border-bottom", "2px solid #F90A0A");
                    error_empty3 = true;
                }
            }

            function check_empty4() {
                var fields = $("#form_empty4").val();
                if (fields !== '' && fields !== ' ') {
                    $("#empty_error_message4").hide();
                    $("#form_empty4").css("border-bottom", "2px solid #34F458");

                } else {
                    $("#empty_error_message4").html("*Required");
                    $("#empty_error_message4").show();
                    $("#empty_error_message4").css("text-align", "right");
                    $("#empty_error_message4").css("font-size", "12px");
                    $("#empty_error_message4").css("padding-top", "5px");
                    $("#empty_error_message4").css("color", "#F90A0A");
                    $("#form_empty4").css("border-bottom", "2px solid #F90A0A");
                    error_empty4 = true;
                }
            }

            $("#SignUPE").submit(function() {
                error_Cname = false;
                error_email = false;
                error_password = false;
                error_phone = false;
                error_empty = false;
                error_empty1 = false;
                error_empty2 = false;
                error_empty3 = false;
                error_empty4 = false;

                check_Cname();
                check_email();
                check_password();
                check_phone();
                check_empty();
                check_empty1();
                check_empty2();
                check_empty3();
                check_empty4();

                if (error_Cname === false && error_email === false && error_password === false && error_phone === false && error_empty === false && error_empty1 === false && error_empty2 === false && error_empty3 === false && error_empty4 === false) {
                    alert("Updated Successfull");
                    return true;
                } else {
                    alert("Please Fill the form Correctly");
                    return false;
                }

            });

        });

    </script>
    
    <footer class="text-center">
      <a class="navbar-brand" href="../../E-Home.php">Career<span class="care">Care</span></a>
     
      <hr>
      <p>coded by <strong>Group#2</strong></p>
  </footer>

</body>

</html>

<?php
   
}

?>
