<?php
$db_name="projectDB"; // Database name 
$tbl_name="members"; // Table name 
$c = oci_connect("projectdb", "projectdb", "localhost/XE");
     if (!$c) {
          echo "An error has occured connecting to the database";
          exit;
     }
// Connect to server and select databse.
// username and password sent from form 
$regusername=$_POST['Sregusername']; 
$regpasswordt=$_POST['Sregpassword'];
$regcpasswordt=$_POST['Sregcpassword'] ;
$name=$_POST['SregName'] ;
$school=$_POST['SregSchool'] ;
$tel=$_POST['SregTel'] ;
$address=$_POST['SregAddress'] ;
if($regpasswordt == $regcpasswordt) {
$regpassword=md5($regpasswordt); 
$regr = "Register Successful" ;
$query="INSERT INTO $tbl_name values ('$regusername','$regpassword')";
$result = oci_parse($c,$query);
$r = oci_execute($result); 
$query="INSERT INTO student values ('$regusername','$name','$school','$tel','$address')";
$result = oci_parse($c,$query);
$r = oci_execute($result); 
//header("location:main_login.php");
}
else {
$regr = "Register FAILED" ;

//header("location:main_login.php");


}
?>
