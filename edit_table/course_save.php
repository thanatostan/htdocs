<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<?php
$course_id=$_POST["course_id"];
$subject=$_POST["subject"];
$price=$_POST["price"];
$name=$_POST["name"];
$academy_username=$_POST["academy_username"];
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "UPDATE course SET ";
$strSQL .="course_id = $course_id ";
$strSQL .=",subject = '$subject' ";
$strSQL .=",price = $price ";
$strSQL .=",name = '$name' ";
$strSQL .="academy_username = '$academy_username' ";
$strSQL .="WHERE course_id = '".$_GET["User"]."' ";
$objParse = oci_parse($objConnect, $strSQL);
$objExecute = oci_execute($objParse, OCI_DEFAULT);
if($objExecute)
{
	oci_commit($objConnect); //*** Commit Transaction ***//
	echo "Save Done.";
	header("Refresh: 2; url=Course.php");
}
else
{
	oci_rollback($objConnect); //*** RollBack Transaction ***//
	echo "Save Error [".$strSQL."";
	header("Refresh: 2; url=Course.php");
}
oci_close($objConnect);
?>
</body>
</html>