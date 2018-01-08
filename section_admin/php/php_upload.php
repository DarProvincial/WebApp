<?php
require "../../php/php_conn.php";

$deptId = $_POST["deptId"];
$fileName = $_FILES["fileName"]["name"];
$fileId = rand(0,9)."".rand(0,9)."".rand(0,9)."".rand(0,9);

mysqli_query($conn, "INSERT INTO tbl_file(file_id,file_name,emp_id,dept_id,file_verified) VALUES('$fileId','$fileName','0','$deptId','0')");

/*$file_result = "";

if($_FILES["file"]["error"] > 0){
	$file_result.="No file uploaded or Invalid file<br>";
	$file_result.="Error code: ".$_FILES["file"]["error"]."<br>";
}else{
	$file_result.=
	"Upload: ".$_FILES["file"]["name"]."<br>".
	"Type: ".$_FILES["file"]["type"]."<br>".
	"Size: ".($_FILES["file"]["size"] / 1024)." kb<br>".
	"Temp File: ".$_FILES["file"]["tmp_name"]."<br>";

	move_uploaded_file($_FILES["file"]["tmp_name"], "section_profiles/".$_FILES["file"]["name"]);
	$file_result.="File upload successful!";
}

echo $file_result;*/

?>