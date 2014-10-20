<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<?php
$news_id=$_POST["news_id"];
$data=$_POST["data"];

$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "UPDATE news SET ";
$strSQL .="news_id = $news_id ";
$strSQL .=",header = '".$_POST["header"]."'";
$strSQL .=",data = '$data' ";
$strSQL .=",post_time = '".$_POST["post_time"]."' ";
$strSQL .="WHERE news_id = '".$_GET["User"]."' ";
$objParse = oci_parse($objConnect, $strSQL);
$objExecute = oci_execute($objParse, OCI_DEFAULT);
if($objExecute)
{
	oci_commit($objConnect); //*** Commit Transaction ***//
	echo "Save Done.";
	header("Refresh: 2; url=News.php");
}
else
{
	oci_rollback($objConnect); //*** RollBack Transaction ***//
	echo "Save Error [".$strSQL."";
	header("Refresh: 2; url=News.php");
}
oci_close($objConnect);
?>
</body>
</html>