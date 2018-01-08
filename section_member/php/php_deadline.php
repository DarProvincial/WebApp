<?php
require "../../php/php_conn.php";

$empId = $_POST["empId"];

$sql = mysqli_query($conn, "SELECT * FROM tbl_deadline WHERE dept_id='11111'");
$Time = "";
$Date = "";
while($row = mysqli_fetch_array($sql)){
	$Time = explode(":", $row["deadline_time"]);
	$Date = explode("-", $row["deadline_date"]);

}

echo json_encode(array("Hour"=>$Time[0],"Minute"=>$Time[1],"Second"=>$Time[2],"Year"=>$Date[0],"Month"=>$Date[1],"Day"=>$Date[2]))
?>