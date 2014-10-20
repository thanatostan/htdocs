<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<?php
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "SELECT * FROM student";
$objParse = oci_parse ($objConnect, $strSQL);
$r = oci_execute($objParse,OCI_DEFAULT);
?>
<table width="600" class="table">
  <tr>
    <th> <div align="center">Username </div></th>
    <th> <div align="center">Password </div></th>
    <th> <div align="center">Name</div></th>
	<th> <div align="center">School</div></th>
	<th> <div align="center">Tel</div></th>
	<th> <div align="center">Address</div></th>
    <th> <div align="center">Edit </div></th>
  <th> <div align="center">Drop </div></th>
  </tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
  <tr>
    <td align="center"><?php echo $objResult["USERNAME"];?></td>
    <td align="center"><?php echo $objResult["PASSWORD"];?></td>
    <td align="center"><?php echo $objResult["NAME"];?></td>
	<td align="center"><?php echo $objResult["SCHOOL"];?></td>
	<td align="center"><?php echo $objResult["TEL"];?></td>
	<td align="center"><?php echo $objResult["ADDRESS"];?></td>
    <td align="center"><a href="student_edit.php?User=<?php echo $objResult["USERNAME"];?>">Edit</a></td>
  <td align="center"><a href="student_drop.php?User=<?php echo $objResult["USERNAME"];?>"onClick="return confirm('Are you sure?');"">Drop</a></td>
  </tr>
<?php
}
?>
</table>
<table width="600" class="table">
<td align="center"><a href="student_add.php"><strong>Add</a></td>
<td align="center"><a href="../admin_page.php"><strong>Back</a></td>
</table>
<?php
oci_close($objConnect);
?>
</body>
</html>