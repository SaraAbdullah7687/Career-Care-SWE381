<?php
session_start(); 
    if (empty($_SESSION['e_email'])|| isset($_SESSION['j_email']))#change vars from Deema
    { 
        header("Location: V-Home.php");
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


<!DOCTYPE html>
<html>


<head>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet">
   <!--- <script src="https://kit.fontawesome.com/a41a18f86c.js" crossorigin="anonymous"></script>-->
    <title>Applicants</title>
    <link rel="icon" href="images/cclogo2 (1).png" type="image/png" >
    <script src="back-forward.js"></script>
</head>
<body >
    <section id="header">
        <div id="UP" class="menu-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="E-Home.html">Career<span class="care">Care</span></a>
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="Search (EMP).php">SEARCH</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="Ejobs.php">JOBS</a><!--====AFNAN-->
                      </li>
                    

                    <li class="nav-item">
                      <a class="nav-link" href="ProfileE.php">PROFILE</a><!--======DEEMA-->
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

 #take this link to Afnan where the view applicant btn is (<a href='applicants.php?JID=".$data[0]."'> View applicants</a>)


 if(isset($_POST['viewApp'])){
 
  $getJIDfromPre= $_POST['viewApp'];




 $jsNameExpQuery = "SELECT applicants.j_email, job_seeker.fname,job_seeker.lname,job_seeker.experience 
 FROM applicants,job_seeker 
 where applicants.e_email='" . $_SESSION['e_email'] . "' AND job_ID='$getJIDfromPre' AND job_seeker.j_email=applicants.j_email AND applicants.accepted='-1'"; 
                

                $appsListResult=mysqli_query($database,$jsNameExpQuery);

                if($appsListResult){
                
                    ?>
                 <form method="post" action="accept.php">
                
                 <div class="position-relative">
                         <section class="container general_view"> 
                             <section id="search-result2">
                                 <div class="row">
                                 <div class="col-10 offset-lg-1 offset-sm-1 offset-md-1 offset-xl-1">
                                     <div id="1st-row">
                                         <div class="card-columns">
                 
                                         <?php
                
                
                
                
                                                  while($appsListData= mysqli_fetch_assoc($appsListResult)) # while
                                                  {
                                                      
                                                   ?> 
                                        
                 
                                               
                                     <div id="c1r1-card" class="card" style="background-color: rgba(240, 248, 255, 0.315); border: 1px solid cadetblue;">
                                         <div class="card-body">  
                                                     <h4 class="card-title d-block">
                                                         <?php 
                 
                                                                      echo $appsListData['fname']; 
                                                                      echo " ";
                                                                      echo $appsListData['lname'];?> </h4>
                                                                      <p class="card-text"><?php echo $appsListData['experience'];?></p>
                                          </div>
                 
                                                <div class="center-btn">
                
                                                <form method="post" action="accept.php">
                        <!--Get insted?-->   

                        <input type="hidden" name="JID"  value="<?php echo $getJIDfromPre; ?>"> 
                        <button  type="submit" class="btn btn-primary acc" style="margin-left:15px;"   name="acc" value="<?php echo $appsListData['j_email']; ?>"> Accept </button>
                        <button   type="submit" class="btn btn-primary rej" style="margin-left:7px;"    name="rej"  value="<?php echo $appsListData['j_email']; ?>"> Reject </button> </form>
                
                          <form method="post" action="ProfileJSR.php">
                          <input type="hidden" name="viewJSprofile"  value="<?php echo $appsListData['j_email']; ?>"> 
                          <button class="btn btn-primary viewApplicants" style="margin-left:30px; width:110px;"  >View</button> </form>
                                                  </div>
                                            
                
                
                                                 </div>
                             <?php } #end  while  ?>
                             </div>
                             </div>
                                 </div>
                                 </div>
                  </section><!--2ed section-->
                 
                 
                  </section><!--1st section-->
                             </div> <!--1st div-->
                             
                             <?php } }#end if
                                 else 
                                 echo "<script> alert('No applicants list!')</script>"; 
                                                 ?>
                 
                                            
                 
                 
                 
                 
                 
                                         
                                     </form>
                         
                
                                     <?php 
                

#ACCEPT OR REJECT PART

                      
   
?>
    


    
    <footer class="text-center">
        <a class="navbar-brand" href="#">Career<span class="care">Care</span></a>
        <hr>
        <p>coded by <strong>Group#2</strong></p>
    </footer>
</body>
</html>