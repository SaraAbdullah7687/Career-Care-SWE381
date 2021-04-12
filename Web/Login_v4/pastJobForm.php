<?php 
    session_start();

    if(!isset($_SESSION['user-e']))
	   header("Location: login-e.php?error=Please Login again!");//****** 

    else
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>POST JOB</title>
	<meta charset="UTF-8">
    <link rel="icon" href="/images/cclogo2 (1).png" type="image/png" >
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
</head>
<body>
	
	<div class="limiter">
		<div class="container-login100" style="background: rgb(76,81,109);
		background: linear-gradient(0deg, rgba(76,81,109,1) 0%, rgba(133,177,179,1) 82%);
				">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" action="pastjobform.php" method="post"> <!--***************CHECK*******************-->
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
				
					<div>

						<p>Gender</p>
						<input type="radio" id="male" name="gender" value="male">
						<label for="male">Male</label><br>
						<input type="radio" id="female" name="gender" value="female">
						<label for="female">Female</label><br>
						<input type="radio" id="female" name="gender" value="female">
						<label for="female">Both</label>

					</div>
					<div>
<hr>
						<p>Type</p>
						<input type="radio" id="male" name="type" value="fulltime"> 
						<label for="male">Full Time</label><br>
						<input type="radio" id="female" name="type" value="parttime">
						<label for="female">Part Time</label><br>

					</div><br>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<a href="" class="login100-form-btn">
							<button type="submit">	Post  </button>
							</a>
						</div>
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


<?php
//===========================================================================================================
if ($_SERVER["REQUEST_METHOD"]=="POST"){
	require_once("CONFIG-DB.php");
    
    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);

    if(mysqli_connect_errno($con)){
        die("Fail to connect to database :" . mysqli_connect_error());
	}

		$id = $_POST['id'];//**************************************************CHECK */

		$title = $_POST['title'];
		$major = $_POST['major'];
		$description = $_POST['description'];
		$skills = $_POST['skills'];
		$qualifications = $_POST['qualifications'];
		$position = $_POST['position'];
		$location = $_POST['location'];
		$type = $_POST['type'];
		$salary = $_POST['salary'];
		
		//gender = $_POST['gender'];
		
			$query="INSERT INTO job (jobID, title, major, description, required_skills, required_qualifications, 
			position, location, type, salary_starts_from) VALUES ('".$id."', '".$title."', '".$major."', '".$description."', '".$skills."', 
			'".$qualifications."', '".$position."', '".$location."', '".$type."', '".$salary."');";

$resuelt=mysqli_query($con,$query);	

if($resuelt){
	header("location: ../../postedJobs.php");//***********************CHECK */
}else echo "An error occured while inserting into the job table";
}
//===========================================================================================================
?>	


</body>
</html>

<?php 
    }
?>
				