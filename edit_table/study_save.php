<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<?php
$course_id=$_POST["course_id"];
$student_username=$_POST["student_username"];
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "UPDATE study SET ";
$strSQL .="course_id = '".$_POST["course_id"]."' ";
$strSQL .=",student_username = '$student_username' ";
$strSQL .="WHERE course_id = '".$_GET["User"]."' AND student_username = '".$_GET["User2"]."' ";
$objParse = oci_parse($objConnect, $strSQL);
$objExecute = oci_execute($objParse, OCI_DEFAULT);
if($objExecute)
{
	oci_commit($objConnect); //*** Commit Transaction ***//
	echo "Save Done.";
	header("Refresh: 2; url=study.php");
}
else
{
	oci_rollback($objConnect); //*** RollBack Transaction ***//
	echo "Save Error [".$strSQL."";
	header("Refresh: 2; url=study.php");
}
oci_close($objConnect);
?>
</body>
</html>