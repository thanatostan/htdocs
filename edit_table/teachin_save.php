<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<?php
$teacher_id=$_POST["teacher_id"];
$academy_username=$_POST["academy_username"];
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "UPDATE teach_in SET ";
$strSQL .="teacher_id = $teacher_id ";
$strSQL .=",academy_username = '$academy_username' ";
$strSQL .="WHERE teacher_id = '".$_GET["User"]."' AND academy_username = '".$_GET["User2"]."' ";
$objParse = oci_parse($objConnect, $strSQL);
$objExecute = oci_execute($objParse, OCI_DEFAULT);
if($objExecute)
{
	oci_commit($objConnect); //*** Commit Transaction ***//
	echo "Save Done.";
	header("Refresh: 2; url=teachin.php");
}
else
{
	oci_rollback($objConnect); //*** RollBack Transaction ***//
	echo "Save Error [".$strSQL."";
	header("Refresh: 2; url=teachin.php");
}
oci_close($objConnect);
?>
</body>
</html>