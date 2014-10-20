<?php
session_start();
$db_name="PROJECTDB"; // Database name 
$c = oci_connect("PROJECTDB","projectdb","localhost/XE");
$packageid=$_POST["package_id"];
$price=$_POST["price"];
	error_reporting(E_ERROR | E_PARSE);
$strSQL = "INSERT INTO package VALUES (";
$strSQL .="$packageid";
$strSQL .=",$price)";
$result = oci_parse($c,$strSQL);
$r = oci_execute($result,OCI_DEFAULT);

if($r)
{
	oci_commit($c); //*** Commit Transaction ***//
	echo "Add Done.";
	header("Refresh: 2; url=Package.php");
}
else
{
	oci_rollback($c); //*** RollBack Transaction ***//
	echo "Add Error : Username already exists";
	header("Refresh: 5; url=Package.php");
}
oci_close($c);
?>