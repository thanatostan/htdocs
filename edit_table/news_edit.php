<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<form action="news_save.php?User=<?php echo $_GET["User"];?>" name="frmEdit" method="post">
<?php
$objConnect = oci_connect("projectdb","projectdb","localhost/XE");
$strSQL = "SELECT * FROM news WHERE news_id = '".$_GET["User"]."' ";
$objParse = oci_parse ($objConnect, $strSQL);
oci_execute ($objParse,OCI_DEFAULT);
$objResult = oci_fetch_array($objParse);
if(!$objResult)
{
	echo "Not found News_ID=".$_GET["User"];
}
else
{
	
?>
<table  class="table">
  <tr>
    <th > <div align="center">News_ID </div></th>
    <th > <div align="center">Header </div></th>
	<th > <div align="center">Data </div></th>
	<th > <div align="center">Post_Time </div></th>
  </tr>
  <tr>
    <td align="center"><input type="text" class="form-control" name="news_id" size="20" value="<?php echo $objResult["NEWS_ID"];?>"></td>
    <td align="center"><input type="text" class="form-control" name="header" size="20" value="<?php echo $objResult["HEADER"];?>"></td>
	<td align="center"><input type="text" class="form-control" name="data" size="20" value="<?php echo $objResult["DATA"];?>"></td>
	<td align="center"><input type="text" class="form-control" name="post_time" size="20" value="<?php echo $objResult["POST_TIME"];?>"></td>
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