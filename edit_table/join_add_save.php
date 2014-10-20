<?php
session_start();
$db_name="PROJECTDB"; // Database name 
$c = oci_connect("PROJECTDB","projectdb","localhost/XE");
$package_id=$_POST["package_id"];
$course_id=$_POST["course_id"];

	error_reporting(E_ERROR | E_PARSE);
$strSQL = "INSERT INTO join VALUES (";
$strSQL .="$package_id";
$strSQL .=",$course_id)";
$result = oci_parse($c,$strSQL);
$r = oci_execute($result,OCI_DEFAULT);

if($r)
{
	oci_commit($c); //*** Commit Transaction ***//
	echo "Add Done.";
	header("Refresh: 2; url=Join.php");
}
else
{
	oci_rollback($c); //*** RollBack Transaction ***//
	echo "Add Error : Username already exists";
	header("Refresh: 5; url=Join.php");
}
oci_close($c);
?>