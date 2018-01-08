<?php
require "../../php/php_conn.php";

$deptId = $_POST["deptId"];
mysqli_query($conn,"UPDATE tbl_file SET file_saved='1' WHERE dept_id='$deptId'");

?>