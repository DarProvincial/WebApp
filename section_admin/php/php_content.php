<?php
require "../../php/php_conn.php";

$deptId = $_POST["deptId"];
$sql = mysqli_query($conn,"SELECT * FROM tbl_employee WHERE dept_id='$deptId' AND emp_designation='Member'");

$emp = "";
$num = mysqli_num_rows($sql);

while($row = mysqli_fetch_assoc($sql)){
	$emp.="<a data-toggle=\"tooltip\" data-placement=\"left\" title=\"".$row["emp_id"]."\" class=\"list-group-item names\" id=\"".$row["emp_id"]."►".$row["emp_fname"]."\" onclick=\"loadFiles(this.id)\"><span class=\"pull-right\"><button style=\"width:25px;\" class=\"btn btn-success btn-xs\"><i class=\"fa fa-info\"></i></button>&nbsp;&nbsp;<button style=\"width:25px;\" id=\"".$row["emp_fname"]."♀".$row["emp_id"]."\" onclick=\"chat(this.id)\" class=\"btn btn-warning btn-xs\"><i class=\"fa fa-envelope\"></i> </button></span><div style=\"white-space: nowrap; width: 60%; overflow: hidden;text-overflow: ellipsis;\"><i class=\"fa fa-user\"></i> ".$row["emp_fname"]."</div></a>";
}

echo json_encode(array("emp"=>$emp,"num"=>$num));

?>