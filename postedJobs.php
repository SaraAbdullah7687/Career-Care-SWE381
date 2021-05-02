<?php
 session_start(); 
    if (empty($_SESSION['j_email'])||isset($_SESSION['e_email']))#change vars from Deema
   
    { 
        header("Location:Web/Login_v4/login.php");
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
    
?>

<html> 
    <head>
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
      <title>Posted Jobs</title>
      <meta name="viewport" content="width-device-width, intial-scale=1.0"> <!-- serach this meta-->
      
      <link rel="icon" href="images/cclogo2 (1).png" type="image/png" >
       <!-- search about them-->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="styles.css">
       <script src="back-forward.js"></script>
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

<section id="header"> <?php  /*EDIT extensions*/?>
        <div id ="UP" class="menu-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="J-Home.html">Career<span class="care">Care</span></a>
           
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Search.php">SEARCH</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="postedJobs.php">JOBS</a> 
                      </li>
                    <li class="nav-item">
                      <a class="nav-link" href="ProfileJS.php">PROFILE</a><!--================DEEMA-->
                    </li>
                   
                      <li class="nav-item">
                        <a class="nav-link" href="signout.php">SIGN OUT</a>
                      </li>
                      <li>
                            <div id="forward">
                              <img src="images/left-arrow.png">
                            </div>
                          </li>
                          <li>
                            <div id="back">
                              <img src="images/right-arrow.png">
                            </div>
                          </li>
                  </ul>
                </div>
              </nav>
        </div>
    </section>

    <div class="container">
    <section id="jobs"> 
    
      <div class="row "> 
        <?php
          $sql = "SELECT * FROM `job`"; 
          $count=0; 
          $ename=""; 
          if ($result = mysqli_query( $database, $sql )){
            $rnumber= mysqli_num_rows ( $result ); 
  
          while($row = $result->fetch_assoc()): 

            $eemail= $row['e-email']; 
            $jid= $row['jobID']; 
            $sql2 = "SELECT `company_name` FROM `employer` WHERE  `employer`.`e_email` = '$eemail' "; 
            if ($result2 = mysqli_query( $database, $sql2 )){
              $eresult = $result2->fetch_assoc(); 
              $ename= $eresult['company_name']; 
            } else echo "no name ";

            $count++; 

            if ($count%2==0){
            ?>
            <div class="row"> 
            <?php }  ?> 
            <div class="col-6 offset-lg-3 offset-sm-5 offset-md-3 offset-xl-3">
            <div class="company-details card" style="height: 400px; width: 600px; ">
            <div class="job-details" style="height: 90% ; overflow: hidden; ">
              <h4><b><?php echo $row['title'] ?></b></h4>
              <p><a href="ProfileER.html" style="color:black; text-decoration: none;"><?php echo $ename; ?></a></p>
              <br><i class="fa fa-briefcase" style="margin-bottom:10px ;"></i><span><?php echo $row['major'] ?></span>
              <br><i class="fa fa-check" aria-hidden="true" style="margin-bottom:10px ;"></i><span><?php echo $row['position'] ?></span>
              <br><i class="fa fa-graduation-cap" aria-hidden="true" style="margin-bottom:10px ;"></i></i><span><?php echo $row['required_qualifications'] ?></span>
              <br><i class="fa fa-map-marker" style="margin-bottom:10px ;" ></i><span> <?php echo $row['location'] ?></span>
              <br><i class="fa fa-clock-o" aria-hidden="true" style="margin-bottom:10px ;"></i><spna><?php echo $row['type'] ?></spna>
              <br>
            </div>

          <div class="apply-btn">
          <form method="post" action="ProfileER.php"><!---->
         <input type="hidden" name="viewEmpProfile" value="<?php echo $row['jobID']; ?>">

              <button  class="btn btn-primary viewPAfnan"> View Profile </a> </button> </form>

            

              <form method="post" action="jobDetails.php"><!---->

<input type="hidden" name="readMoreBtn" value="<?php echo $row['jobID']; ?>" > 
<button  class="btn btn-primary readmoreAfnan">Read More</button> </form>


           
              <a  href="PHP/apply.php?apply=<?php echo $row['jobID']; ?>&applicant=<?php echo $_SESSION['j_email']; ?>&page=postedjobs"><button class="btn btn-primary apply">Apply</button></a>
          </div> </div> </div>

        <?php 
        if ($count%2==0){
            ?> </div> <?php
        }
        endwhile;} 
        ?>
    
  
      </div>
    </section>    
    </div>
   <footer class="text-center">
    <a class="navbar-brand" href="V-Home.html">Career<span class="care">Care</span></a>
   
    <hr>
    <p>coded by <strong>Group#2</strong></p>
</footer>
</body>
</html>
 
   
  
         


          
            




