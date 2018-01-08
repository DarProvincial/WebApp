<?php
require "../../php/php_conn.php";

$empId = $_POST["empId"];
$sql = mysqli_query($conn, "SELECT * FROM tbl_message WHERE receiver_id='$empId'");
$sql2 = mysqli_query($conn, "SELECT message_id, emp_fname, message_content FROM tbl_employee AS e, tbl_message AS m WHERE m.receiver_id='$empId' AND m.sender_id=e.emp_id AND m.isRead='0' ORDER BY m.m_date DESC");

$num = mysqli_num_rows($sql);
$num2 = mysqli_num_rows($sql2);

$newM = "";

$messages_content = "";

while($row = mysqli_fetch_array($sql2)){
	$newM.="<li class=\"tooltips\" data-original-title=\"".$row["emp_fname"]."\" data-placement=\"left\">
              <a id=\"".$row["message_id"]."↕".$row["emp_fname"]."↕".$row["message_content"]."\" onclick=\"readMessage(this.id)\">
              <span class=\"small italic pull-right\"> 1 hr</span> 
                <div style=\"white-space: nowrap; width: 80%; overflow: hidden;text-overflow: ellipsis;\">
                <span class=\"label label-warning\"><i class=\"fa fa-envelope\"></i></span>  ".$row["message_content"]."</div>
              </a>
            </li>";
}

echo json_encode(array("newM"=>$newM,"newMessage"=>$num2,"inb"=>$num));

?>