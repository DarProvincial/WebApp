<?php
require "../../php/php_conn.php";

$empId = $_POST["empId"];
$sql = mysqli_query($conn,"SELECT * FROM tbl_file WHERE emp_id='$empId'");

$num = mysqli_num_rows($sql);
$files = "";
$exist = "";

if(mysqli_num_rows($sql)==0){
	$files = "<tr><td colspan=\"4\"><center>No files.</center></td></tr>";
}else{
	while($row = mysqli_fetch_array($sql)){
		$filename = $row["file_name"];
		if($row["file_updated"]=='1'){
			$files.="<tr>
			<td><center><span class=\"label label-success\"><i class=\"fa fa-bell-o\"></i></span></center></td>
			<td><div style=\"white-space: nowrap; width: 60%; overflow: hidden;text-overflow: ellipsis;\">".$row["file_name"]."</div></td>";

			if($row["file_saved"]=='1'){
				$files.="<td><center><a data-toggle=\"modal\" data-target=\"#modalDownload\" id=\"".$row["file_id"]."↕".$row["file_name"]."↕".$row["file_updated"]."\" onclick=\"showDownload(this.id)\" class=\"btn btn-primary btn-sm\"><i class=\"fa fa-download\"></i></a>&nbsp;";

				if($row["file_verified"]=='1'){
					$files.="<button type=\"button\" class=\"btn btn-success btn-sm\" disabled><i class=\"fa fa-check\"></i> Verified</button></center></td>";
				}else{
					$files.="<button id=\"".$row["file_id"]."\" onclick=\"verifyFile(this.id)\" type=\"button\" class=\"btn btn-success btn-sm\">Verify</button></center></td>";
				}
				$files.="<td><center><button class=\"btn btn-danger btn-sm\" disabled><i class=\"fa fa-trash-o\" disabled></i> </button></center></td>
				</tr>";
			}else{
				$files.="<td><center><a class=\"btn btn-primary btn-sm\" disabled><i class=\"fa fa-download\"></i></a>&nbsp;";
				if($row["file_verified"]=='1'){
					$files.="<button type=\"button\" class=\"btn btn-success btn-sm\" disabled><i class=\"fa fa-check\"></i> Verified</button></center></td>";
				}else{
					$files.="<button type=\"button\" class=\"btn btn-success btn-sm\" disabled>Verify</button></center></td>";
				}
				$files.="<td><center><button id=\"".$row["file_id"]."\" onclick=\"removeFile(1,this.id)\" class=\"btn btn-danger btn-sm\"><i class=\"fa fa-trash-o\"></i> </button></center></td>
				</tr>";
			}
		}else{
			$files.="<tr>
			<td><center><span class=\"label label-default\"><i class=\"fa fa-bell-o\"></i></span></center></td>
			<td><div style=\"white-space: nowrap; width: 60%; overflow: hidden;text-overflow: ellipsis;\">".$row["file_name"]."</div></td>";

			if($row["file_saved"]=='1'){
				$files.="<td><center><a data-toggle=\"modal\" data-target=\"#modalDownload\" id=\"".$row["file_id"]."↕".$row["file_name"]."↕".$row["file_updated"]."\" onclick=\"showDownload(this.id)\" class=\"btn btn-primary btn-sm\"><i class=\"fa fa-download\"></i></a>&nbsp;";

				if($row["file_verified"]=='1'){
					$files.="<button type=\"button\" class=\"btn btn-success btn-sm\" disabled><i class=\"fa fa-check\"></i> Verified</button></center></td>";
				}else{
					$files.="<button type=\"button\" class=\"btn btn-success btn-sm\" id=\"".$row["file_id"]."\" onclick=\"verifyFile(this.id)\">Verify</button></center></td>";
				}
				$files.="<td><center><button class=\"btn btn-danger btn-sm\" disabled><i class=\"fa fa-trash-o\"></i> </button></center></td>
				</tr>";
			}else{
				$files.="<td><center><a class=\"btn btn-primary btn-sm\" disabled><i class=\"fa fa-download\"></i></a>&nbsp;";
				if($row["file_verified"]=='1'){
					$files.="<button type=\"button\" class=\"btn btn-success btn-sm\" disabled><i class=\"fa fa-check\"></i> Verified</button></center></td>";
				}else{
					$files.="<button type=\"button\" class=\"btn btn-success btn-sm\" disabled>Verify</button></center></td>";
				}
				$files.="<td><center><button id=\"".$row["file_id"]."\" class=\"btn btn-danger btn-sm\" onclick=\"removeFile(1,this.id)\"><i class=\"fa fa-trash-o\"></i> </button></center></td>
				</tr>";
			}
		}
	}
}

echo json_encode(array("files"=>$files,"num"=>$num,"resp"=>$exist));

?>