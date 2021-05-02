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


if(isset($_POST['acc'])){
    $selectedAcc= $_POST['acc']; #Get the ID for this applicant which to be edited
 $jid =  $_POST['JID']; 
 $accQuery="UPDATE `applicants` SET `accepted`='1' WHERE `job_ID`='$jid' AND `e_email`='" . $_SESSION['e_email'] . "' AND `j_email`='$selectedAcc'";
 
 $accResult=mysqli_query($database, $accQuery);

 if($accResult){
  echo "<script> alert('Acception done successfully') </script>"; 
  #header("location: applicants.php?viewApplicantsBtn=$jid");}
 }

 else { echo  "<script> alert('Acception has not done successfully') </script>"; 
 #header("location: applicants.php?viewApplicantsBtn=$jid");}

 } } 

if(isset($_POST['rej'])){
  $jid =  $_POST['JID']; 
    $selectedRej= $_POST['rej']; #Get the ID for this applicant which to be edited
 #$query="DELETE FROM applicants WHERE applicants.JID=".$selectedRej[$r].";";
 $rejQuery="UPDATE `applicants` SET `accepted`='0' WHERE `job_ID`='$jid' AND `e_email`='" . $_SESSION['e_email'] . "' AND `j_email`='$selectedRej' ";
 
 $rejResult=mysqli_query($database, $rejQuery);

 if($rejResult){
 echo  "<script> alert('Rejection done successfully') </script>"; 
 #header("location: applicants.php?viewApplicantsBtn=$jid"); 
}


 else   echo "<script> alert('Rejection has not done successfully') </script>";  
 #header("location: applicants.php?viewApplicantsBtn=$jid");}
} 

?>