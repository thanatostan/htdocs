<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<form name="form1" method="post" action="package_add_save.php">

<table class="table">
  <tr>
    <th> <div align="center">Package ID</div></th>
    <th> <div align="center">Price</div></th>

  </tr>
  <tr>
    <td align="center"><input class="form-control" type="text" name="package_id" size="20""></td>
    <td align="center"><input class="form-control" type="text" name="price" size="20""></td>
  </tr>
  </table>
  <div align="center"><button class="btn btn-primary btn-lg btn-block"  name="submit" value="submit">SUBMIT</button></div>
  </form>
</body>
</html>