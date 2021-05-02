
  <?php
    session_start(); 
    if (empty($_SESSION['e_email'])|| isset($_SESSION['j_email']))
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
      <title>Employer page</title>
      <link rel="preconnect" href="https://fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
      <meta name="viewport" content="width-device-width, intial-scale=1.0"> <!-- serach this meta-->
      
      <link rel="icon" href="capture.png" type="image/png" >
       
       <!-- search about them-->
       <script src="https://kit.fontawesome.com/a41a18f86c.js" crossorigin="anonymous"></script>
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="styles.css">
       <link rel="icon" href="images/cclogo2 (1).png" type="image/png" >
       <script src="back-forward.js"></script>
    </head>


<body>
      
    <section id="header">
      <div id="UP" class="menu-bar">
          <nav class="navbar navbar-expand-lg navbar-light">
              <a class="navbar-brand" href="E-Home.php">Career<span class="care">Care</span></a>
             
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                      <a class="nav-link" href="Search (EMP).php">SEARCH</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="Ejobs.php">JOBS</a>
                    </li>

                  <li class="nav-item">
                    <a class="nav-link" href="ProfileE.php">PROFILE</a>
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

  <!--
    <div class="postBar">
        <p><a href="pastJobForm.html">Post Your Job Now!</a></p>
</div>
  -->

<!-- Button post-->
  <div id="addAdvice">   
  <a href="Web/Login_v4/pastJobForm.php?E1_email=<?php echo $_SESSION['e_email']; ?>"> <button class="btn btn-primary addAdviceBtn "><i class="fas fa-plus fa-lg"></i></button></a>
  </div>

<!--new-->

  <?php 
$sessione_eamil = $_SESSION['e_email'];
$postedJJSQuery = "SELECT * FROM `job` where `e-email`='$sessione_eamil'"; // check it raneem error
$postedJJSEesult = mysqli_query($database,$postedJJSQuery);
if($postedJJSEesult){

?> 

<section id="jobs"> 
    <!--here-->
    <div class="containerJobs">
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



    <!-- leave it -->
<form method="post" action="Web/Login_v4/editJob.php"> <?php #check get + post in each form ?>
        <div class="apply-btn">
          <input type="hidden"  name="editBtn" value="<?php echo $postedJJSData['jobID']; ?>" >
            <button   class="btn btn-primary edit"> Edit</button>   </form> 
                       
                                                                                                                      

         <form method="post" action="Ejobs.php"><!---->
         <input type="hidden"  name="deleteBtn" value="<?php echo $postedJJSData['jobID']; ?>"> 
         <button type="btn btn-primary delete"  class="btn btn-primary delete" >Delete</button> </form>


         <form method="post" action="applicants.php">
         <input type="hidden"  name="viewApp" value="<?php echo $postedJJSData['jobID']; ?>"> 
                          <button  type="submit" class="btn btn-primary viewApp"  > View Applicants </button> </form>



        
           
         
         <!--
           
         
          <form method="post" action="applicants.php" >
         <input type="hidden"  name="viewApplicantsBtn" value=""> 
        
         <button  class="btn btn-primary viewApp">  View Applicants </button> </form> 
         <a href="applicants.php?viewApplicantsBtn= </a> -->

        </div>




        

  
        </div>
  </div>
  
<?php
}#end while ?>

          
        </div>      
   </section>  <?php }#end if
   
   
   
   


   if(($_SERVER["REQUEST_METHOD"] == "POST")) {



    if (isset($_POST['deleteBtn'])) {
        $selected=$_POST['deleteBtn'];
    
     //   $deleteQuery="DELETE FROM job WHERE jobID=".$selected.";";

       # $deleteQuery=  "DELETE FROM `job` WHERE `jobID`='$selected'";

  $delete1Query=  "DELETE FROM `applicants` WHERE `job_ID`='$selected' AND `e_email`='$sessione_eamil'";
  $deleteResult1=mysqli_query($database, $delete1Query); 

  if($deleteResult1){

        $deleteQuery=  "DELETE FROM `job` WHERE `jobID`='$selected'";

        $deleteResult=mysqli_query($database, $deleteQuery); 
    
        if($deleteResult){
    
          echo   "<script> alert('Job Deleted Succsfully') </script>";  
        }}
            else 
            echo "<script> alert('Job did not delete Succsfully') </script>";  
    
        }





    }




   ?>

  <footer class="text-center">
    <a class="navbar-brand" href="V-Home.php">Career<span class="care">Care</span></a>
   
    <hr>
    <p>coded by <strong>Group#2</strong></p>
</footer>
</body>
</html>






