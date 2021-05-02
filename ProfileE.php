<?php
    session_start();

    if(!isset($_SESSION['e_email']) || isset($_SESSION['j_email']))
       header("Location:V-Home.php?error=Please Sign in again!");//log in 

    else
    {
    require_once('Web/Login_v4/CONFIG-DB.php'); // page name

    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);

    if(mysqli_connect_errno($con))
    die("Fail to connect to database :" . mysqli_connect_error());
    
    if(!mysqli_select_db($con, DBNAME))
    die("Could not open the ".DBNAME." database.");
    $user = $_SESSION['e_email'];

    $query = "SELECT * FROM `employer` WHERE `e_email` LIKE '$user'"; //q

    

    if($result = mysqli_query($con , $query)){
        while($row = mysqli_fetch_row($result)){
        $email =        $row[0];
        $password =     $row[1];
        $phone =        $row[2]; 
        $address =      $row[3]; 
        $scope =        $row[4];
        $description =  $row[5];  
        $mission =      $row[6];
        $vision  =      $row[7]; 
        $cname =        $row[8];
        }
    }
    else {
        echo mysqli_error($con);
    }

    mysqli_close($con);

?>
<!DOCTYPE html>

<html>

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

    <div class="profile-container">
        <div class="profile-menu">
            <div class="image-container">
                <img src="images/profilePHOTO.webp" width="143" height="148" alt="profile Photo" class="imgD">
            </div>
            <ul class="eProfile">
                <li><a href="Web/Login_v4/EditProfileE.php?edit=<?php echo $email; ?>">Edit Profile</a></li> <!-- page name --> 
                <li><a href="AdviceFeed (EMP).html"> Manage Advice </a> </li> <!-- page name --> 
                <li><a href="Web/Login_v4/E-Select job.php"> Interview Schedule </a> </li> <!-- page name --> 
                <li><a href="DeleteProfileE.php?delete=<?php echo $email; ?>"> Delete Profile </a></li> <!-- page name --> 

            </ul>
        </div>

        <div class="ProfileInfoE">
            <form method="post" action="http://www.google.com">
                <label>Company's name:</label>
                <p> 
                    <?php
                    print($cname); 
                    ?>
                </p>

                <label>Email:</label>
                <p><?php
                    print($email);
                    ?></p>


                <label>Phone number:</label>
                <p><?php
                    print("0".$phone);
                    ?></p>


                <label>Address:</label>
                <p><?php
                    print($address);
                    ?></p>


                <label>Company scope:</label>
                <p><?php
                    print($scope);
                    ?></p>

                <label>Description of company:</label>
                <p><?php
                    print($description);
                    ?></p>



                <label>Mission:</label>
                <p><?php
                    print($mission);
                    ?></p>


                <label>Vision:</label>
                <p><?php
                    print($vision);
                    ?></p>


            </form>
        </div>
    </div>

    <footer class="text-center">
      <a class="navbar-brand" href="E-Home.php">Career<span class="care">Care</span></a>
     
      <hr>
      <p>coded by <strong>Group#2</strong></p>
  </footer>
  
</body>
</html>

<?php 
    }
?>
