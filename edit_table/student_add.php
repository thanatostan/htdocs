<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<form name="form1" method="post" action="student_add_save.php">

<table class="table">
  <tr>
    <th> <div align="center">Username </div></th>
    <th> <div align="center">Password </div></th>
    <th> <div align="center">Name</div></th>
	<th> <div align="center">School</div></th>
    <th> <div align="center">Tel</div></th>
    <th> <div align="center">Address</div></th>
  </tr>
  <tr>
    <td align="center"><input class="form-control" type="text" name="username" size="20""></td>
    <td align="center"><input class="form-control" type="text" name="password" size="20""></td>
    <td align="center"><input class="form-control" type="text" name="name" size="20""></td>
	<td align="center"><input class="form-control" type="text" name="school" size="20""></td>
    <td align="center"><input class="form-control" type="text" name="tel" size="20""></td>
    <td align="center"><input class="form-control" type="text" name="address" size="20""></td>
  </tr>
  </table>
  <div align="center"><button class="btn btn-primary btn-lg btn-block"  name="submit" value="submit">SUBMIT</button></div>
  </form>
</body>
</html>