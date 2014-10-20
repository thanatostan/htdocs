<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<form name="form1" method="post" action="join_add_save.php">

<table class="table">
  <tr>
    <th> <div align="center">Package ID</div></th>
    <th> <div align="center">Course ID</div></th>

  </tr>
  <tr>
    <td align="center"><input class="form-control" type="text" name="package_id" size="20""></td>
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
?></tr>
  </table>
  <div align="center"><button class="btn btn-primary btn-lg btn-block"  name="submit" value="submit">SUBMIT</button></div>
  </form>
</body>
</html>