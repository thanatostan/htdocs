<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<?php
$name=$_POST["name"];
$tel=$_POST["tel"];
$address=$_POST["address"];
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "UPDATE teacher SET ";
$strSQL .="teacher_id = '".$_POST["teacher_id"]."' ";
$strSQL .=",name = '$name' ";
$strSQL .=",tel = '$tel' ";
$strSQL .=",address = '$address' ";
$strSQL .="WHERE teacher_id = '".$_GET["User"]."' ";
$objParse = oci_parse($objConnect, $strSQL);
$objExecute = oci_execute($objParse, OCI_DEFAULT);
if($objExecute)
{
	oci_commit($objConnect); //*** Commit Transaction ***//
	echo "Save Done.";
	header("Refresh: 2; url=Teacher.php");
}
else
{
	oci_rollback($objConnect); //*** RollBack Transaction ***//
	echo "Save Error [".$strSQL."";
	header("Refresh: 2; url=Teacher.php");
}
oci_close($objConnect);
?>
</body>
</html>