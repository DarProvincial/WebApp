<?php
require "../../php/php_conn.php";

$deptId = $_POST["deptId"];
$sql = mysqli_query($conn,"SELECT * FROM tbl_file WHERE emp_id='0' AND dept_id='$deptId'");

//$num = mysqli_num_rows($sql);
$files = "";
$num = mysqli_num_rows($sql);
while($row = mysqli_fetch_array($sql)){
	$files.="<li class=\"list-group-item\" id=\"".$row["file_id"]."↕".$row["file_name"]."\"  draggable=\"true\" ondragstart=\"drag(event, this.id)\"><span class=\"pull-right\"><button id=\"".$row["file_id"]."\" onclick=\"removeFile(2, this.id)\" class=\"btn btn-danger btn-xs\"><i class=\"fa fa-trash-o\"></i> </button></span><div style=\"white-space: nowrap; width: 90%; overflow: hidden;text-overflow: ellipsis;\"><i class=\"fa fa-file\"></i> ".$row["file_name"]."</div></li>";
}

echo json_encode(array("files"=>$files,"num"=>$num));

?>