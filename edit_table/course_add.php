<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<form name="form1" method="post" action="course_add_save.php">

<table class="table">
  <tr>
    <th> <div align="center">CourseID </div></th>
    <th> <div align="center">Subject </div></th>
	<th> <div align="center">Price </div></th>
	<th> <div align="center">Name </div></th>
	<th> <div align="center">Acadamy_username </div></th>
  </tr>
  <tr>
    <td align="center"><input class="form-control" type="text" name="course_id" size="20""></td>
    <td align="center"><input class="form-control" type="text" name="subject" size="20""></td>
	<td align="center"><input class="form-control" type="text" name="price" size="20""></td>
	<td align="center"><input class="form-control" type="text" name="name" size="20""></td>
		<td align="center"><input class="form-control" type="text" name="academy_username" size="20""></td>
  </tr>
  </table>
  <div align="center"><button class="btn btn-primary btn-lg btn-block"  name="submit" value="submit">SUBMIT</button></div>
  </form>
</body>
</html>