<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<form action="join_save.php?User=<?php echo $_GET["User"];?>&User2=<?php echo $_GET["User2"];?>" name="frmEdit" method="post">
<?php
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "SELECT * FROM join WHERE package_id = '".$_GET["User"]."' and course_id = '".$_GET["User2"]."'";
$objParse = oci_parse ($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
$objResult = oci_fetch_array($objParse);
if(!$objResult)
{
	echo "Not found package_id=".$_GET["User"];
}
else
{
	
?>
<table  class="table">
  <tr>
    <th > <div align="center">Package ID</div></th>
    <th > <div align="center">Course ID</div></th>
  </tr>
  <tr>
    <td align="center"><input type="text" class="form-control" name="package_id" size="20" value="<?php echo $objResult["PACKAGE_ID"];?>"></td>
    
	<td align="center" width="50%">  	<?php
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "SELECT course_id , subject FROM course";
$objParse = oci_parse ($objConnect, $strSQL);
$r = oci_execute($objParse,OCI_DEFAULT);
echo '<select class="form-control" name="course_id">';
while ($row = oci_fetch_array($objParse)) {
echo '<option value="' .$row['COURSE_ID'].'">'.$row['COURSE_ID']," (", $row['SUBJECT'],")".'</option>';
}
echo '</select>';
?></td>
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