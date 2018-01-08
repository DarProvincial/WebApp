<?php
require "../../php/php_conn.php";

$deptId = $_POST["deptId"];

$sql = mysqli_query($conn,"SELECT * FROM tbl_deadline WHERE dept_id='$deptId'");
if(mysqli_num_rows($sql)!=0){
	$row = mysqli_fetch_assoc($sql);
	$arrDateTime = explode("|", $row["dead_date"]);
	$arrDate = explode("-",$arrDateTime[0]);
	$finDate = $arrDate[2]."-".$arrDate[0]."-".$arrDate[1];
	$day = date('l', strtotime($finDate));
	$time = explode(":", $arrDateTime[1]);
	if($time[0] >12){
		echo $finDate." (".$day." at ".($time[0]-12).":".$time[1]." PM)";	
	}else{
		echo $finDate." (".$day." at ".($time[0]-12).":".$time[1]." AM)";	
	}
}else{
	echo "(Set deadline first)";
}

?>