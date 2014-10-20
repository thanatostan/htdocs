<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<?php
$time_id=$_POST["time_id"] ;
$study_period=$_POST["study_period"] ;
$total_time=$_POST["total_time"];
$course_id=$_POST["course_id"];
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "UPDATE time SET ";
$strSQL .="time_id = '".$_POST["time_id"]."' ";
$strSQL .=",study_period = '$study_period' ";
$strSQL .=",total_time = '$total_time'";
$strSQL .=",course_id = '$course_id'";
$strSQL .="WHERE time_id = '".$_GET["User"]."' ";
$objParse = oci_parse($objConnect, $strSQL);
$objExecute = oci_execute($objParse, OCI_DEFAULT);
if($objExecute)
{
	oci_commit($objConnect); //*** Commit Transaction ***//
	echo "Save Done.";
	header("Refresh: 2; url=Time.php");
}
else
{
	oci_rollback($objConnect); //*** RollBack Transaction ***//
	echo "Save Error [".$strSQL."";
	header("Refresh: 2; url=Time.php");
}
oci_close($objConnect);
?>
</body>
</html>