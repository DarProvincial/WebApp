<?php
require "../../php/php_conn.php";

$deptId = $_POST["deptId"];
$sql1 = mysqli_query($conn, "SELECT * FROM tbl_file WHERE dept_id='$deptId'");
$sql2 = mysqli_query($conn, "SELECT * FROM tbl_file WHERE dept_id='$deptId' AND file_verified='1'");

if(mysqli_num_rows($sql1)==0){
	echo "2";
}else{
	if(mysqli_num_rows($sql1)==mysqli_num_rows($sql2)){
		echo "1";
	}else{
		echo "0";
	}	
}

?>