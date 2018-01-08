<?php

require "../../php/php_conn.php";

$fileId = $_POST["fileId"];
mysqli_query($conn,"UPDATE tbl_file SET file_verified='1' WHERE file_id='$fileId'");

?>