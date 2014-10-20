<?php
session_start();
$db_name="PROJECTDB"; // Database name 
$c = oci_connect("PROJECTDB","projectdb","localhost/XE");
$course_id=$_POST["course_id"];
$subject=$_POST["subject"];
$price=$_POST["price"];
$name=$_POST["name"];
$academy_username=$_POST["academy_username"] ;
	error_reporting(E_ERROR | E_PARSE);
$strSQL = "INSERT INTO course VALUES (";
$strSQL .="$course_id ";
$strSQL .=",'$subject'";
$strSQL .=",$price";
$strSQL .=",'$name'";
$strSQL .=",'$academy_username')";
$result = oci_parse($c,$strSQL);
$r = oci_execute($result,OCI_DEFAULT);

if($r)
{
	oci_commit($c); //*** Commit Transaction ***//
	echo "Add Done.";
	header("Refresh: 2; url=Course.php");
}
else
{
	oci_rollback($c); //*** RollBack Transaction ***//
	echo "Add Error : Course already exists";
	header("Refresh: 5; url=Course.php");
}
oci_close($c);
?>