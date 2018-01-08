$(document).ready(function(){
	loadNotice();
	loadMessage();
});

function loadContent(){
	getDeadline();
	$.ajax({
		type:'POST',
		url:'php/php_content.php',
		dataType:'JSON',
		data:'empId='+$("#empId").html(),
		success: function(data){
			console.log(data["files"]);
			$("table#empFile tbody").html(data["files"]);
		}
	});
}

function updateFile(fileId){
	$.ajax({
		type:'POST',
		data:'fileId='+fileId,
		url:'php/php_update.php',
		success: function(data){
			if(data=="1"){
				alertify.error("File is already been updated!");
				$("#"+fileId).prop("disabled", true);
			}else{
				alertify.success("File successfully updated!");
			}
		}
	});
}

function loadMessage(){
	messageContent();
	//alert($("#empId").html());
	$.ajax({
		type:'POST',
		dataType:'JSON',
		url:'php/php_loadmessage.php',
		data:'empId='+$("#empId").html(),
		success: function(data){
			$("#newM").html(data["newM"]);
			$(".newMessage").html(data["newMessage"]);
			//alert(data["messages_content"]);
			$("#inb").html(data["inb"]);
		}
	});
}

function readMessage(name){
	$(".notification").click();
	$("#modalMessage").modal();
	$("#cname").html((name.split("↕"))[1]);
	$("#message").html((name.split("↕"))[2]);
	$.ajax({
		type:'POST',
		data:'messageId='+(name.split("↕"))[0],
		url:'php/php_read.php',
		success:function(data){
			loadMessage();
		}
	});
}

function deleteMessage(id){
	$.ajax({
		type:'POST',
		data:'message_id='+id,
		url:'php/php_deletemessage.php',
		success: function(data){
			loadMessage();
		}
	});
}

function messageContent(){
	$.ajax({
		type:'POST',
		url:'php/php_messagecontent.php',
		data:'empId='+$("#empId").html(),
		success: function(data){
			$("#messageContent").html(data);
		}
	});		
}

function loadNotice() {
	$.ajax({
        type:'POST',
        url:'php/php_get_notice.php',
        success: function(data){
        	$("#notice-content").html(data);
        }
    });
}

function getDeadline(){
	$.ajax({
		type:'POST',
		data:'deptId='+$("#empId").data('dept'),
		url:'php/php_getdead.php',
		success: function(data){
			var arr = data.split("‼");
			$("#deadline_date").html(arr[0]);
			$("#deadline_full").html(arr[1]);
		}
	});
}

function showDownload(id){
	$("#modalDownloadMember").modal();
	$("#modal_body").load(window.location.href + " #modal" );
	$("#body_modals").html("<a class=\"btn btn-success btn-lg\" href=\"..//FILE//Files//File_Original//"+id+"\" download> Download Original</a>");
	$("#body_modals").html($("#body_modals").html()+"&nbsp;&nbsp;<a class=\"btn btn-danger btn-lg\" disabled> Download Update</a>");
}