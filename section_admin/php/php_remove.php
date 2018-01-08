<?php
require "../../php/php_conn.php";

$fileId = $_POST["fileId"];
$key = $_POST["key"];

if($key==1){
	mysqli_query($conn,"UPDATE tbl_file SET emp_id='0' WHERE file_id='$fileId'");
	mysqli_query($conn,"DELETE FROM tbl_deadline WHERE file_id='$fileId'");
}else{
	mysqli_query($conn,"DELETE FROM tbl_file WHERE file_id='$fileId'");
}

?>