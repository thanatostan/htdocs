<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<?php
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "SELECT * FROM news";
$objParse = oci_parse ($objConnect, $strSQL);
$r = oci_execute($objParse,OCI_DEFAULT);
?>
<table width="600" class="table">
  <tr>
    <th width="91"> <div align="center">News_ID </div></th>
    <th width="98"> <div align="center">Header </div></th>
	<th width="98"> <div align="center">Data </div></th>
	<th width="98"> <div align="center">Post_Time </div></th>
    <th width="30"> <div align="center">Edit </div></th>
	<th width="30"> <div align="center">Drop </div></th>
  </tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
  <tr>
    <td align="center"><?php echo $objResult["NEWS_ID"];?></td>
    <td align="center"><?php echo $objResult["HEADER"];?></td>
	<td align="center"><?php echo $objResult["DATA"];?></td>
	<td align="center"><?php echo $objResult["POST_TIME"];?></td>
    <td align="center"><a href="news_edit.php?User=<?php echo $objResult["NEWS_ID"];?>">Edit</a></td>
	<td align="center"><a href="news_drop.php?User=<?php echo $objResult["NEWS_ID"];?>"onClick="return confirm('Are you sure?');"">Drop</a></td>
  </tr>
<?php
}
?>
</table>
<table width="600" class="table">
<td align="center"><a href="news_add.php"><strong>Add</a></td>
<td align="center"><a href="../admin_page.php"><strong>Back</a></td>
</table>
<?php
oci_close($objConnect);
?>
</body>
</html>