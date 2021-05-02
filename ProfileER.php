<!DOCTYPE html>

<html>
<?php
/*session_start(); 
    if (empty($_SESSION['j_email'])|| isset($_SESSION['e_email']))#change vars from Deema
   
    { 
        header("Location:Web/Login_v4/login.php");
        exit();
    } */
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

<head>
    <meta charset="utf-8">
    <title> Profile </title>
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
    <link rel="icon" href="images/cclogo2 (1).png" type="image/png" >
    <link rel="preconnect" href="https://fonts.gstatic.com">

    <script src="back-forward.js"></script>
</head>

<body class="profileBodyE">






                    <section id="header">
                    <div class="menu-bar">
                        <nav class="navbar navbar-expand-lg navbar-light">
                            <a class="navbar-brand" href="E-Home.html">Career<span class="care">Care</span></a>
                           
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                              <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse" id="navbarNav">
                              <ul class="navbar-nav ml-auto">
                                <li class="nav-item">
                                  <a class="nav-link" href="Search.php">SEARCH</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link" href="postedjobs.php">JOBS</a><!--====AFNAN-->
                                </li>
                             
            
                              <li class="nav-item">
                                <a class="nav-link" href="ProfileER.php">PROFILE</a><!--======DEEMA-->
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


                <div class="profile-container">
                      <div class="profile-menu">
                          <div class="image-container">
                              <img src="images/profilePHOTO.webp" width="143" height="148" alt="profile Photo" class="imgD">
                          </div>
                          
                </div>  <?php  #make sure of DB connection





  $getPKEmpfromPre=$_POST['viewEmpProfile']; 

                    $getEmpProQuery= "SELECT `e-email` FROM `job` WHERE  `jobID`='$getPKEmpfromPre'";
                    $empResult = mysqli_query($database, $getEmpProQuery);
                   

                   

                    if($empResult) {
                      $row1= mysqli_fetch_row($empResult);
                      $row2=$row1[0];
                    $Query= "SELECT * FROM `employer` where `e_email`='$row2'";

                    

                    $empProResult = mysqli_query($database, $Query);
                   
                    if($empProResult) { 
                      while($row= mysqli_fetch_assoc($empProResult)){
                        
                      ?>
                      
                 
                <div class="ProfileInfoE">
                  <form method="post" action="">
            
            
                      <label>Company's name:</label>
                      <p> <?php  echo $row['company_name'];?>
                      </p>
            
                      <label>Email:</label>
                      <p><?php  echo $row['e_email']; ?></p>
            
            
                      <label>Phone number:</label>
                      <p><?php  echo $row['phone']; ?></p>
            
            
                      <label>Address:</label>
                      <p> <?php  echo $row['address']; ?></p>
            
            
                      <label>Company scope:</label>
                      <p><?php  echo $row['company_scope']; ?></p>

            
                      <label>Description of company:</label>
                      <p><?php  echo $row['company_description']; ?>
                      </p>
            
            
                      <label>Mission:</label>
                      <p><?php  echo $row['mission']; ?></p>
            
            
                      <label>Vision:</label>
                      <p> <?php  echo $row['vision']; ?></p>
            
                     
                  </form>
             
                  </div> 
            </div>
                    
<?php
                    
                
                     } }}#end $empProResult result

                    else "<script> alert('There Is No Employer Profile') </script>"; 



?>
    
    
    <footer class="text-center">
      <a class="navbar-brand" href="V-Home.php">Career<span class="care">Care</span></a>
     
      <hr>
      <p>coded by <strong>Group#2</strong></p>
  </footer>
</body>
</html>
