<html>
<head>
<title>Admin Page</title>
</head>
<link href="css/bootstrap.min.css" rel="stylesheet">
<body>
<form name="form1" method="post" action="news_add_save.php">

<table class="table">
  <tr>
    <th width="91"> <div align="center">News_ID </div></th>
    <th width="160"> <div align="center">Header </div></th>
	<th width="160"> <div align="center">Date </div></th>
	<th width="160"> <div align="center">Post_Time(DD-MON(eg.JAN)-YYYY HH.MI.SS AM/PM) </div></th>
  </tr>
  <tr>
    <td align="center"><input class="form-control" type="text" name="news_id" size="20""></td>
    <td align="center"><input class="form-control" type="text" name="header" size="20""></td>
	 <td align="center"><input class="form-control" type="text" name="data" size="20""></td>
	 <td align="center"><input class="form-control" type="text" name="post_time" size="20""></td>
  </tr>
  </table>
  <div align="center"><button class="btn btn-primary btn-lg btn-block"  name="submit" value="submit">SUBMIT</button></div>
  </form>
</body>
</html>