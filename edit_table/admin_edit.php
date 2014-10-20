<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<form action="admin_save.php?User=<?php echo $_GET["User"];?>" name="frmEdit" method="post">
<?php
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "SELECT * FROM admin WHERE username = '".$_GET["User"]."' ";
$objParse = oci_parse ($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
$objResult = oci_fetch_array($objParse);
if(!$objResult)
{
	echo "Not found Username=".$_GET["User"];
}
else
{
	
?>
<table  class="table">
  <tr>
    <th > <div align="center">Username </div></th>
    <th > <div align="center">Password </div></th>
	<th > <div align="center">Name </div></th>
  </tr>
  <tr>
    <td align="center"><input type="text" class="form-control" name="username" size="20" value="<?php echo $objResult["USERNAME"];?>"></td>
    <td align="center"><input type="text" class="form-control" name="password" size="20" value="<?php echo $objResult["PASSWORD"];?>"></td>
	<td align="center"><input type="text" class="form-control" name="name" size="20" value="<?php echo $objResult["NAME"];?>"></td>
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