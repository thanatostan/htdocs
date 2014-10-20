<?php
echo "POR MUNG A SUD" ;
$db_name="projectDB"; // Database name 
$tbl_name="members"; // Table name 
$c = oci_connect("projectDB", "projectDB", "localhost/XE");
     if (!$c) {
          echo "An error has occured connecting to the database";
          exit;
     }
$query="SELECT * FROM $tbl_name WHERE username='admin' and password='admin'";
$s = oci_parse($c,$query);
$r = oci_execute($s);
$count = oci_fetch_all($s, $kukuk);
echo $count ;

?>
