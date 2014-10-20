<?php
session_start();
$db_name="PROJECTDB"; // Database name 
$c = oci_connect("PROJECTDB","projectdb","localhost/XE");
$teacher_id=$_POST["teacher_id"];
$name=$_POST["name"];
$tel=$_POST["tel"];
$address=$_POST["address"];
	error_reporting(E_ERROR | E_PARSE);
$strSQL = "INSERT INTO teacher VALUES (";
$strSQL .="$teacher_id";
$strSQL .=",'$name'";
$strSQL .=",'$tel'";
$strSQL .=",'$address')";
$result = oci_parse($c,$strSQL);
$r = oci_execute($result,OCI_DEFAULT);

if($r)
{
	oci_commit($c); //*** Commit Transaction ***//
	echo "Add Done.";
	header("Refresh: 2; url=Teacher.php");
}
else
{
	oci_rollback($c); //*** RollBack Transaction ***//
	echo "Add Error : Username already exists";
	header("Refresh: 5; url=Teacher.php");
}
oci_close($c);
?>