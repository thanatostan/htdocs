<?php
session_start();
$db_name="PROJECTDB"; // Database name 
$c = oci_connect("PROJECTDB","projectdb","localhost/XE");
$teacher_id=$_POST["teacher_id"];
$academy_username=$_POST["academy_username"];
	error_reporting(E_ERROR | E_PARSE);
$strSQL = "INSERT INTO teach_in VALUES (";
$strSQL .="$teacher_id";
$strSQL .=",'$academy_username')";
$result = oci_parse($c,$strSQL);
$r = oci_execute($result,OCI_DEFAULT);

if($r)
{
	oci_commit($c); //*** Commit Transaction ***//
	echo "Add Done.";
	header("Refresh: 2; url=Teachin.php");
}
else
{
	oci_rollback($c); //*** RollBack Transaction ***//
	echo "Add Error : Username already exists";
	header("Refresh: 5; url=Teachin.php");
}
oci_close($c);
?>