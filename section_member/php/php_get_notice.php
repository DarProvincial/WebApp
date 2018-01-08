<?php
require "../../php/php_conn.php";

$sql = mysqli_query($conn,"SELECT * FROM tbl_notice ORDER BY id DESC");

$emp = "";
$num = mysqli_num_rows($sql);


while($row = mysqli_fetch_array($sql)){
	$type = "";
	if ($row['n_type'] == 'Urgent') {
		$type = "danger";
	} elseif ($row['n_type'] == 'Important') {
		$type = "success";
	} elseif ($row['n_type'] == 'Informational') {
		$type = "primary";
	} elseif ($row['n_type'] == 'Natural') {
		$type = "info";
	}
	$emp.="<div class=\"bs-calltoaction bs-calltoaction-".$type."\"><div class=\"row\"><div class=\"col-md-9 cta-contents\"><h1 class=\"cta-title\">".$row['n_title']."</h1><div class=\"cta-desc\"><p>WHEN: ".$row['n_date']."</p><p>WHERE: ".$row['n_place']."</p><p>WHAT: ".$row['n_message']."</p></div></div></div></div>";
}
echo $emp;
?>