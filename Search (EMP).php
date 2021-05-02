
    <?php
    session_start(); 

    if(!isset($_SESSION['e_email']) || isset($_SESSION['j_email']))
       header("Location:V-Home.php?error=Please Sign in again!");//log in 

    if(!($conn = mysqli_connect("localhost", "root", "")))
        die("<p> couldnt connect </p>"); 
                            
    if(!mysqli_select_db($conn,"group2db"))
        die("<p> failed <p>");  


?>
<!DOCTYPE html >
<html style="position: relative; min-height: 100%;">
<head>
<script src="back-forward.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="styles.css?<?php echo time(); ?>" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a41a18f86c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title> Search Results </title>
    <link rel="icon" href="images/cclogo2 (1).png" type="image/png" >

</head>
<body id="rSPage">

    <header id="rPage"> 
        <section id="header">
            <div class="menu-bar">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="E-Home.php">Career<span class="care">Care</span></a>
                   
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav ml-auto" style="margin-right: -15px;">
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
    </header>


    <div class="position-relative">
        <div class="container-fluid background-holder">
          <div class="row ">
            <div id="bootstrap-overrides" class="col-sm-5 col-lg-3 col-xl col-md-3">
              <p class="text-left"></p>
            </div>
            <div class="col-md-9">
              <p class="text-right"></p>
            </div>
          </div>
        </div> 
    

        <section class="container general_view">
            <div class="sidenav col-3 " style="position: absolute; min-height: 800px; height:100%; overflow: hidden; background-color: whitesmoke; " >
                <section  class="mb-4">
                    <p style="font-size: larger; margin-bottom: 40px; margin-top: 10px; color: cadetblue;"> Advanced Search </p>   
                </section>    

                <form method="GET" id="type-search-form" action="" style=" height:100%">
                    <p class="search_title ">Keyword</p>
                    <div class="md-form md-outline mt-0 d-flex justify-content-between align-items-center">
                        <input type="text" id="search12" name="keyword" class="form-control mb-0 d-block" placeholder="Search...">
                        <button type="submit"  class="btn btn-flat"><i class="fas fa-search fa-md"></i></button>
                    </div>
                    <input type="reset" value="CLEAR" class="clear-btn" style="font-size: 10px; margin-top: 6.8%; color: cadetblue ">
                    <div id="type-based-search">
    
                        <p class="search_title ">Gender</p>
                        <section id="radioType">
                            <div class="form-check form-check-inline pl-0 mb-3">
                  
                              <input type="radio" class="form-check-input" id="FemaleRadio" name="RadioGroup1" value="female">
                              <label class="form-check-label small text-uppercase card-link-secondary" for="Female"> Female</label>
                  
                            </div>
                  
                            <div class="form-check form-check-inline pl-0 mb-3">
                                
                              <input type="radio" class="form-check-input" id="MaleRadio" name="RadioGroup1" value="male">
                              <label class="form-check-label small text-uppercase card-link-secondary" for="Male"> Male </label>
                  
                            </div>
                        </section>
    
                        <p class="search_title ">Major</p>
                        <div class="md-form md-outline mt-0 d-flex justify-content-between align-items-center">
                            <input type="text" id="MajorSearch" name="major" class="form-control mb-0 d-block" placeholder="Major..">
                        </div>
    
                        <p class="search_title ">Skill</p>
                        <div class="md-form md-outline mt-0 d-flex justify-content-between align-items-center">
                            <input type="text" id="SkillSearch" name="skill" class="form-control mb-0 d-block" placeholder="Skill">
                        </div>
    
                        <p class="search_title ">Nationality</p>
                        <div class="md-form md-outline mt-0 d-flex justify-content-between align-items-center">
                            <input type="text" id="NatSearch" name="nation" class="form-control mb-0 d-block" placeholder="nationality..">
                        </div>
    
                    </div>
    
    



                </form>    
                
                
            </div>


                <section id="search-result"  style="min-height:800px">
                    <div class="row"> </div>
                    
                    <?php
                    
                    if(isset($_GET['keyword'])){

                        $sql="SELECT * FROM" ;
                        
                        
                        ?> <div class="row"> <?php 

                        $k= $_GET['keyword']; 
                        
                        $count=0; 
?><!--===============================================================================================--> <?php

                        if (!empty($_GET['keyword'])){
                            $sql= $sql . " `job_seeker` WHERE `job_seeker`.`fname` LIKE '%".$k."%' OR `job_seeker`.`lname` LIKE '%".$k."%' AND" ; }
                        
                        else if (empty($_GET['keyword']) && ( isset($_GET['major']) || isset($_GET['skill']) || isset($_GET['nation']) || isset($_GET['RadioGroup1']))){
                            $sql= $sql . " `job_seeker` WHERE";

                        }

                        else $sql= $sql . " `job_seeker` WHERE `job_seeker`.`fname` LIKE '%".$k."%' OR `job_seeker`.`lname` LIKE '%".$k."%' AND" ; 


                        if(isset($_GET['major'])){
                            $mj= $_GET['major']; 
                            $sql= $sql . "  `job_seeker`.`major` LIKE '%".$mj."%' AND" ;
                        }

                        if(isset($_GET['skill'])){
                            $sk= $_GET['skill']; 
                            $sql= $sql . " `job_seeker`.`skills` LIKE '%".$sk."%' AND" ;
                        }

                        if(isset($_GET['nation'])){
                            $nt= $_GET['nation']; 
                            $sql= $sql . "  `job_seeker`.`nationality` LIKE '%".$nt."%' AND" ;
                        }

                        if(isset($_GET['RadioGroup1']) && $_GET['RadioGroup1'] == 'female'){
                            $gender= 'female'; 
                            $sql= $sql . "`job_seeker`.`gender` = '$gender'  AND" ;
                        }

                        if(isset($_GET['RadioGroup1']) && $_GET['RadioGroup1'] == 'male' ) {
                            $gender2= 'male'; 
                            $sql= $sql . " `job_seeker`.`gender` ='$gender2' AND" ;
                        }
                        

                        $sql = substr($sql, 0, strlen($sql)-3); 

                        if ($result = mysqli_query( $conn, $sql )){
                            $rnumber= mysqli_num_rows ( $result ); 
                            ?> <p class=" match col offset-lg-3 offset-sm-5 offset-md-3 offset-xl-3" > <?php echo $rnumber?> matching search results</p> <?php

                            while($row = $result->fetch_assoc()): {
                                $name= trim($row['fname']) ." ". trim($row['lname']); 
                                $count++; 
                                if($count==1 || ($count-1)%3==0){
                                    ?> 
                                    <div class="row">

                                    <div class="col offset-lg-3 offset-sm-5 offset-md-3 offset-xl-3">
                                    <div class="card-columns"  style="box-shadow: none;     column-count: 3;"> <?php
                                    
                                }
                                ?> 
                                <div class="card" style="background-color: rgb(255, 255, 255);  ">
                                <div class= "card-image11"> <img class="card-img-top  d-block circlar-img" src="images/<?php echo $row['gender']?>.png" alt="<?php echo $name?> PROFILE"> </div>
                                <div class="card-body">
                                    <section style="width: 262px;"><h4 class="card-title d-block" ><?php echo $name ?></h4></section>
                                    <p class="card-text"><p><strong>Major: </strong><?php echo $row['major']; ?></p>
                                    <p><strong>Experience: </strong><?php echo $row['experience']; ?></p>
                                    <p><strong>Skills: </strong><?php echo $row['skills']; ?></p>
                                    </p>

                                </div>
                                <div class="center-btn "><form method="post" action="ProfileJSR.php">
                                    <input type="hidden" name="viewJSprofile"  value="<?php echo $row['j_email']; ?>">  
                                    <button class="button-viewDetails btn btn-primary view-more-btn"> 
                                    <a> View Details 
                                </a> </button></form></div></div>

                                

                            <?php 
                                if($count%3==0){
                                    ?> </div> </div> </div>  <?php 
                                }
                                
                                else if (($rnumber+1)%3==0 && $rnumber == $count){
                                    ?> <div class="card" style="box-shadow: none; border: none; ">
                                        </div> </div>
                                    <?php
                                }

                                else if (($rnumber-1)%3==0 && $rnumber == $count ){
                                    ?> <div class="card" style="box-shadow: none; border: none; ">
                                        </div>
                                        <div class="card" style="box-shadow: none; border: none; "> 
                                        </div>
                                    <?php }
                                    
                                
                                
                            } endwhile;}

                        ?> </div> <?php
                        
                    }
                    ?> 
                     
                      
    
                </section>

            

        </section>
    </div> 
    <footer class="text-center row">
        <a class="navbar-brand" href="V-Home.php">Career<span class="care">Care</span></a>
       
        <hr>
        <p>coded by <strong>Group#2</strong></p>
    </footer>
</body>
</html>