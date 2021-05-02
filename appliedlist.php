
<?php 
session_start(); 
    if (empty($_SESSION['j_email'])|| isset($_SESSION['e_email']))#change vars from Deema
   
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
      <title>Applied list</title>
      <meta name="viewport" content="width-device-width, intial-scale=1.0"> <!-- serach this meta-->
      
      <link rel="icon" href="images/cclogo2 (1).png" type="image/png" >
       
       <!-- search about them-->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
       <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
       <link rel="stylesheet" href="styles.css">
       <script src="back-forward.js"></script>
    </head>


<body>
 
    <section id="header">
        <div id="UP" class="menu-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="#">Career<span class="care">Care</span></a>
           
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
if(isset($_GET['jsPK'])){
  $getj_EfromPre=$_GET['jsPK'];
  #check the condition for a specific btn?and may we use the array its indecids equals to tha #atts
$appliedJJSQuery = "SELECT job.title,job.major,job.position,job.required_qualifications,job.location,job.jobID
FROM applicants,job
where applicants.job_ID=job.jobID  AND applicants.j_email='" . $_SESSION['j_email'] . "' AND (accepted=-1 OR accepted=1) ";
#(applicants.status=-1 OR applicants.status=1) since if app rejected; useless to be in the list
##check vars from Deema
$postedJJSEesult = mysqli_query($database, $appliedJJSQuery);

    
     
if($postedJJSEesult){

?> <section id="jobs"> 
    <!--here-->
    <div class="containerJobs">
       
<?php
while($postedJJSData= mysqli_fetch_assoc($postedJJSEesult)){
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




        <!--Get insted?-->
       

        <!--OLD-->
     
        <form method="post" action="cancel.php"> 
                 <div class="apply-btn">
                 <input type="hidden"  name="canceBtn" value="<?php echo $postedJJSData['jobID']; ?>" > 
            <button type="submit" class="btn btn-primary .apply"> Cancel</button>
         </form>
                  </div>

    
  </div>
  </div>
<?php
}#end while ?>

           
     

        </div>      
   </section>  <?php }#end if
   
   else echo   "<script> alert('There Are No Posted Jobs') </script>";  
   
   












   

   
       


mysqli_close($database); } #end outer if  ?> 




   


   <footer class="text-center">
    <a class="navbar-brand" href="V-Home.html">Career<span class="care">Care</span></a>
   
    <hr>
    <p>coded by <strong>Group#2</strong></p>
</footer>
</body>
</html>