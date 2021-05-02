<?php
    session_start();

    if(!isset($_SESSION['j_email']) || isset($_SESSION['e_email']))
       header("Location: Web/Login_v4/logIn.php?error=Please Sign in again!");//log in

    else
    {

    require_once('Web/Login_v4/CONFIG-DB.php');// page name

    $con = mysqli_connect(DBHOST,DBUSER,DBPWD,DBNAME);

    if(mysqli_connect_errno($con))
    die("Fail to connect to database :" . mysqli_connect_error());
    
    if(!mysqli_select_db($con, DBNAME))
    die("Could not open the ".DBNAME." database.");
    $user = $_SESSION['j_email'];

    $query = "SELECT * FROM `job_seeker` WHERE `j_email` LIKE '$user'"; //q

    

    if($result = mysqli_query($con , $query)){
        while($row = mysqli_fetch_row($result)){
        $email =       $row[2];
        $name =        $row[0];
        $lname =       $row[1];
        $password =    $row[3]; 
        $city =        $row[6];
        $nationality = $row[5];  
        $phone =       $row[7];
        $job =         $row[9];  
        $gender =      $row[8];
        $major=        $row[10];  
        $experience =  $row[11];
        $skills =      $row[12];  
        $birthdate =   $row[4];
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
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="back-forward.js"></script>
</head>

<body class="profileBodyJS">

    <section id="header">
        <div class="menu-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="J-Home.php">Career<span class="care">Care</span></a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="Search.php">SEARCH</a> <!-- page name -->
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="postedJobs.php">JOBS</a><!-- page name -->
                          </li>
                        <li class="nav-item">
                          <a class="nav-link" href="ProfileJS.php">PROFILE</a><!-- page name -->
                        </li>
                       
                          <li class="nav-item">
                            <a class="nav-link" href="signout.php">SIGN OUT</a><!-- page name -->
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
                <img src="images/profilePHOTO.webp" width="143" height="128" alt="profile Photo" class="imgD">
            </div>
            <ul class="eProfile">
                <li class="active"><a href="Web/Login_v4/EditProfileJS.php?edit=<?php echo $email; ?>">Edit Profile</a></li><!-- page name -->
                <li><a href="appliedlist.php?jsPK=<?php echo $email; ?>"> Applied job list </a></li> <!-- page name -->
                <li><a href="Web/Login_v4/J-Select job.php"> Interview Schedule </a></li> <!-- page name -->
                <li class="public">Public<label class="switch">
                        <input type="checkbox" checked>
                        <span class="slider round"></span>
                    </label> </li>
                <li id="delete"><a href="DeleteProfileJS.php?delete=<?php echo $email; ?>"> Delete Profile </a></li><!-- page name -->
            </ul>
        </div>

        <div class="ProfileInfoJS">
            <form method="post" > <!-- action was google :) -->
                <div id="firstN">
                    <label>First Name:</label>
                    
                    <p><?php
                    print($name);
                    ?></p>
                </div>
                <div id="lastN">
                    <label>Last Name</label>
                    <p><?php
                    print($lname);
                    ?></p>
                </div>
                <div id="phoneN">
                    <label>Phone number:</label>
                    <p><?php
                    print( "0".$phone);
                    ?></p>
                </div>
                <div id="Email">
                    <label>Email</label>
                    <p><?php
                    print($email);
                    ?></p>
                </div>
                <div id="birthD">
                    <label>Birth date: </label>
                    <p><?php
                    print($birthdate);
                    ?></p>
                </div>

                <div id="Gender">
                    <label>Gender:</label>
                    <p><?php
                    print($gender);
                    ?></p>
                </div>

                <div id="Nationality">
                    <label>Nationality:</label>
                    <p><?php
                    print($nationality);
                    ?></p>
                </div>
                <div id="City">
                    <label>City:</label>
                    <p><?php
                    print($city);
                    ?></p>
                </div>
                <div id="major">
                    <label>Major:</label>
                    <p><?php
                    print($major);
                    ?></p>
                </div>
                <div id="CurrentJ">
                    <label>Current job:</label>
                    <p><?php
                    print($job);
                    ?></p>
                </div>
                <div id="exp">
                    <label>Experience:</label>
                    <p><?php
                    print($experience);
                    ?></p>
                </div>
                <div id="skills">
                    <label>Skills:</label>
                    <p><?php
                    print($skills);
                    ?></p>
                </div>
            </form>
        </div>
    </div>

    <footer class="text-center">
        <a class="navbar-brand" href="J-Home.php">Career<span class="care">Care</span></a>
       
        <hr>
        <p>coded by <strong>Group#2</strong></p>
    </footer>
</body> </html>
<?php 
    }
?>
