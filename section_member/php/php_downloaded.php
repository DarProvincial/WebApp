<?php

require "../../php/php_conn.php";
$fileId = $_POST["fileId"];
$fileName = $_POST["fileName"];

mysqli_query($conn,"UPDATE tbl_file SET file_downloaded='1' WHERE file_id='$fileId'");
if($row["file_downloaded"]=='1'){
	echo "1";
}else{
	echo "0";
}
?>