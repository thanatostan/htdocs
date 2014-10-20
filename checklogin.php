<?php
##echo "HELLO WORLD" ;
session_start();
$db_name="members"; // Database name 
$tbl_name="members"; // Table name 
$c = oci_connect("projectdb", "projectdb", "localhost/XE");
     if (!$c) {
          echo "An error has occured connecting to the database";
          exit;
     }
// Connect to server and select databse.
// username and password sent from form 
$myusername=$_POST['myusername']; 
$mypasswordt=$_POST['mypassword']; 
$mypassword=md5($mypasswordt);
$query="SELECT * FROM $tbl_name WHERE username='$myusername' and password='$mypassword'";
$result = oci_parse($c,$query);
$r = oci_execute($result);
$count = oci_fetch_all($result,$kukuk);
// If result matched $myusername and $mypassword, table row must be 1 row
echo $count ;
if($count==1){
// Register $myusername, $mypassword and redirect to file "login_success.php"
$_SESSION['myusername'] = $myusername;
$_SESSION['mypassword'] = $mypassword;
header("location:login_success.php");
}
else {
echo "Wrong Username or Password";
}
?>

