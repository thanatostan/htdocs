<?php
$db_name="projectDB"; // Database name 
$tbl_name="members"; // Table name 
$c = oci_connect("projectDB", "projectDB", "localhost/XE");
$s = oci_parse($c, "SELECT * FROM $tbl_name");
$r = oci_execute($s);
echo "<table border='1'>\n";
$ncols = oci_num_fields($s);
echo "<tr>\n";
for ($i = 1; $i <= $ncols; ++$i) {
	$colname = oci_field_name($s, $i);
	echo "  <th><b>".htmlentities($colname, ENT_QUOTES)."</b></th>\n";
}
echo "</tr>\n";

while (($row = oci_fetch_array($s, OCI_ASSOC+OCI_RETURN_NULLS)) != false) {
	echo "<tr>\n";
	foreach ($row as $item) {
		echo "  <td>".($item!==null?htmlentities($item, ENT_QUOTES):"&nbsp;")."</td>\n";
	}
	echo "</tr>\n";
}
echo "</table>\n";

?>
