<?php 



session_start(); 
    if (empty($_SESSION['j_email'])|| isset($_SESSION['e_email']))#change vars from Deema
    { 
        header("Location:Web/Login_v4/v-home.php");
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





if (isset($_POST['canceBtn'])) {
  

    $selected= $_POST['canceBtn']; #Get the id of this job by the vaule of a btn

#check the condition for a specific btn?and may we use the array its indecids equals to tha #atts
    $AllJIDsQueryOfJS = "SELECT applicants.job_ID FROM applicants where  applicants.accepted=-1  AND applicants.j_email='" . $_SESSION['j_email'] . "'"; 
    #applicants.status=-1 since it's a request no response yet
    

    $result1 = mysqli_query($database, $AllJIDsQueryOfJS);
    
    if ($result1) {
        
        while ($row= mysqli_fetch_row($result1)) { #while; as the request already exist
            $cancel= $row[0];
            if ($cancel==$selected) { #Get the id of this job

                $query = "DELETE FROM applicants WHERE applicants.job_ID='$selected'"; ##Change it #Get the id of this job
                $result = mysqli_query($database, $query);
               
                if ($result){

               # header("Location: appliedlist.php");

                echo   "<script> alert('Cancelation done successfully')</script>"; }


            else{
            
          #  header("Location: appliedlist.php");
            echo   "<script> alert('An error occured while deleting the applicant (job request) from the applicants table.')</script>"; 
        }
            }

         
       
    }
} else {
   
#  header("Location: appliedlist.php");

  echo "<script> alert('No applicant with this conditions')</script>"; }
}

?>