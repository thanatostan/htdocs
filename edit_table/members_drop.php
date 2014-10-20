<html>
<head>
<title>Admin Page</title>
</head>
<body>
<?php
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "DELETE FROM members WHERE ";
$strSQL .="username = '".$_GET["User"]."' ";
$objParse = oci_parse($objConnect, $strSQL);
$objExecute = oci_execute($objParse, OCI_DEFAULT);
if($objExecute)
{
	oci_commit($objConnect); //*** Commit Transaction ***//
	echo "Drop Done.";
	header("Refresh: 2; url=Members.php");
}
else
{
	oci_rollback($objConnect); //*** RollBack Transaction ***//
	echo "Drop Error [".$strSQL."";
	header("Refresh: 2; url=Members.php");
}
oci_close($objConnect);
?>
</body>
</html>