<html>
<head>
<title>Admin Page</title>
</head>
<body>
<?php
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "DELETE FROM news WHERE ";
$strSQL .="news_id = '".$_GET["User"]."' ";
$objParse = oci_parse($objConnect, $strSQL);
$objExecute = oci_execute($objParse, OCI_DEFAULT);
if($objExecute)
{
	oci_commit($objConnect); //*** Commit Transaction ***//
	echo "Drop Done.";
	header("Refresh: 2; url=News.php");
}
else
{
	oci_rollback($objConnect); //*** RollBack Transaction ***//
	echo "Drop Error [".$strSQL."";
	header("Refresh: 2; url=News.php");
}
oci_close($objConnect);
?>
</body>
</html>