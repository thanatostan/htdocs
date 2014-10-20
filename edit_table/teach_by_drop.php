<html>
<head>
<title>Admin Page</title>
</head>
<body>
<?php
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "DELETE FROM teach_by WHERE ";
$strSQL .="teacher_id = '".$_GET["User"]."' ";
$objParse = oci_parse($objConnect, $strSQL);
$objExecute = oci_execute($objParse, OCI_DEFAULT);
if($objExecute)
{
	oci_commit($objConnect); //*** Commit Transaction ***//
	echo "Drop Done.";
	header("Refresh: 2; url=Teach_by.php");
}
else
{
	oci_rollback($objConnect); //*** RollBack Transaction ***//
	echo "Drop Error [".$strSQL."";
	header("Refresh: 2; url=Teach_by.php");
}
oci_close($objConnect);
?>
</body>
</html>