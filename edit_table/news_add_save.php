<?php
session_start();
$db_name="PROJECTDB"; // Database name 
$c = oci_connect("PROJECTDB","projectdb","localhost/XE");
$news_id=$_POST["news_id"];
$header=$_POST["header"];
$date=$_POST["date"];
$post_time=$_POST["post_time"];


	error_reporting(E_ERROR | E_PARSE);
$strSQL = "INSERT INTO news VALUES (";
$strSQL .="$news_id";
$strSQL .=",'$header'";
$strSQL .=",'$data'";
$strSQL .=",'$post_time')";
$result = oci_parse($c,$strSQL);
$r = oci_execute($result,OCI_DEFAULT);

if($r)
{
	oci_commit($c); //*** Commit Transaction ***//
	echo "Add Done.";
	header("Refresh: 2; url=News.php");
}
else
{
	oci_rollback($c); //*** RollBack Transaction ***//
	echo "Add Error : News already exists";
	header("Refresh: 5; url=News.php");
}
oci_close($c);
?>