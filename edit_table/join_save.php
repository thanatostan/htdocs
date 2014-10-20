<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<?php
$course_id=$_POST["course_id"];
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "UPDATE join SET ";
$strSQL .="package_id = '".$_POST["package_id"]."' ";
$strSQL .=",course_id = '$course_id' ";
$strSQL .="WHERE package_id = '".$_GET["User"]."' and course_id = '".$_GET["User2"]."'";
$objParse = oci_parse($objConnect, $strSQL);
$objExecute = oci_execute($objParse, OCI_DEFAULT);
if($objExecute)
{
	oci_commit($objConnect); //*** Commit Transaction ***//
	echo "Save Done.";
	header("Refresh: 2; url=Join.php");
}
else
{
	oci_rollback($objConnect); //*** RollBack Transaction ***//
	echo "Save Error [".$strSQL."";
	header("Refresh: 2; url=Join.php");
}
oci_close($objConnect);
?>
</body>
</html>