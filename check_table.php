<?php 
$table=$_POST['Submit'];
header("location:edit_table/$table.php");
?>

<?php /*
session_start();
$db_name="PROJECTDB"; // Database name 
$c = oci_connect("PROJECTDB","projectdb","localhost/XE");
$tablename=$_POST["tablename"];
$query="SELECT * FROM $tablename";
$result = oci_parse($c,$query);
$r = oci_execute($result);
if($r){
	header("location:edit_table/edit_$tablename.php");
}
else{
	echo "table not exists";
}
?>*/
