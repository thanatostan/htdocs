<?php
session_start();
$db_name="PROJECTDB"; // Database name 
$c = oci_connect("PROJECTDB","projectdb","localhost/XE");
$username=$_POST["username"];
$passwordt=$_POST["password"];
$name=$_POST["name"];
$password=md5($passwordt);

	error_reporting(E_ERROR | E_PARSE);
$strSQL = "INSERT INTO admin VALUES (";
$strSQL .="'$username'";
$strSQL .=",'$password'";
$strSQL .=",'$name')";
$result = oci_parse($c,$strSQL);
$r = oci_execute($result,OCI_DEFAULT);

if($r)
{
	oci_commit($c); //*** Commit Transaction ***//
	echo "Add Done.";
	header("Refresh: 2; url=Admin.php");
}
else
{
	oci_rollback($c); //*** RollBack Transaction ***//
	echo "Add Error : Admin already exists";
	header("Refresh: 5; url=Admin.php");
}
oci_close($c);
?>