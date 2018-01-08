<?php
	require "../../php/php_conn.php";

	$messageId = $_POST["messageId"];

	mysqli_query($conn, "UPDATE tbl_message SET isRead='1' WHERE message_id='$messageId'");
?>