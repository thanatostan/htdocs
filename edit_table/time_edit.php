<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<form action="time_save.php?User=<?php echo $_GET["User"];?>" name="frmEdit" method="post">
<?php
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "SELECT * FROM time WHERE time_id = '".$_GET["User"]."' ";
$objParse = oci_parse ($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
$objResult = oci_fetch_array($objParse);
if(!$objResult)
{
	echo "Not found Time_ID=".$_GET["User"];
}
else
{
	
?>
<table  class="table">
  <tr>
    <th > <div align="center">Time_ID </div></th>
    <th > <div align="center">Study_Period </div></th>
    <th > <div align="center">Total_Time</div></th>
    <th > <div align="center">Course_ID</div></th>
  </tr>
  <tr>
    <td align="center"><input type="text" class="form-control" name="time_id" size="20" value="<?php echo $objResult["TIME_ID"];?>"></td>
    <td align="center"><input type="text" class="form-control" name="study_period" size="20" value="<?php echo $objResult["STUDY_PERIOD"];?>"></td>
	<td align="center"><input type="text" class="form-control" name="total_time" size="20" value="<?php echo $objResult["TOTAL_TIME"];?>"></td>
	<td align="center"><input type="text" class="form-control" name="course_id" size="20" value="<?php echo $objResult["COURSE_ID"];?>"></td>
  </tr>
  </table>
  <div align="center"><button class="btn btn-primary btn-lg btn-block"  name="submit" value="submit">SUBMIT</button></div>
  <?php
  }
  oci_close($objConnect);
  ?>
  </form>
</body>
</html>