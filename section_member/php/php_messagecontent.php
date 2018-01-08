<?php
require "../../php/php_conn.php";

$empId = $_POST["empId"];
$sql = mysqli_query($conn, "SELECT isRead, m_date, message_id, emp_fname, message_content FROM tbl_employee AS e, tbl_message AS m WHERE m.receiver_id='$empId' AND m.sender_id=e.emp_id ORDER BY m.m_date DESC");

$messages_content = "";

while($rows = mysqli_fetch_array($sql)){
    if($rows["isRead"]=='1'){
        $messages_content.="<div class=\"act-time\">                                      
                                <div style=\"\" class=\"activity-body act-in\">
                                    <span class=\"arrow\"></span>
                                    <div class=\"text\">
                                        <a href=\"#\" class=\"activity-img\"><img class=\"avatar\" src=\"../img/chat-avatar.jpg\" alt=\"\"></a><span class=\"pull-right\"><p>".$rows["m_date"]."</p></span>
                                        <p class=\"attribution\"><a href=\"#\">".$rows["emp_fname"]."</a></p><span class=\"pull-right\"><button class=\"btn btn-success btn-xs\" id=\"".$rows["message_id"]."↕".$rows["emp_fname"]."↕".$rows["message_content"]."\" onclick=\"readMessage(this.id)\">Read</button>&nbsp;&nbsp;<button class=\"btn btn-danger btn-xs\" id=\"".$rows["message_id"]."\" onclick=\"deleteMessage(this.id)\">Delete</button></span>
                                        <p style=\"white-space: nowrap; width: 70%; overflow: hidden;text-overflow: ellipsis;\">".$rows["message_content"]."</p>
                                    </div>
                                </div>
                            </div>";
    }else{
        $messages_content.="<div class=\"act-time\">                                      
                                <div style=\"border-style:solid; border-radius:5px; border-color:black; border-width:1px;\" class=\"activity-body act-in\">
                                    <span class=\"arrow\"></span>
                                    <div class=\"text\">
                                        <a href=\"#\" class=\"activity-img\"><img class=\"avatar\" src=\"../img/chat-avatar.jpg\" alt=\"\"></a><span class=\"pull-right\"><b style=\"color:black;\">NEW MESSAGE</b></span>
                                        <p class=\"attribution\"><a href=\"#\"><b>".$rows["emp_fname"]."</b></a></p><span class=\"pull-right\"><button class=\"btn btn-success btn-xs\" id=\"".$rows["message_id"]."↕".$rows["emp_fname"]."↕".$rows["message_content"]."\" onclick=\"readMessage(this.id)\">Read</button>&nbsp;&nbsp;<button class=\"btn btn-danger btn-xs\" id=\"".$rows["message_id"]."\" onclick=\"deleteMessage(this.id)\">Delete</button></span>
                                        <p style=\"white-space: nowrap; width: 70%; overflow: hidden;text-overflow: ellipsis;\"><b style=\"color:black;\">".$rows["message_content"]."</b></p>
                                    </div>
                                </div>
                            </div>";
    }
}

echo $messages_content;

?>