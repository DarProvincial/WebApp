<?php
require "../../php/php_conn.php";

$n_title = $_POST["nTitle"];
$n_message = $_POST["nMessage"];
$n_date = $_POST["nDate"];
$n_place = $_POST["nPlace"];
$n_type = $_POST["nType"];


$sql= mysqli_query($conn, "INSERT INTO tbl_notice(n_title,n_message,n_date,n_place,n_type) VALUES('$n_title','$n_message','$n_date','$n_place','$n_type')");


if($sql) {
	echo "1";
} else {
	echo "0";
}


?> 