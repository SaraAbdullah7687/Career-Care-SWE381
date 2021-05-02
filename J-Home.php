<?php 
    session_start();

    if(!isset($_SESSION['j_email']))
	   header("Location: Web/Login_v4/login-j.php?error=Please Login again!");//****** 

    else
    {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Oleo+Script:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="styles.css">
    <script src="https://kit.fontawesome.com/a41a18f86c.js" crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Teko&display=swap" rel="stylesheet">
    <title>JobSeeker</title>
    <link rel="icon" href="images/cclogo2 (1).png" type="image/png" >
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <script src="back-forward.js"></script>
</head>
<body>

    <section id="header">
        <div class="menu-bar">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="J-Home.html">Career<span class="care">Care</span></a>
           
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

    <div class="banner text-center container-fluid">
    
      <!-- recruiters  <P>Hire <span class="blesstheboy">BlessTheBoy</span> for that amazing website you need</P> -->
    </div>

    <div id="Advice-Feed" class="container">
      <div class="row spaceRow"></div> 
      <div class="row"> 

        <div class="card mb-5">
          <div class="row no-gutters">
              <div class="col-md-3">
                  <div class="view overlay">
                    <div class="card-img1"><img class="card-img circlar-img" src="https://entrepreneuralarabiya.com/wp-content/uploads/2020/07/stc.png" alt="Sample"></div>
                    <a href="#!"> <div class="mask rgba-white-slight"></div> </a>
                    <p class=" mb-3 text-center author">
                      <strong>STC </strong>
                    </p>
                  </div>
                  <div class="text-reset float-left text-muted date ">February 20, 2020</div>
              </div>
              <div class="col-md-9">
                  <div id="card-details" class="card-body">
                      <h5>Tips for a successful interview</h5>

                      <div id="AdviceOP">
                      </div>
                     
                      <p class="text-multiline-truncate">
                        
                        Prepare what you will wear to the interview ahead of time.  Lay out your clothing, right down to your shoes.  You don’t need a last-minute surprise – like finding a stain on your shirt or scuff marks on your shoes – when you have 30 minutes to get out your door in the morning.
                        
                                              
                        <br> <br> 
                        <p class="small"> <a href="//www.experisjobs.us/exp_us/en/career-advice/tips-for-a-successful-interview.htm"> source </a></p>                        
                      </p>
                  </div>
                  <div class="cardFooter" > 
                  <div
                    class="card-footer text-uppercase text-muted d-flex justify-content-between white bottom-content w-100 border-bottom-0 small">                                  
                    <div class="d-flex align-items-center">
                      
                      <div class="d-flex align-items-center">
                        <div class="like-button float-left"><button type="button" class="btn btn-primary btn-sm px-3 like" data-toggle="tooltip"
                            data-placement="top" title="like"  >
                        <i class="fas fa-thumbs-up"></i></div> 
                      </button>

                        <div class="dis-button float-left"><button type="button" class="btn btn-primary btn-sm px-3 dislike" data-toggle="tooltip"
                        data-placement="top" title="dislike">
                        <i class="fas fa-thumbs-down"></i></div> 
                        </button>
                  
                      </div>
                    </div>
                  </div> 
                  </div>
              </div>
            </div>
        </div>


      </div>
    </div> 

    <!-- footer -->
    <footer class="text-center">
        <a class="navbar-brand" href="J-Home.html">Career<span class="care">Care</span></a>
       
        <hr>
        <p>coded by <strong>Group#2</strong></p>
    </footer>
</body>
</html>
  <!--
        <a href="https://twitter.com/BlessTheBoy_" target="_blank" rel="noopener noreferrer"><img src="images/twitter.png" alt=""></a>
        <a href="https://www.facebook.com/akorede.bakare.184/" target="_blank" rel="noopener noreferrer"><img src="images/facebook.png" alt=""></a>
        <a href="https://wa.me/+2348174538295" target="_blank" rel="noopener noreferrer"><img src="images/whatsapp.png" alt=""></a>
        <a href="https://www.linkedin.com/in/bakare-faruq-99b115149/" target="_blank" rel="noopener noreferrer"><img src="images/linked-in.png" alt=""></a>
       -->
       <?php 
    }
?>