<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<?php
$passwordt=$_POST["password"];
$password=md5($passwordt);
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "UPDATE admin SET ";
$strSQL .="username = '".$_POST["username"]."' ";
$strSQL .=",password = '$password' ";
$strSQL .=",name = '".$_POST["name"]."'";
$strSQL .="WHERE username = '".$_GET["User"]."' ";
$objParse = oci_parse($objConnect, $strSQL);
$objExecute = oci_execute($objParse, OCI_DEFAULT);
if($objExecute)
{
	oci_commit($objConnect); //*** Commit Transaction ***//
	echo "Save Done.";
	header("Refresh: 2; url=Admin.php");
}
else
{
	oci_rollback($objConnect); //*** RollBack Transaction ***//
	echo "Save Error [".$strSQL."";
	header("Refresh: 2; url=Admin.php");
}
oci_close($objConnect);
?>
</body>
</html>