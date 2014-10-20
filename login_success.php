<?php
session_start();
echo 'WELCOME TO THE SYSTEM   ' ;
$db_name="members"; // Database name 
$tbl_name="members"; // Table name 
$c = oci_connect("projectdb", "projectdb", "localhost/XE");
     if (!$c) {
          echo "An error has occured connecting to the database";
          exit;
     }
$username = $_SESSION['myusername'] ;
$query="SELECT * FROM ADMIN WHERE username='$username'";
$result = oci_parse($c,$query);
$r = oci_execute($result);
$counta = oci_fetch_all($result,$kukuk);
$query="SELECT * FROM Acadamy WHERE username='$username'";
$result = oci_parse($c,$query);
$r = oci_execute($result);
$countac = oci_fetch_all($result,$kukuk);
$query="SELECT * FROM student WHERE username='$username'";
$result = oci_parse($c,$query);
$r = oci_execute($result);
$counts = oci_fetch_all($result,$kukuk);
// If result matched $myusername and $mypassword, table row must be 1 row
echo $counta ;
echo '<br>';
echo $countac ;
echo '<br>';
echo $counts ;
echo '<br>' ;
if($counta==1){
echo 'hello admin' ;
header("location:admin_page.php");
}
elseif($countac==1) {
	echo'hello acadamy' ;
}
elseif($counts==1) {
	echo'hello student' ;
}
?>
<html>
<body>
<!--Login Successful
-->
</body>
</html>
