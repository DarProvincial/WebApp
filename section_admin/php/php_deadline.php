<?php
require "../../php/php_conn.php";

$empId = $_POST["empId"];
$fileId = $_POST["fileId"];

mysqli_query($conn,"UPDATE tbl_file SET emp_id='$empId' WHERE file_id='$fileId'");

$dMonth = $_POST["dMonth"];
$dDay = $_POST["dDay"];
$dYear = $_POST["dYear"];
$dTime = $_POST["dTime"];
$deptId = $_POST["deptId"];

$date = $dMonth."-".$dDay."-".$dYear."|".$dTime;

$sql = mysqli_query($conn,"SELECT * FROM tbl_deadline WHERE file_id='$fileId'");
if(mysqli_num_rows($sql)!=0){
	mysqli_query($conn,"UPDATE tbl_deadline SET dead_date='$date' WHERE file_id='$fileId'");
}else{
	mysqli_query($conn, "INSERT INTO tbl_deadline VALUES('$date','$fileId')");
}

?>