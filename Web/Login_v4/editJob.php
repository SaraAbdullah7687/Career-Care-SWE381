
<?php 
session_start(); 
    if (empty($_SESSION['e_email']) || isset($_SESSION['j_email']))
   
    { 
        header("Location: login-e.php");
        exit();
    } 
    
      /////////////////////
	  define("DBHOST","localhost");
      define("DBUSER","root");
      define("DBPWD","");
      define("DBNAME","group2db");
      //Create New Database Connection
  
  $database = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);
  
  if(mysqli_connect_errno($database))
      die("Fail to connect to database :" . mysqli_connect_error());
  
  if ( !mysqli_select_db($database, DBNAME ) )
  die( "<p>Could not open URL database</p>" );
/////////////////////

  $getJIDfromPre= $_POST['editBtn'];

  $jobInfoQuery = "SELECT * FROM `job` where `jobID`='$getJIDfromPre'"; #applicants.accepted=-1; not rejected or accepted yet
                  # applicants.JID=job.JID take it from Afnan

$jobInfoResult=mysqli_query($database,$jobInfoQuery);
  

?>

<!DOCTYPE html>
<html lang="en">
<head>
		<title>EDIT JOB</title>
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
</head>

<body>

<?php 

if($jobInfoResult){ 
	while($jobInfoData = mysqli_fetch_assoc($jobInfoResult) ) { 
                                  
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
						  <li >
	-->
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
		
<!--END HEADER ########################33-->
	<div class="limiter">
		<div class="container-login100" style="background: rgb(76,81,109);
		background: linear-gradient(0deg, rgba(76,81,109,1) 0%, rgba(133,177,179,1) 82%);
				">
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
				<form class="login100-form validate-form" method="POST" action="EditJobprocess.php?id=<?php echo $getJIDfromPre ?>">
					<span class="login100-form-title p-b-49">
						JOB EDITING
					</span>

					<div class="wrap-input100 m-b-23">
						<span class="label-input100">Job Title</span>
						<input class="input100" type="text" name="title" value="<?php  echo  $jobInfoData['title'] ?>">
						
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 m-b-23">
						<span class="label-input100">Major</span>
						<input class="input100" type="text" name="major" value="<?php  echo  $jobInfoData['major'] ?>">
						<span class="focus-input100"></span>
					</div>
					<div class="wrap-input100 m-b-23">
						<span class="label-input100">Position</span>
						<input class="input100" type="text" name="position" value="<?php  echo  $jobInfoData['position'] ?>">
						<span class="focus-input100">    </span>
					</div>
					<div class="wrap-input100 m-b-23" >
						<span class="label-input100">Job Description</span>
						<input class="input100" type="text" name="description" value="<?php  echo  $jobInfoData['description'] ?>">
						<span class="focus-input100">    </span>
					</div>
					<div class="wrap-input100 m-b-23">
						<span class="label-input100">Required Skills</span>
						<input class="input100" type="text" name="skills" value="<?php  echo  $jobInfoData['required_skills'] ?>">
						<span class="focus-input100">  </span>
					</div>
					<div class="wrap-input100 m-b-23">
						<span class="label-input100">Required Qualifications</span>
						<input class="input100" type="text" name="qualifications" value="<?php  echo  $jobInfoData['required_qualifications'] ?> ">
						<span class="focus-input100">   </span>
					</div>
					<div class="wrap-input100 m-b-23">
						<span class="label-input100">Location</span>
						<input class="input100" type="text" name="location" value="<?php  echo  $jobInfoData['location'] ?>">
						<span class="focus-input100">  </span>
					</div>
					<div class="wrap-input100 m-b-23">
						<span class="label-input100">Salary starts from</span>
						<input class="input100" type="text" name="salary" value="<?php  echo  $jobInfoData['salary_starts_from'] ?>">
						<span class="focus-input100"></span>
					</div>
				
			
					<div class="wrap-input100 m-b-23">
					<div>

						<p>Gender</p>
						<?php  $Gender= $jobInfoData['gender'] ;
						if( $Gender=='male'){
						?>
						<p><input type="radio" id="male" name="gender" value="male" checked="checked" >
						<label for="male">Male</label><br><p>
						<p><input type="radio" id="female" name="gender" value="female">
						<label for="female">Female</label><br></p>
						<p><input type="radio" id="both" name="gender" value="both">
						<label for="female">Both</label></p> <?php }

						elseif( $Gender=='female'){
							?>
							<p><input type="radio" id="male" name="gender" value="male" >
							<label for="male">Male</label><br></p>
							<p><input type="radio" id="female" name="gender" value="female" checked="checked">
							<label for="female">Female</label><br></p>
							<p><input type="radio" id="both" name="gender" value="both">
							<label for="female">Both</label> </p><?php
						}

						else {?>
						<p><input type="radio" id="male" name="gender" value="male" >
							<label for="male">Male</label><br></p>
							<p><input type="radio" id="female" name="gender" value="female" >
							<label for="female">Female</label><br></p>
							<p> <input type="radio" id="both" name="gender" value="both" checked="checked">
							<label for="female">Both</label> </p>
						<?php } ?>
						
						
						
						<br>
					</div></div>
						
					<div>
                      <p>Type</p>
						<?php  $Type= $jobInfoData['type'] ;
						if($Type=='FullTime'){
						?>
						<p><input type="radio" id="full" name="type" value="FullTime" checked="checked">
						<label for="full">Full Time</label><br></p>
						<p> <input type="radio" id="part" name="type" value="PartTime">
						<label for="part">Part Time</label><br></p> 
						<?php }

						elseif ($Type=='PartTime'){ 
													?>
						<p><input type="radio" id="full" name="type" value="FullTime">
						<label for="full">Full Time</label><br></p>

						<p><input type="radio" id="part" name="type" value="PartTime" checked="checked">
						<label for="part">Part Time</label><br> </p>   <?php    } ?>


						
						

					</div><br>
					
					<div class="container-login100-form-btn">
					<div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <div id="NewButton">
							<button id="NewButton" type="submit" name="save" > SAVE </button>
							<!-- <input id="NewButton" type="submit" name="update" value="SAVE"> -->
                                  
                                
                            </div>
                        </div>
					</div>

				</form>
			</div>
		</div>
	</div>
	

	
	<?php } }
	
	else echo "<script> alert('Can't edit the job')</script>"; 
	
	
	?>


<?php
mysqli_close($database);
?>

</body>
</html>