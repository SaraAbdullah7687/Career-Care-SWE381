<?php
	session_start(); 

	if(!(isset($_SESSION['e_email'])))
	header("Location:../../V-Home.php?error=Please Sign in again!");//log in 

	if(!($conn = mysqli_connect("localhost", "root", "")))
		die("<p> couldnt connect </p>"); 
							
	if(!mysqli_select_db($conn,"group2db"))
		die("<p> failed <p>");	

   
   if (isset($_GET['Selectj']) && $_GET['jobChoice']!="" ) {
		$option = $_GET['jobChoice']; 
   	} else {
		$_SESSION['message']= "please select a job."; 
		$_SESSION['msg_type']= "danger"; 
		header("location: E-Select job.php");
	    exit(); 
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Set Interview</title>
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

	<?php require_once '../../PHP/Set Interview.php' ?> 
	<div class="limiter">
		<div class="container-login100" style="background: rgb(76,81,109);
		background: linear-gradient(0deg, rgba(76,81,109,1) 0%, rgba(133,177,179,1) 82%);
				">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54" style="width: 32.5%;">
				<form class="login100-form validate-form" method="Post" id="eiForm" style="width: 100%; " action="../../PHP/Set Interview.php" >
					<span class="login100-form-title p-b-49"  style="width: 120%; margin-left: -10% ">
						INTERVIEW SCHEDULE
					</span>


					<div class="validate-input m-b-10" >
						<span class="label-input100 rforms" style="font-size: large;" >Enter Date:</span>
					</div>

					<div class="wrap-input100 validate-input" style=" width: 90%; margin-left: 20px" >
						<input class="input100"  type="date" id="intvDate" name="date" style="margin-left: -20px;">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input  m-b-30" style=" width: 90%; margin-left: 20px" >
						<input class="input100" type="time" name="time" id="intvTime" style="margin-left: -20px;" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn" style="width: 50%; margin-left: 25%;">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<button style="text-align: center; width: 100%;" id="addDT" name="addTime"><a style="color: white;" class="login100-form-btn" >
								add time
							</a></button>
							
						</div>
					</div>
					<div class="validate-input m-b-20 m-t-30">
						<span class="label-input100 rforms" style="font-size: large;">Scheduled Dates:</span>
					</div>

	   				<input type="hidden" value="<?php echo $_GET['jobChoice'] ?>" name="jobPick">

					<?php
						
						$jID= $_GET['jobChoice']; 
				
						$q= "SELECT * FROM interview WHERE JobID = '$jID'"; 
						if ($result = mysqli_query( $conn, $q )){
						}
						else die("cant"); 
										
					?>

					<div id="avaTimes2" class="m-b-23 row justify-content-center" style="width: 110%">
						<table class="table justify-content-center">
							<thead> 
								<tr>
									<th >DATE</th>
									<th >TIME</th>
									<th>INTERVIEWEE</th>
									<th></th>
								</tr>
							</thead>	

							<?php
								while($row = $result->fetch_assoc()): 
							?> 
							<tbody >
							<tr >
								<td><?php echo $row['Date']; ?></td>
								<td ><?php echo $row['Time']; ?></td>
								<td ><?php echo $row['bookedBy']; ?></td>
								<td>
								 <a href="../../PHP/Set Interview.php?delete=<?php echo $row['JobID']; ?>&Date=<?php echo $row['Date']; ?>&Time=<?php echo $row['Time']; ?>" class="btn" style="font-size: smaller; color: white; background-color: cadetblue;">
								 delete</a> 
								</td>
							</tr>
							</tbody> 
							<?php endwhile; ?>
						</table>
					</div>
					
					<div class="container-login100-form-btn">
						<div class="wrap-login100-form-btn">
							<div class="login100-form-bgbtn"></div>
							<a href="../../E-Home.php" class="login100-form-btn">
								Submit
							</a>
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

