<?php
	session_start(); 

	//if(!isset($_SESSION['email'])){
	//	header("location: logIn.html"); 
	//	exit(); 
	//}

	if(!($conn = mysqli_connect("localhost", "root", "")))
		die("<p> couldnt connect </p>"); 
							
	if(!mysqli_select_db($conn,"group2db"))
		die("<p> failed <p>");	


?>
<!DOCTYPE html>
<html style="position: relative; min-height: 100%;">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <link href="styles.css?<?php echo time(); ?>" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a41a18f86c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script:wght@400;700&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <meta name="theme-color" content="#5F9EA0">
	<title> Search Results </title>
    <link rel="icon" href="images/cclogo2 (1).png" type="image/png" >
    <script>
        $(document).ready(function() {
    $("input[name$='RadioGroup1']").click(function() {
        var test = $(this).val();

        $("div.desc").hide();
        $("."+test).show();
    });
});
    </script>  
  
</head>
<body id="rSPage">
    <header id="rPage"> 
        <section id="header">
            <div class="menu-bar">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="navbar-brand" href="#">Career<span class="care">Care</span></a>
               
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                      <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                      <ul class="navbar-nav ml-auto">
                        <li class="nav-item" >
                            <a class="nav-link" href="Search.html"  >SEARCH</a>
                          </li>
                          <li class="nav-item">
                            <a class="nav-link" href="postedJobs.html">JOBS</a>
                          </li>
                        <li class="nav-item">
                          <a class="nav-link" href="ProfileJS.html">PROFILE</a><!--================DEEMA-->
                        </li>
                       
                          <li class="nav-item">
                            <a class="nav-link" href="V-Home.html">SIGN OUT</a>
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
            <div class="sidenav col-3 " style="position: absolute; min-height: 600px; height:100%; overflow: hidden; background-color: whitesmoke; " >
                <section  class="mb-4">
                    <p style="color: cadetblue; font-size: larger; margin-bottom: 40px; margin-top: 10px; "> Advanced Search </p>    
                   
                </section>    
          
            <section id="radioType">

                <form method="GET" id="type-search-form" action="" style=" height:100%">

                    <p class="search_title ">Keyword</p>
                    <div class="md-form md-outline mt-0 d-flex justify-content-between align-items-center" style="margin-bottom:20px;">
                        <input type="text" id="search12" class="form-control mb-0 d-block" name="keyword" placeholder="Search...">
                        <button type="submit"  class="btn btn-flat"><i class="fas fa-search fa-md"></i></button>
                    </div>
                    <input type="reset" value="CLEAR" class="clear-btn" style="font-size: 10px; margin-top: 8px; color: cadetblue ">
          
                    <div class="form-check form-check-inline pl-0 mb-3">
                        
                      <input type="radio" class="form-check-input" id="JobRadio" name="RadioGroup1" value="Job" checked="checked">
                      <label class="form-check-label small text-uppercase card-link-secondary" for="Job"> Job </label>
          
                    </div>

                    <div class="form-check form-check-inline pl-0 mb-3">
          
                        <input type="radio" class="form-check-input" id="EmployerRadio" name="RadioGroup1" value="Employer">
                        <label class="form-check-label small text-uppercase card-link-secondary" for="Employer"> Employer</label>
            
                    </div>

                    <div id="type-based-search">
                    
                        <div id="Job" class="desc Job">
    
                            <p class="search_title ">Location</p>
                            <div class="md-form md-outline mt-0 d-flex justify-content-between align-items-center">
                                <input type="text" id="citySearch" class="form-control mb-0 d-block" name="city" placeholder="City....">
                            </div>
    
                            <p class="search_title ">Major</p>
                            <div class="md-form md-outline mt-0 d-flex justify-content-between align-items-center">
                                <input type="text" id="MajorSearch" class="form-control mb-0 d-block" name="major" placeholder="Major..">
                            </div>
    
                            <p  class="search_title ">Position</p >
                            <div class="md-form md-outline mt-0 d-flex justify-content-between align-items-center">
                                <input type="text" id="PosSearch" class="form-control mb-0 d-block" name="position" placeholder="Position..">
                            </div>
    
                            <p  class="search_title ">Comapny Name</p>
                            <div class="md-form md-outline mt-0 d-flex justify-content-between align-items-center">
                                <input type="text" id="CnameSearch1" class="form-control mb-0 d-block" name="company" placeholder="Company..">
                            </div>
    
                            <p class="search_title ">Type of Employment</p>
                            <section id="EmpType" class="mb-4">
                                <div class="form-check pl-0 mb-3">
                                <input type="checkbox" name="j-type" class="form-check-input filled-in" value="full" id="full-time">
                                <label class="form-check-label small card-link-secondary" for="full-time">Full-Time</label>
                                </div>
                                <div class="form-check pl-0 mb-3">
                                <input type="checkbox" name="j-type" class="form-check-input filled-in" value="part" id="part-time">
                                <label class="form-check-label small  card-link-secondary" for="part-time">Part-Time</label>
                                </div>
                            </section>    
    
                        </div>
                     
    
    
                        <div id="Employer" class="desc Employer" style="display: none;">
                            <p class="search_title ">Comapny Name</p>
                            <div class="md-form md-outline mt-0 d-flex justify-content-between align-items-center">
                                <input type="text" id="CnameSearch2" class="form-control mb-0 d-block" name="company2" placeholder="Company..">
                            </div>
    
                            <p class="search_title ">Comapny Scope</p>
                            <div class="md-form md-outline mt-0 d-flex justify-content-between align-items-center">
                                <input type="text" id="CscopeSearch" class="form-control mb-0 d-block" name="scope" placeholder="Scope..">
                              
                            </div>
    
                        </div>
    
    
                    </div>



                </form>    
                </section>
                
                
            </div>



            <section style=" min-height:600px">
                
                <div style="min-height:800px">
                    <?php
                    
                    if(isset($_GET['keyword'])){
                        $sql="SELECT * FROM"; 
                        
                        $k= $_GET['keyword']; 
                        
                        $count=0; 
?><!--===============================================================================================--> <?php

                        if($_GET['RadioGroup1']=="Employer"){

                            if (!empty($_GET['keyword'])){
                                $sql= $sql . " `employer` WHERE `employer`.`company_description` LIKE '%".$k."%' AND" ;}

                            else if (empty($_GET['keyword']) && ( isset($_GET['company2']) || isset($_GET['scope']))){
                                $sql= $sql . " `employer` WHERE "; 
    
                            }
    
                            else $sql= $sql . "`employer` WHERE `employer`.`company_description` LIKE '%".$k."%' AND"; 

                            if(isset($_GET['company2'])){
                                $c2= $_GET['company2']; 
                                $sql= $sql . " `employer`.`company_name` LIKE '%".$c2."%' AND" ;
                            }

                            if(isset($_GET['scope'])){
                                $sc= $_GET['scope']; 
                                $sql= $sql . " `employer`.`company_scope` LIKE '%".$sc."%' AND" ;
                            }

                            $sql = substr($sql, 0, strlen($sql)-3); 

                            ?>
                            <section id="search-result">
                            <div class="row Employer" >
                

                            <?php
                            if ($result = mysqli_query( $conn, $sql )){
                                $rnumber= mysqli_num_rows ( $result ); 
                            ?> <p class=" col offset-lg-3 offset-sm-5 offset-md-3 offset-xl-3 match" > <?php echo $rnumber?> matching search results</p> <?php
 
                            while($row = $result->fetch_assoc()): {
                                $name= $row['company_name']; 
                                $desc= $row['company_description']; 

                                $count++; 
                                if($count==1 || ($count-1)%3==0){
                                    ?> 
                                    <div class="row">
                                    <div class="col offset-lg-3 offset-sm-5 offset-md-3 offset-xl-3">
                                    <div class="card-columns"  style="box-shadow: none;"> <?php
                                    
                                }
                                ?> 
                                <div class="card" style="background-color: rgb(255, 255, 255); ">
                                <div class= "card-image11"> <img class="card-img-top  d-block circlar-img" src="images/<?php echo $name?>.png" alt="<?php echo $name?> PROFILE"> </div>
                                <div class="card-body">
                                    <h4 class="card-title d-block"><?php echo $name?></h4>
                                    <p class="card-text"><?php echo $desc?> </p>

                                </div>
                                <div class="center-btn "><button class="button-viewDetails btn btn-primary view-more-btn"> 
                                    <a href="ProfileJSR.php"> View Details 
                                </a> </button></div></div>

                                

                            <?php 
                                if($count%3==0){
                                    ?> </div> </div> </div>  <?php 
                                }
                                
                                else if (($rnumber+1)%3==0 && $rnumber == $count){
                                    ?> <div class="card" style="box-shadow: none; border: none; ">
                                        </div> </div>
                                    <?php
                                }

                                else if ($rnumber == $count ){
                                    ?> <div class="card" style="box-shadow: none; border: none; ">
                                        </div>
                                        <div class="card" style="box-shadow: none; border: none; "> 
                                        </div>
                                <?php }
                                
                               
                            } endwhile;}

                            ?> </div> </div>  <?php
                            
                            ?>
                            </div> </div></section><?php
                            
                        }
?><!--===============================================================================================--><?php

                        if($_GET['RadioGroup1']=="Job"){
                            ?>
                            <section id="jobs2" >
                            <div class="container Job" style="margin-top: -3% ;">
                            <div class="row offset-lg-3 offset-xl-3 offset-md-3 offset-sm-5"> 
                            <?php

                            if (!empty($_GET['keyword'])){
                                $sql2= $sql . " `job` WHERE `job`.`title` LIKE '%".$k."%' AND" ; }

                            else if (empty($_GET['keyword']) && ( isset($_GET['company']) || isset($_GET['city']) || isset($_GET['major'])|| isset($_GET['position'])|| isset($_GET['j-type']))){
                                $sql2= $sql . " `job` WHERE "; 
                            }
    
                            else $sql2= $sql . " `job` WHERE `job`.`title` LIKE '%".$k."%' AND"; 


                            if(isset($_GET['company'])){
                                $c= $_GET['company']; 
                                $sql2= $sql2 . "`job`.`e-email` LIKE '%".$c."%' AND" ;
                            }

                            if(isset($_GET['city'])){
                                $city= $_GET['city']; 
                                $sql2= $sql2 . "`job`.`location` LIKE '%".$city."%' AND" ;
                            }

                            if(isset($_GET['major'])){
                                $mj= $_GET['major']; 
                                $sql2= $sql2 . "`job`.`major` LIKE '%".$mj."%' AND" ;
                            }

                            if(isset($_GET['position'])){
                                $ps= $_GET['position']; 
                                $sql2= $sql2 . "`job`.`position` LIKE '%".$ps."%' AND" ;
                            }

                            if(isset($_GET['j-type'])){
                                $jtp= $_GET['j-type']; 
                                $sql2= $sql2 . "`job`.`type` LIKE '%".$jtp."%' AND" ;
                            }

                            $sql2 = substr($sql2, 0, strlen($sql2)-3); 


                            if ($result = mysqli_query( $conn, $sql2 )){
                                $rnumber= mysqli_num_rows ( $result ); 
                            ?> <p class=" match" style="margin-left: -1.8%;" > <?php echo $rnumber?> matching search results</p> <?php
                            while($row = $result->fetch_assoc()): 
                                $count++; 
                                if (($count-1)%2==0 && $count != 1){
                                ?>
                                <div class="row offset-lg-3 offset-xl-3 offset-md-3 offset-sm-5"> 
                                <?php

                                }
                                ?> 
                                <div class="company-details card" style="height: 400px;">
                                <div class="job-details" style="height: 90% ; overflow: hidden; ">
                                  <h4><b><?php echo $row['title'] ?></b></h4>
                                  <p><a href="ProfileER.html" style="color:black; text-decoration: none;"><?php echo $row['e-email'] ?></a></p>
                                  <br><i class="fa fa-briefcase" style="margin-bottom:10px ;"></i><span><?php echo $row['major'] ?></span>
                                  <br><i class="fa fa-check" aria-hidden="true" style="margin-bottom:10px ;"></i><span><?php echo $row['position'] ?></span>
                                  <br><i class="fa fa-graduation-cap" aria-hidden="true" style="margin-bottom:10px ;"></i></i><span><?php echo $row['required_qualifications'] ?></span>
                                  <br><i class="fa fa-map-marker" style="margin-bottom:10px ;" ></i><span> <?php echo $row['location'] ?></span>
                                  <br><i class="fa fa-clock-o" aria-hidden="true" style="margin-bottom:10px ;"></i><spna><?php echo $row['type'] ?></spna>
                                  <br>
                                <i class="fa fa-info-circle" aria-hidden="true" style="margin-bottom:10px ;"></i><span><a href="job1.html">read more..</a></span>
                                </div>
              
                              <div class="apply-btn">
                                  <button type="button" class="btn btn-primary">Apply</button>
                              </div>
                          </div>
    
                            <?php 
                            if ($count%2==0){
                                ?> </div> <?php
                            }
                            endwhile;} 
                            ?>
                            </div></div></section>
                            <?php

                        }

                        

                    } 
                    else {  ?>
                        <div class="row offset-lg-3 offset-xl-3 offset-md-3 offset-sm-5"> 

                        <p class=" match" style="color: cadetblue;" > <strong> Please fill in a keyword...... </strong></p> 
                        </div>
                    <?php }  ?>

                    
                            
                </div>
                </section> 
<!--===============================================================================================-->




    </div>
    <footer class="text-center row">
        <a class="navbar-brand" href="V-Home.html">Career<span class="care">Care</span></a>

        <hr>
        <p>coded by <strong>Group#2</strong></p>
    </footer> 
</body>
</html>