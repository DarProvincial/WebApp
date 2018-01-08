<?php

require "../../php/php_conn.php";

$curDate = date("Y-m-d");
$deptId = $_POST["deptId"];

$sql = mysqli_query($conn,"SELECT * FROM tbl_file WHERE dept_id='$deptId'");
mkdir("../../FILE/Files_Log/".$curDate."-".$deptId);

while($row = mysqli_fetch_array($sql)){
	rename("../../FILE/Files/".$row["file_name"],"../../FILE/Files_Log/".$curDate."-".$deptId."/".$row["file_name"]);
}

mysqli_query($conn,"DELETE FROM tbl_file WHERE dept_id='$deptId'");

?>