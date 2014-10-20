<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<?php
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "SELECT * FROM members";
$objParse = oci_parse ($objConnect, $strSQL);
$r = oci_execute($objParse,OCI_DEFAULT);
?>
<table width="600" class="table">
  <tr>
    <th width="91"> <div align="center">Username </div></th>
    <th width="98"> <div align="center">Password </div></th>
    <th width="30"> <div align="center">Edit </div></th>
	<th width="30"> <div align="center">Drop </div></th>
  </tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
  <tr>
    <td align="center"><?php echo $objResult["USERNAME"];?></td>
    <td align="center"><?php echo $objResult["PASSWORD"];?></td>
    <td align="center"><a href="members_edit.php?User=<?php echo $objResult["USERNAME"];?>">Edit</a></td>
	<td align="center"><a href="members_drop.php?User=<?php echo $objResult["USERNAME"];?>"onClick="return confirm('Are you sure?');"">Drop</a></td>
  </tr>
<?php
}
?>
</table>
<table width="600" class="table">
<td align="center"><a href="members_add.php"><strong>Add</a></td>
<td align="center"><a href="../admin_page.php"><strong>Back</a></td>
</table>
<?php
oci_close($objConnect);
?>
</body>
</html>