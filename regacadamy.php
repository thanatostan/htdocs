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
$regusername=$_POST['Acregusername']; 
$regpasswordt=$_POST['Acregpassword'];
$regcpasswordt=$_POST['Acregcpassword'] ;
$name=$_POST['AcregName'] ;
$location=$_POST['AcregLocation'] ;
$tel=$_POST['AcregTel'] ;
if(regpassword == regcpassword) {
$regpassword=md5($regpasswordt); 
$regr = "Register Successful" ;
$query="INSERT INTO $tbl_name values ('$regusername','$regpassword')";
$result = oci_parse($c,$query);
$r = oci_execute($result); 
$query="INSERT INTO Acadamy values ('$regusername','$name','$location','$tel')";
$result = oci_parse($c,$query);
$r = oci_execute($result); 
//header("location:main_login.php");
}
else {
$regr = "Register FAILED" ;

header("location:main_login.php");


}
?>
