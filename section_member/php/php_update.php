<?php

require "../../php/php_conn.php";

$fileId = $_POST["fileId"];

$sql = mysqli_query($conn,"SELECT * FROM tbl_file WHERE file_id='$fileId'");
$row = mysqli_fetch_array($sql);

$fileName = $row["file_name"];
if($row["file_updated"]=='1'){
	echo "1";
}else{
	mysqli_query($conn,"UPDATE tbl_file SET file_updated='1' WHERE file_id='$fileId'");
	echo "0";
}

?>