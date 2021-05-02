<?php
session_start(); 
    if (empty($_SESSION['j_email'])|| isset($_SESSION['e_email']))#change vars from Deema
   
    { 
        header("Location:Web/Login_v4/V-Home.php");
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
      <title>Job details</title>
      <meta name="viewport" content="width-device-width, intial-scale=1.0"> <!-- serach this meta-->
       <link rel="stylesheet" href="styles.css"><!-- put our css-->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
       <link rel="icon" href="images/cclogo2 (1).png" type="image/png" >
       <script src="back-forward.js"></script>
    </head>

    <!-- Descreption done-->
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
  $getPkJIDfromPre=$_POST['readMoreBtn']; #make sure of DB connection

$getJIDInfoQuery = "SELECT * FROM `job` where  `jobID`='$getPkJIDfromPre'";
$JIDInfoResult = mysqli_query($database, $getJIDInfoQuery);
 


if( $JIDInfoResult) {
  while($row = mysqli_fetch_assoc($JIDInfoResult)){
  
?>
    
    <h1 class="heading"> <?php echo $row['title']; ?> </h1>
<div class=box >
<?php echo $row['major'];?>

<br>

<?php echo $row['position']; ?>
<br>

<?php echo $row['required_qualifications']; ?>
<br>

<?php echo $row['required_skills']; ?>
<br>

<?php echo $row['salary_starts_from'];?>
<br>

<?php echo $row['description']; ?>
<br>

<?php echo $row['location'];?>
<br>

<?php echo $row['type']; ?>
<br>

 <!--<?php echo $row['gender']; ?>-->
<br>

</div>



  <?php }#end while
} // end if 


else echo  "<script> alert('There Is No Detail for this job') </script>"; ?>

<div class="foot"> </div>
<footer class="text-center">
    <a class="navbar-brand" href="V-Home.html">Career<span class="care">Care</span></a>
   
    <hr>
    <p>coded by <strong>Group#2</strong></p>
</footer>
</body>
</html>

