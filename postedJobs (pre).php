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
    




<?php 
$postedJJSQuery = "SELECT * FROM job";
$postedJJSEesult = mysqli_query($database,$postedJJSQuery);
if($postedJJSEesult){

?> <section id="jobs"> 
    <!--here-->
    <div class="containerJobs">
        <!--here-->
        <?php

while($postedJJSData= mysqli_fetch_assoc($postedJJSEesult))
{

?>
  
  <div class="company-details card">
  <div class="job-details">
    
      <h4><b> <?php echo $postedJJSData['title'] ?> </b></h4>

      <i class="fa fa-briefcase" ></i><span><?php echo $postedJJSData['major']; ?></span>
<br>
      <i class="fa fa-check" aria-hidden="true"></i><span> <?php echo $postedJJSData['position']; ?></span>
<br>

      <i class="fa fa-graduation-cap" aria-hidden="true"></i></i><span><?php echo $postedJJSData['required_qualifications']; ?></span>
<br>
      <i class="fa fa-map-marker" ></i><span><?php echo $postedJJSData['location']; ?></span>
<br>

<div class="apply-btn">

        <!--Get insted?-->
       
        <form method="post" action="">
          <button  class="btn btn-primary apply"  name="applyBtn" value="<?php echo $postedJJSData['jobID']; ?>">  Apply </button> </form>
          

         <form method="post" action="ProfileER.php"><!---->
         <input type="hidden" name="viewEmpProfile" value="<?php echo $postedJJSData['jobID']; ?>"> 

        
       
         <button  class="btn btn-primary viewPAfnan"  > View Profile </a> </button> 
         </form>
         <form method="post" action="jobDetails.php"><!---->

         <input type="hidden" name="readMoreBtn" value="<?php echo $postedJJSData['jobID']; ?>"> 
         <button  class="btn btn-primary readmoreAfnan">Read More</button> </form>

        </div>

    
    

  </div>
  </div>
<?php
}#end while ?>

     
 
        </div>      
   </section> <?php }#end if
   
   else echo "<script> alert('There Is No Posted Jobs') </script>"; 
   
   
   
  

   
   
        if (isset($_POST['applyBtn'])) {

            $selected= $_POST['applyBtn'];
            
         

            $getE_emailQuery = "SELECT `e_email` FROM `job` where `jobID`='$selected'"; #add e_email fk to the applicants table
            $result0 = mysqli_query($database, $getE_emailQuery);

           $j_email=$_SESSION['j_email'];

            if ($result0) { #$getE_emailQuery
              #$j_email

                $query= "INSERT INTO `applicants` (`jobID`, `e_email`, `j_email`, `accepted`) VALUES ('$selected','$getE_emailQuery','$j_email', '-1')"; 



                $applyResult= mysqli_query($database, $query);

                if ($applyResult)
    echo "<script> alert('You have applied for this job successfully') </script>"; 

                        else
                        echo "<script> alert('An error occured while inserting the applicant into the applicants table.') </script>"; 
                          
                    } else
                    echo "<script> alert('An error occured while get the e_email Query from the job table.') </script>"; 
                      
                }

             /*   if (isset($_POST['viewEmpProfile'])) {
                    $empProSelected = $_POST['viewEmpProfile'];#the ID of this emp
                    $getEmpProQuery = "SELECT * FROM employer where  e_email=" . $empProSelected . ";";
                    $empProResult = mysqli_query($database, $getEmpProQuery);
                    if( $empProResult) {
                    #Disiplay the Emp info
                }#end $empProResult result

                    else echo  ?> "<script> alert('There Is No Employer Profile') </script>";  <?php
                }*/




            
            mysqli_close($database);

  

?>
 
   <footer class="text-center">
    <a class="navbar-brand" href="V-Home.html">Career<span class="care">Care</span></a>
   
    <hr>
    <p>coded by <strong>Group#2</strong></p>
</footer>
</body>
</html>
 
   
  
         


          
            




