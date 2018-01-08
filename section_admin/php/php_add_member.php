<?php
require "../../php/php_conn.php";

$id = $_POST["id"];
$fname = $_POST["fname"];
$mname = $_POST["mname"];
$lname = $_POST["lname"];
$gender = $_POST["gender"];
$designation = $_POST["designation"];
$address = $_POST["address"];
$division = $_POST["division"];

$cdivision = "";

if($division=='STOD') {
	$cdivision = "11111";
}
if($division=='LTI') {
	$cdivision = "22222";	
}
if($division=='PBBD') {
	$cdivision = "33333";
	
}
if($division=='Legal') {
	$cdivision = "44444";
}

$sql= mysqli_query($conn, "INSERT INTO tbl_employee(emp_id,emp_fname,emp_mname,emp_surname,emp_designation,emp_gender,emp_address,dept_id) VALUES('$id','$fname','$mname','$lname','$designation','$gender','$address','$cdivision')");


if($sql) {
	echo "1";
} else {
	echo "0";
}


?> 