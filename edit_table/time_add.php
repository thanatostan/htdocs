<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<form name="form1" method="post" action="time_add_save.php">

<table class="table">
  <tr>
    <th> <div align="center">Time_ID </div></th>
    <th> <div align="center">Study_Period </div></th>
    <th> <div align="center">Total_Time</div></th>
    <th> <div align="center">Course_ID</div></th>
  </tr>
  <tr>
    <td align="center"><input class="form-control" type="text" name="time_id" size="20""></td>
    <td align="center"><input class="form-control" type="text" name="study_period" size="20""></td>
    <td align="center"><input class="form-control" type="text" name="total_time" size="20""></td>
    <td align="center"><input class="form-control" type="text" name="course_id" size="20""></td>
  </tr>
  </table>
  <div align="center"><button class="btn btn-primary btn-lg btn-block"  name="submit" value="submit">SUBMIT</button></div>
  </form>
</body>
</html>