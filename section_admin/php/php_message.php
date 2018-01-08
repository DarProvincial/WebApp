<?php
require "../../php/php_conn.php";

$messageId = rand(0,9)."".rand(0,9)."".rand(0,9)."".rand(0,9)."".rand(0,9);
$senderId = $_POST["senderId"];
$receiverId = $_POST["receiverId"];
$content = $_POST["content"];
$isRead = 0;

mysqli_query($conn,"INSERT INTO tbl_message VALUES('$messageId','$senderId','$receiverId','$content','$isRead',now())");

?>