<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<?php
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "SELECT * FROM join natural join course ORDER BY package_id";
$objParse = oci_parse ($objConnect, $strSQL);
$r = oci_execute($objParse,OCI_DEFAULT);
?>
<table width="600" class="table">
  <tr>
    <th> <div align="center">Package ID</div></th>
    <th> <div align="center">Course ID</div></th>
	<th> <div align="center">Subject</div></th>
    <th> <div align="center">Academy</div></th>
  </tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
  <tr>
    <td align="center"><?php echo $objResult["PACKAGE_ID"];?></td>
    <td align="center"><?php echo $objResult["COURSE_ID"];?></td>
	<td align="center"><?php echo $objResult["SUBJECT"];?></td>
	<td align="center"><?php echo $objResult["ACADEMY_USERNAME"];?></td>
    <td align="center"><a href="join_edit.php?User=<?php echo $objResult["PACKAGE_ID"];?>&User2=<?php echo $objResult["COURSE_ID"];?>">Edit</a></td>
  <td align="center"><a href="join_drop.php?User=<?php echo $objResult["PACKAGE_ID"];?>&User2=<?php echo $objResult["COURSE_ID"];?>"onClick="return confirm('Are you sure?');"">Drop</a></td>
  </tr>
<?php
}
?>
</table>
<table width="600" class="table">
<td align="center"><a href="join_add.php"><strong>Add</a></td>
<td align="center"><a href="../admin_page.php"><strong>Back</a></td>
</table>
<?php
oci_close($objConnect);
?>
</body>
</html>