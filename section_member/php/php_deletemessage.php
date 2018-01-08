<?php
require "../../php/php_conn.php";

$message_id = $_POST["message_id"];
mysqli_query($conn, "DELETE FROM tbl_message WHERE message_id='$message_id'");

?>