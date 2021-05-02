<?php
	session_start(); 

	if(!(isset($_SESSION['j_email'])))
	header("Location: ../../V-Home.php?error=Please Sign in again!");//log in 

	if(!($conn = mysqli_connect("localhost", "root", "")))
		die("<p> couldnt connect </p>"); 
							
	if(!mysqli_select_db($conn,"group2db"))
		die("<p> failed <p>");	

   
   if(isset($_GET['j-Selectj']) && $_GET['j-jobChoice']!="") {
	$option = $_GET['j-jobChoice'] ;  
   	} else {
		
			$_SESSION['message']= "please select a job."; 
			$_SESSION['msg_type']= "danger"; 
			header("location: j-Select job.php");
			exit(); 
	 
   	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Select Interview</title>
    <link rel="icon" href="images/cclogo2 (1).png" type="image/png" >
	<meta charset="UTF-8">
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
                            <div id="forward" >
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

	<?php require_once '../../PHP/Set Interview.php' ?> 
	<div class="limiter">
		<div class="container-login100" style="background: rgb(76,81,109);
		background: linear-gradient(0deg, rgba(76,81,109,1) 0%, rgba(133,177,179,1) 82%);
				">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="width: 32.5%;  ">
				<form class="login100-form validate-form" style="width: 100%; min-height: 520px; position: relative; ">
					<span class="login100-form-title p-b-49" style="width: 110%; margin-left: -5%">
						INTERVIEW APPOINTMENT
					</span>

						
					<div class="validate-input m-b-20  " style="font-size: large;">
						<?php
							$jID= $_GET['j-jobChoice']; 
					
							$jobTitle= "SELECT `title` FROM job WHERE jobID = '$jID'";

							if ($jtitle = mysqli_query( $conn, $jobTitle)){
								$row1 = $jtitle->fetch_assoc(); 
								echo "Available dates for <strong style='color: cadetblue; font-weight: bold; '>" . $row1['title'] . "</strong> job:";

							}
							else die("cant"); 
						?>
					</div>

	   				<input type="hidden" value="<?php echo $_GET['j-jobChoice'] ?>" name="j-jobPick">

					<?php
						$e =  $_SESSION['j_email']; 
						$q= "SELECT * FROM interview WHERE jobID = '$jID' AND `status` = 'available'"; 
						if ($result = mysqli_query( $conn, $q )){
						}
						else die("cant"); 					
					?>

					<div id="avaTimes2" class="m-b-23 row justify-content-center">
						<table class="table justify-content-center m-b-15">
							<thead> 
								<tr>
									<th>DATE</th>
									<th>TIME</th>
									<th></th>
								</tr>
							</thead>	

							<?php
								while($row = $result->fetch_assoc()): 
							?> 
							<tr>
								<td><?php echo $row['Date']; ?></td>
								<td><?php echo $row['Time']; ?></td>
								<td style="text-align: center;"> <a href="../../PHP/Pick interview.php?Pick=<?php echo $row['JobID']; ?>&Date=<?php echo $row['Date']; ?>&Time=<?php echo $row['Time']; ?>&Interviewee=<?php echo $e ?>" class="btn" style="font-size: smaller; color: white; background-color: cadetblue;">
								 Pick</a>
								</td> 
							</tr>
							<?php endwhile; ?>
						</table>
					</div>
					<!--------- --------->

					<div class="validate-input m-b-20 " style="font-size: large;">
						<span class="label-input100 rforms" style="font-size: large;">Scheduled Interview:</span>
					</div>

	   				<input type="hidden" value="<?php echo $_GET['j-jobChoice'] ?>" name="j-jobPick">

					<?php
						$personal= "SELECT * FROM interview WHERE jobID = '$jID' AND `bookedBy` = '$e'"; 
						if ($personalInt = mysqli_query( $conn, $personal )){
						}
						else die("cant"); 					
					?>

					<div id="bookedDates" class="m-b-23 row justify-content-center">
						<table class="table justify-content-center m-b-50">
							<thead> 
								<tr>
									<th>DATE</th>
									<th>TIME</th>
									<th></th>
								</tr>
							</thead>	

							<?php
								while($intRow = $personalInt->fetch_assoc()): 
							?> 
							<tr>
								<td><?php echo $intRow['Date']; ?></td>
								<td><?php echo $intRow['Time']; ?></td>
								<td style="text-align: center;"> <a href="../../PHP/Pick interview.php?Cancel=<?php echo $intRow['JobID']; ?>&Date=<?php echo $intRow['Date']; ?>&Time=<?php echo $intRow['Time']; ?>&Interviewee=<?php echo $e ?>" class="btn" style="font-size: smaller; color: white; background-color: cadetblue;">
								 Cancel</a>
								</td> 
							</tr>
							<?php endwhile; ?>
						</table>
					</div>


					<div class="container-login100-form-btn" >
						<div class="wrap-login100-form-btn" style="position: absolute; bottom:0; ">
							<div class="login100-form-bgbtn"></div>
							<a href="../../J-Home.php" class="login100-form-btn">
								SUBMIT
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

</body>
</html>