<?php
    session_start();

    if(isset($_SESSION['e_email']) || !isset($_SESSION['j_email']))
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

    $query = "SELECT * FROM `job_seeker` WHERE `j_email` LIKE '$user'";

    

    if($result = mysqli_query($con , $query)){
        while($row = mysqli_fetch_row($result)){
        $email =       $row[2];
        $name =      $row[0];
        $lname =      $row[1];
        $password =   $row[3]; 
        $city =        $row[6];
        $nationality = $row[5];  
        $phone =       $row[7];
        $job =         $row[9];  
        $gender =      $row[8];
        $major=        $row[10];  
        $experience =  $row[11];
        $skills =      $row[12];  
        $birthdate =    $row[4];
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
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/header.css">

<!--===============================================================================================-->


</head>
<body>
        <section id="header">
            <div class="menu-bar">
                <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="../../J-Home.php"><img src="images\logo.png" alt="logo" width="120px" height="30px" style="margin-top: -10px; margin-left: -2px; "></a>
               
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav ml-auto">
                          <!--
                        <li class="nav-item" >
                            <a class="nav-link" href="../../Search.php"  >SEARCH</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="../../postedJobs.php">JOBS</a>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link" href="../../ProfileJS.php">PROFILE</a>
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
                <form class="login100-form validate-form" method="post" action="EditProfileJSprocess.php?edit=<?php echo $user; ?>" id="SignUPJS"><!-- page name -->
                    <span class="login100-form-title p-b-49">
                        Edit Profile
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">First Name</span>
                        <input class="input100" type="text" name="fName" id="form_fname" value="<?php echo $name ?>">
                        <span class="focus-input100" id="fname_error_message"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Last Name</span>
                        <input class="input100" type="text" name="lName" id="form_lname" value="<?php echo $lname ?>">
                        <span class="focus-input100" id="lname_error_message"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" name="email" id="form_email" value="<?php echo $email ?>">
                        <span class="focus-input100" id="email_error_message"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Password </span>
                        <input class="input100" type="text" name="password" id="form_password" value="<?php echo $password ?>">
                        <span class="focus-input100" id="password_error_message"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Birth date</span>
                        <input class="input100" type="date" max="2003-12-31" min="1970-01-01" name="birthdate" id="form_birthdate" value="<?php echo $birthdate ?>">
                        <span class="focus-input100" id="date_error_message"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Nationality</span>
                        <input class="input100" type="text" name="nationality" id="form_empty" value="<?php echo $nationality ?>">
                        <span class="focus-input100" id="empty_error_message"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">City</span>
                        <input class="input100" type="text" name="city" id="form_empty1" value="<?php echo $city ?>">
                        <span class="focus-input100" id="empty_error_message1"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Phone number</span>
                        <input class="input100" type="text" name="phone" id="form_phone" value="<?php echo "0". $phone ?>"
                        pattern="[0]{1}[5]{1}[0-9]{8}">
                        <span class="focus-input100" id="phone_error_message"></span>
                    </div>

                    <div>

                        <span class="label-input100">Gender</span><br><br>
                        <div class="wrap-input100 validate-input m-b-23" id="form_gender">
                            <p><input type="radio" id="male" name="gender" value="male" 
                                <?php 
                                if ($gender == 'male')
                                    echo "checked" ?>
                                >
                                <label for="male">Male</label><br>
                            </p>
                            <p><input type="radio" id="female" name="gender" value="female" 
                                <?php 
                                if ($gender == 'female')
                                    echo "checked" 
                                ?>
                                >
                                <label for="female">Female</label><br>
                            </p><br>
                            <span class="focus-input100" id="gender_error_message"></span>
                        </div>

                    </div>
                    <br>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Current job</span>
                        <input class="input100" type="text" name="job" id="form_empty2" value="<?php echo $job ?>">
                        <span class="focus-input100" id="empty_error_message2"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Major</span>
                        <input class="input100" type="text" name="major" id="form_empty3" value="<?php echo $major ?>">
                        <span class="focus-input100" id="empty_error_message3"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Experience</span>
                        <textarea class="input100" name="experience" cols="25" rows="3" id="form_empty4"><?php echo $experience ?></textarea>
                        <span class="focus-input100" id="empty_error_message4"></span>
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate="Reauired Feild">
                        <span class="label-input100">Skills</span>
                        <textarea class="input100" name="skills" cols="25" rows="3" id="form_empty5"><?php echo $skills ?></textarea>
                        <span class="focus-input100" id="empty_error_message5"></span>
                    </div>
                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" id="NewButton" type="submit" name="submit">
                                Update
                            </button>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>


    <script type="text/javascript">
        $(document).ready(function() {

            $("#fname_error_message").hide();
            $("#lname_error_message").hide();
            $("#email_error_message").hide();
            $("#password_error_message").hide();
            $("#phone_error_message").hide();
            $("#gender_error_message").hide();
            $("#empty_error_message").hide();
            $("#empty_error_message1").hide();
            $("#empty_error_message2").hide();
            $("#empty_error_message3").hide();
            $("#empty_error_message4").hide();
            $("#empty_error_message5").hide();
            $("#date_error_message").hide();

            var error_fname = false;
            var error_lname = false;
            var error_email = false;
            var error_password = false;
            var error_phone = false;
            var error_gender = false;
            var error_empty = false;
            var error_empty1 = false;
            var error_empty2 = false;
            var error_empty3 = false;
            var error_empty4 = false;
            var error_empty5 = false;
            var error_date = false;


            $("#form_fname").focusout(function() {
                check_fname();
            });

            $("#form_lname").focusout(function() {
                check_lname();
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

            $("#form_gender").focusout(function() {
                check_gender();
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
            $("#form_empty5").focusout(function() {
                check_empty5();
            });

            $("#form_birthdate").focusout(function() {
                check_date();
            });

            function check_fname() {
                var pattern = /^[a-zA-Z]*$/;
                var fname = $("#form_fname").val();
                if (pattern.test(fname) && fname !== '') {
                    $("#fname_error_message").hide();
                    $("#form_fname").css("border-bottom", "2px solid #34F458");

                } 
                else if (!pattern.test(fname)){
                    $("#fname_error_message").html("*Only Characters are allowed");
                    $("#fname_error_message").show();
                    $("#fname_error_message").css("text-align", "right");
                    $("#fname_error_message").css("font-size", "12px");
                    $("#fname_error_message").css("padding-top", "5px");
                    $("#fname_error_message").css("color", "#F90A0A");
                    $("#form_fname").css("border-bottom", "2px solid #F90A0A");
                    error_fname = true;

                }

                else {
                    $("#fname_error_message").html("*Required");
                    $("#fname_error_message").show();
                    $("#fname_error_message").css("text-align", "right");
                    $("#fname_error_message").css("font-size", "12px");
                    $("#fname_error_message").css("padding-top", "5px");
                    $("#fname_error_message").css("color", "#F90A0A");
                    $("#form_fname").css("border-bottom", "2px solid #F90A0A");
                    error_fname = true;
                }
            }

            function check_lname() {
                var pattern = /^[a-zA-Z]*$/;
                var lname = $("#form_lname").val();
                if (pattern.test(lname) && lname !== '') {
                    $("#lname_error_message").hide();
                    $("#form_lname").css("border-bottom", "2px solid #34F458");

                } 
                else if(!pattern.test(lname)){
                 $("#lname_error_message").html("*Only Characters are allowed");
                    $("#lname_error_message").show();
                    $("#lname_error_message").css("text-align", "right");
                    $("#lname_error_message").css("font-size", "12px");
                    $("#lname_error_message").css("padding-top", "5px");
                    $("#lname_error_message").css("color", "#F90A0A");
                    $("#form_lname").css("border-bottom", "2px solid #F90A0A");
                    error_lname = true;   
                }
                else {
                    $("#lname_error_message").html("*Required");
                    $("#lname_error_message").show();
                    $("#lname_error_message").css("text-align", "right");
                    $("#lname_error_message").css("font-size", "12px");
                    $("#lname_error_message").css("padding-top", "5px");
                    $("#lname_error_message").css("color", "#F90A0A");
                    $("#form_lname").css("border-bottom", "2px solid #F90A0A");
                    error_lname = true;
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
                if (phone_length < 10 || phone_length > 10) {
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

            function check_gender() {
                var isSelected = $("input[type='radio']:checked").val();
                if (!isSelected) {
                    $("#gender_error_message").html("*Required");
                    $("#gender_error_message").show();
                    $("#gender_error_message").css("text-align", "right");
                    $("#gender_error_message").css("font-size", "12px");
                    $("#gender_error_message").css("padding-top", "5px");
                    $("#gender_error_message").css("color", "#F90A0A");
                    error_gender = true;
                } else {
                    $("#gender_error_message").hide();
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

            function check_empty5() {
                var fields = $("#form_empty5").val();
                if (fields !== '' && fields !== ' ') {
                    $("#empty_error_message5").hide();
                    $("#form_empty5").css("border-bottom", "2px solid #34F458");

                } else {
                    $("#empty_error_message5").html("*Required");
                    $("#empty_error_message5").show();
                    $("#empty_error_message5").css("text-align", "right");
                    $("#empty_error_message5").css("font-size", "12px");
                    $("#empty_error_message5").css("padding-top", "5px");
                    $("#empty_error_message5").css("color", "#F90A0A");
                    $("#form_empty5").css("border-bottom", "2px solid #F90A0A");
                    error_empty5 = true;
                }
            }

            function check_date() {
                var field = $("#form_birthdate").val();
                if (field !== '' && field !== ' ') {
                    $("#date_error_message").hide();
                    $("#form_birthdate").css("border-bottom", "2px solid #34F458");
                } else {
                    $("#date_error_message").html("*Required");
                    $("#date_error_message").show();
                    $("#date_error_message").css("text-align", "right");
                    $("#date_error_message").css("font-size", "12px");
                    $("#date_error_message").css("padding-top", "5px");
                    $("#date_error_message").css("color", "#F90A0A");
                    $("#form_birthdate").css("border-bottom", "2px solid #F90A0A");
                    error_date = true;
                }
            }

            $("#SignUPJS").submit(function() {
                error_fname = false;
                error_lname = false;
                error_email = false;
                error_password = false;
                error_phone = false;
                error_gender = false;
                error_empty = false;
                error_empty1 = false;
                error_empty2 = false;
                error_empty3 = false;
                error_empty4 = false;
                error_empty5 = false;
                error_date = false;

                check_fname();
                check_lname();
                check_email();
                check_password();
                check_phone();
                check_gender();
                check_empty();
                check_empty1();
                check_empty2();
                check_empty3();
                check_empty4();
                check_empty5();
                check_date();

                if (error_fname === false && error_lname === false && error_email === false && error_password === false && error_phone === false && error_gender === false && error_empty === false && error_empty1 === false && error_empty2 === false && error_empty3 === false && error_empty4 === false && error_empty5 === false && error_date === false) {
                    alert("Updated");
                    return true;
                } else {
                    alert("Please Fill the form Correctly");
                    return false;
                }


            });

        });

    </script>

    <footer class="text-center">
      <a class="navbar-brand" href="../../J-Home.php">Career<span class="care">Care</span></a>
     
      <hr>
      <p>coded by <strong>Group#2</strong></p>
  </footer>

</body>

</html>

<?php
   
}

?>

