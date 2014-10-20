<table align="center">
<?php
session_start();
$db_name="PROJECTDB"; // Database name 
$c = oci_connect("PROJECTDB","projectdb","localhost/XE");
$username=$_POST["username"];
$passwordt=$_POST["password"];
$name=$_POST["name"] ;
$tel=$_POST["tel"] ;
$location=$_POST["location"];
$password=md5($passwordt);

	error_reporting(E_ERROR | E_PARSE);
$strSQL = "INSERT INTO academy VALUES (";
$strSQL .="'$username'";
$strSQL .=",'$password'";
$strSQL .=",'$name'";
$strSQL .=",'$tel'";
$strSQL .=",'$location')";
$result = oci_parse($c,$strSQL);
$r = oci_execute($result,OCI_DEFAULT);

if($r)
{
	oci_commit($c); //*** Commit Transaction ***//
	echo "Add Done.";
	header("Refresh: 2; url=Academy.php");
}
else
{
	oci_rollback($c); //*** RollBack Transaction ***//
	$e = oci_error($result);
	print htmlentities($e['message']);
    print "\n<pre>\n";
    print htmlentities($e['sqltext']);
    printf("\n%".($e['offset']+1)."s", "^");
    print  "\n</pre>\n";
	//header("Refresh: 5; url=Academy.php");
	
}
oci_close($c);
?>
</table>
<button><a href="Academy.php">Back</a></button>