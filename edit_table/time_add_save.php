<?php
session_start();
$db_name="PROJECTDB"; // Database name 
$c = oci_connect("PROJECTDB","projectdb","localhost/XE");
$time_id=$_POST["time_id"];
$study_period=$_POST["study_period"];
$total_time=$_POST["total_time"] ;
$course_id=$_POST["course_id"] ;

	error_reporting(E_ERROR | E_PARSE);
$strSQL = "INSERT INTO time VALUES (";
$strSQL .="$time_id";
$strSQL .=",$study_period";
$strSQL .=",$total_time";
$strSQL .=",$course_id)";

$result = oci_parse($c,$strSQL);
$r = oci_execute($result,OCI_DEFAULT);

if($r)
{
	oci_commit($c); //*** Commit Transaction ***//
	echo "Add Done.";
	header("Refresh: 2; url=Time.php");
}
else
{
	oci_rollback($c); //*** RollBack Transaction ***//
	echo "Add Error : Time_ID already exists";
	header("Refresh: 5; url=Time.php");
}
oci_close($c);
?>