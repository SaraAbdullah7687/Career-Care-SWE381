<?php
session_start(); 
    if (empty($_SESSION['e_email'])|| isset($_SESSION['j_email']))#change vars from Deema
   
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
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title> Profile </title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="icon" href="images/cclogo2 (1).png" type="image/png" >

</head>

<body>
<section id="header">
        <div class="menu-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="E-Home.php">Career<span class="care">Care</span></a>
               
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                  <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                      <a class="nav-link" href="Search (EMP).php">SEARCH</a> <!-- page name --> 
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" href="Ejobs.php?E_email=<?php echo $email; ?>">JOBS</a> <!-- page name --> 
                    </li>
                 
                  <li class="nav-item">
                    <a class="nav-link" href="ProfileE.php">PROFILE</a> <!-- page name --> 
                  </li>
                 
                    <li class="nav-item">
                      <a class="nav-link" href="signout.php">SIGN OUT</a> <!-- page name --> 
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
   
<?php $getPKJsfromPre=$_POST['viewJSprofile']; #make sure of DB connection


$getJsProQuery = "SELECT * FROM `job_seeker` where  `j_email`='$getPKJsfromPre'";

                    $jsProResult = mysqli_query($database, $getJsProQuery);
                    if( $jsProResult) { 
                 




while($row = mysqli_fetch_assoc($jsProResult)){

    ?>


<body class="profileBodyJS">

    <div class="profile-container">

        <div class="profile-menu">
            <div class="image-container">
            <img src="images/profilePHOTO.webp" width="143" height="128" alt="profile Photo" class="imgD">
            </div>
        </div>

        <div class="ProfileInfoJS">
            <form method="post" action="">
             
                <div id="firstN">
                    <label>First Name:</label>
                    <p> <?php  echo $row['fname']; ?> </p>
                </div>

                <div id="lastN">
                    <label>Last Name</label>
                    <p><?php  echo $row['lname'] ;?></p>
                </div>
                
                <div id="phoneN">
                    <label>Phone number:</label>
                    <p><?php  echo $row['phone'] ;?></p>
                </div>
                
                <div id="Email">
                    <label>Reach me via:</label>
                    <p><a href="mailto:<?php  echo $row['j_email']; ?>"><?php  echo $row['j_email'] ?></a> </p>
                </div>
                
                <div id="birthD">
                    <label>Birth date: </label>
                    <p><?php  echo $row['birthdate']; ?></p>
                </div>

               <div id="Gender">
                    <label>Gender:</label>
                    <p> <?php  echo $row['gender']; ?> </p>
                </div> 

                <div id="Nationality">
                    <label>Nationality:</label>
                    <p><?php  echo $row['nationality']; ?></p>
                </div>

                <div id="City">
                    <label>City:</label>
                    <p><?php  echo $row['city']; ?></p>
                </div>

                <div id="major">
                    <label>Major:</label>
                    <p><?php  echo $row['major']; ?></p>
                </div>

                <div id="CurrentJ">
                    <label>Current job:</label>
                    <p><?php  echo $row['current_job']; ?></p>
                </div>

                <div id="exp">
                    <label>Experience:</label>
                    <P><?php  echo $row['experience'];?></p>
                </div>

                <div id="skills">
                    <label>Skills:</label>
                    <p> <?php  echo $row['skills'];?></p>
                </div>

            </form>
        </div>
    </div> <?php }  #end while 
    
}#end if
    ?>
    
    
    <footer class="text-center">
        <a class="navbar-brand" href="V-Home.php">Career<span class="care">Care</span></a>
       
        <hr>
        <p>coded by <strong>Group#2</strong></p>
    </footer>
    </body>

</html>
