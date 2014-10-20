<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<form action="course_save.php?User=<?php echo $_GET["User"];?>" name="frmEdit" method="post">
<?php
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "SELECT * FROM course WHERE course_id = '".$_GET["User"]."' ";
$objParse = oci_parse ($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
$objResult = oci_fetch_array($objParse);
if(!$objResult)
{
	echo "Not found Course ID =".$_GET["User"];
}
else
{
	
?>
<table  class="table">
  <tr>
    <th > <div align="center">CourseID </div></th>
    <th > <div align="center">Subject </div></th>
	<th > <div align="center">Price </div></th>
    <th > <div align="center">Name </div></th>
	<th > <div align="center">Academy Username </div></th>
  </tr>
  <tr>
    <td align="center"><input type="text" class="form-control" name="course_id" size="20" value="<?php echo $objResult["COURSE_ID"];?>"></td>
    <td align="center"><input type="text" class="form-control" name="subject" size="20" value="<?php echo $objResult["SUBJECT"];?>"></td>
	<td align="center"><input type="text" class="form-control" name="price" size="20" value="<?php echo $objResult["PRICE"];?>"></td>
	<td align="center"><input type="text" class="form-control" name="name" size="20" value="<?php echo $objResult["NAME"];?>"></td>
		<td align="center"><input type="text" class="form-control" name="time_id" size="20" value="<?php echo $objResult["ACADEMY_USERNAME"];?>"></td>
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