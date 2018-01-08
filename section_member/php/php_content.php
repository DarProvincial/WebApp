<?php

require "../../php/php_conn.php";

$empId = $_POST["empId"];
$sql = mysqli_query($conn, "SELECT * FROM tbl_file WHERE emp_id='$empId'");
$num = mysqli_num_rows($sql);
$files = "";
$uname = "";
$count = "";

while($row = mysqli_fetch_array($sql)){	
	if($row["file_verified"]=='1'){
		$files.="<tr>
		<td>".$row["file_name"]."</td>
		<td>
		<center>
		<a class=\"btn btn-md btn-info btn-xs\" disabled>Download</a>
		<a id=\"".$row["file_id"]."\" onclick=\"updateFile(this.id)\" class=\"btn btn-md btn-success btn-xs\" disabled>Update</a>
		</center>
		</td>
		<td><center><label class=\"label label-success\"><i class=\"fa fa-check\"></i> </label></center></td>
		</tr>";	
	}else{
		$files.="<tr>
		<td>".$row["file_name"]."</td>
		<td>
		<center>
		<a id=\"".$row["file_name"]."\" onclick=\"showDownload(this.id)\" class=\"btn btn-md btn-info btn-xs\">Download</a>
		<a id=\"".$row["file_id"]."\" onclick=\"updateFile(this.id)\" class=\"btn btn-md btn-success btn-xs\">Update</a>
		</center>
		</td>
		<td><center><label class=\"label label-default\"><i class=\"fa fa-check\"></i> </label></center></td>
		</tr>";	
	}	

}
/*if(!empty($_POST['file_list'])){
	foreach($_POST['file_list'] as $selected){
		$sql = "UPDATE tbl_file SET file_upload='1' WHERE file_name='$selected'";
	}*/




echo json_encode(array("num"=>$num,"files"=>$files,"uname"=>$uname));
?>