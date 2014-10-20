<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<?php
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "SELECT * FROM time";
$objParse = oci_parse ($objConnect, $strSQL);
$r = oci_execute($objParse,OCI_DEFAULT);
?>
<table width="600" class="table">
  <tr>
    <th> <div align="center">Time_iD </div></th>
    <th> <div align="center">Study_Period </div></th>
    <th> <div align="center">Total_Time</div></th>
  <th> <div align="center">Course_ID</div></th>
    <th> <div align="center">Edit </div></th>
  <th> <div align="center">Drop </div></th>
  </tr>
<?php
while($objResult = oci_fetch_array($objParse,OCI_BOTH))
{
?>
  <tr>
    <td align="center"><?php echo $objResult["TIME_ID"];?></td>
    <td align="center"><?php echo $objResult["STUDY_PERIOD"];?></td>
    <td align="center"><?php echo $objResult["TOTAL_TIME"];?></td>
  <td align="center"><?php echo $objResult["COURSE_ID"];?></td>
    <td align="center"><a href="time_edit.php?User=<?php echo $objResult["TIME_ID"];?>">Edit</a></td>
  <td align="center"><a href="time_drop.php?User=<?php echo $objResult["TIME_ID"];?>"onClick="return confirm('Are you sure?');"">Drop</a></td>
  </tr>
<?php
}
?>
</table>
<table width="600" class="table">
<td align="center"><a href="time_add.php"><strong>Add</a></td>
<td align="center"><a href="../admin_page.php"><strong>Back</a></td>
</table>
<?php
oci_close($objConnect);
?>
</body>
</html>