<?php
session_start();
$db_name="PROJECTDB"; // Database name 
$c = oci_connect("PROJECTDB","projectdb","localhost/XE");
$course_id=$_POST["course_id"];
$student_username=$_POST["student_username"];
	error_reporting(E_ERROR | E_PARSE);
$strSQL = "INSERT INTO study VALUES (";
$strSQL .="$course_id";
$strSQL .=",'$student_username')";
$result = oci_parse($c,$strSQL);
$r = oci_execute($result,OCI_DEFAULT);

if($r)
{
	oci_commit($c); //*** Commit Transaction ***//
	echo "Add Done.";
	header("Refresh: 2; url=study.php");
}
else
{
	oci_rollback($c); //*** RollBack Transaction ***//
	echo "Add Error : Username already exists";
	header("Refresh: 5; url=study.php");
}
oci_close($c);
?>