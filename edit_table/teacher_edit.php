<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<form action="teacher_save.php?User=<?php echo $_GET["User"];?>" name="frmEdit" method="post">
<?php
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "SELECT * FROM teacher WHERE teacher_id = '".$_GET["User"]."' ";
$objParse = oci_parse ($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
$objResult = oci_fetch_array($objParse);
if(!$objResult)
{
	echo "Not found teacher_id=".$_GET["User"];
}
else
{
	
?>
<table  class="table">
  <tr>
    <th > <div align="center">Teacher ID </div></th>
    <th > <div align="center">Name</div></th>
    <th > <div align="center">TEL</div></th>
    <th > <div align="center">Address</div></th>
  </tr>
  <tr>
  <td align="center"><input type="text" class="form-control" name="teacher_id" size="20" value="<?php echo $objResult["TEACHER_ID"];?>"></td>
    <td align="center"><input type="text" class="form-control" name="name" size="20" value="<?php echo $objResult["NAME"];?>"></td>
    <td align="center"><input type="text" class="form-control" name="tel" size="20" value="<?php echo $objResult["TEL"];?>"></td>
    <td align="center"><input type="text" class="form-control" name="address" size="20" value="<?php echo $objResult["ADDRESS"];?>"></td>
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