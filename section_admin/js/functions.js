$(document).ready(function(){
	loadNotice();

	$(document).on("click", ".names", function (e) {
		$('.list-group').find('a').removeClass('active');
		if (!$(this).hasClass('active')) {
			$(this).addClass('active');
		}
	});

	$(document).on('click', '.browse', function(){
		var file = $(this).parent().parent().parent().find('.file');
		file.trigger('click');
	});

	$(document).on('change', '.file', function(){
		$(this).parent().find('.form-control').val($(this).val().replace(/C:\\fakepath\\/i, ''));
		if($(this).parent().find('.form-control').val()!=""){
			prepareUpload(event);
		}else{
			alertify.error("No file selected!");
		}
	});

	$("#submit").click(function() {

		var title = $("#notice-title").val();
		var message = $("#message-notice").val();
		var date = $("#sc-date").val();
		var place = $("#place").val();
		var type = $("#ntype option:selected").text();

		$.ajax({
			type:'POST',
			data:'nTitle='+title+'&nMessage='+message+'&nDate='+date+'&nPlace='+place+'&nType='+type,
			url:'php/php_add_notice.php',
			success: function(data){
				if(data==1){
					alertify.success("Success! "+message);
					loadNotice();
				}else{
					alertify.error("Something is Wrong!	");	
				}
			}
		});
	});
	$("#signupSubmit").click(function() {

		var id = $("#empid").val();
		var fname = $("#fname").val();
		var mname = $("#mname").val();
		var lname = $("#lname").val();
		var gender = $('input:radio[name="gender"]:checked').val();
		var address = $("#address").val();
		var designation = $("#designation").val();
		var division = $("#division option:selected").text();

		alert(id+"-"+fname);

		$.ajax({
			type:'POST',
			data:'id='+id+'&fname='+fname+'&mname='+mname+'&lname='+lname+'&gender='+gender+'&address='+address+'&designation='+designation+'&division='+division,
			url:'php/php_add_member.php',
			success: function(data){
				if(data==1){
					alertify.success("Success!");
				}else{
					alertify.error("Something is Wrong!	");	
				}
			}
		});
	});
});

var empId = "";
var fileId = "";
var fileN = "";
var deptId = "";
var files;

function loadNotice() {
	$.ajax({
		type:'POST',
		url:'php/php_get_notice.php',
		success: function(data){
			$("#notice-content").html(data);

            }
        });
}

function loadContent(deptId,f,s,t,a){
	checkapply();
	reset(f,s,t,a);
	this.deptId = deptId;
	loadAvailableFile(deptId);
	//getDeadline();
	$.ajax({
		data:'deptId='+deptId,
		type:'POST',
		url:'php/php_content.php',
		dataType:'JSON',
		success: function(data){
			$("#empAll").hide().html(data["emp"]).slideDown(500);
			$("#empNumber").html(data["num"]);
		}
	});
}

function loadFiles(empId){
	var arr = empId.split("►");
	this.empId = arr;
	$.ajax({
		data:'empId='+arr[0],
		type:'POST',
		url:'php/php_files.php',
		dataType:'JSON',
		success: function(data){
			console.log(data);
			$("table#empFile tbody").hide().html(data["files"]).fadeIn(500);
			$("#fileNum").html(data["num"]);
			$("#fname").hide().html(arr[1]).fadeIn(500);
		}
	});
}

function loadAvailableFile(deptId){
	$.ajax({
		data:'deptId='+deptId,
		dataType:'JSON',
		type:'POST',
		url:'php/php_available.php',
		success:function(data){
			checkapply();
			$('#fileAvailable').hide().html(data["files"]).slideDown(500);
			$('#numAvailable').html(data["num"]);
			if(data["num"]==0){
				$("#btnSave").prop("disabled",false);
			}else{
				$("#btnSave").prop("disabled",true);
			}
		}
	});
}

function allowDrop(ev) {
	ev.preventDefault();
}

function drag(ev,id) {
	var arr = id.split("↕");
	this.fileId = arr[0];
	this.fileN = arr[1];
	ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev,key) {
	if(key==0){
		if(this.empId!=""){
			$("#modalDeadline").modal();
			$("#dname").data('fid',this.fileId);
			$("#dname").html(this.fileN);
			/*$.ajax({
				type:"POST",
				url:'php/php_add.php',
				data:'empId='+(this.empId)[0]+"&fileId="+this.fileId,
				success: function(data){
					alertify.success("File successfully transferred!");		
					loadFiles(e[0]+"►"+e[1]);
					loadAvailableFile(d);
					checkapply();
				}
			});*/
		}else{
			alertify.error("No name selected!");
		}
	}
}

function removeFile(key, fid){
	var f = this.fileId;
	var e = this.empId;
	var d = this.deptId;
	//alert(key+ " - "+fid);
	$.ajax({
		type:'POST',
		url:'php/php_remove.php',
		data:'fileId='+fid+"&key="+key,
		success: function(data){
			//alert(e[0]+"►"+e[1]+" , "+this.deptId+" , "+this.fileId);
			if(key==1){
				alertify.error("File moved to "+$("#deptName").html()+" documents!");
				loadFiles(e[0]+"►"+e[1]);
			}
			loadAvailableFile(d);
		}
	});
}

function verifyFile(fileId){
	var e = this.empId;
	$.ajax({
		type:'POST',
		data:'fileId='+fileId,
		url:'php/php_verify.php',
		success: function(data){
			alertify.success("File verified!");
			checkapply();
			loadFiles(e[0]+"►"+e[1]);
		}
	});
}

function saveAll(){
	var e = this.empId;
	$.ajax({
		type:'POST',
		data:'deptId='+this.deptId,
		url:'php/php_save.php',
		success: function(data){
			alertify.success("Saved successfully!");
			loadFiles(e[0]+"►"+e[1]);
			checkapply();
		}
	});
}

function checkapply(){
	$.ajax({
		type:'POST',
		data:'deptId='+this.deptId,
		url:'php/php_checkapply.php',
		success: function(data){
			if(data=="2"){
				$("#btnApply").prop("disabled", true);
			}else{
				if(data=="1"){
					$("#btnApply").prop("disabled", false);
				}else{
					$("#btnApply").prop("disabled", true);
				}
			}
		}
	});
}

function apply(){
	var e = this.empId;
	$.ajax({
		type:'POST',
		data:'deptId='+deptId,
		url:'php/php_apply.php',
		success: function(data){
			alertify.success("File successfully logged!");
			loadFiles(e[0]+"►"+e[1]);
			checkapply();
		}
	});
}

function sendMessage(){
	if($("#message").val()==""){
		alert("empty message!!");
	}else{
		$.ajax({
			type:'POST',
			data:'senderId='+$("#user").data('user')+"&receiverId="+$("#cont").data('receiver')+"&content="+$("#message").val(),
			url:'php/php_message.php',
			success: function(data){
				alertify.success("Message sent!"+data);
				$("#modalChat .close").click();
			}	
		});
	}
}

function reset(f,s,t,a){
	this.empId = "";
	this.fileId = "";
	this.deptId = "";
	$("#fname").html("");
	$("table#empFile tbody").html("");
	$("#fileNum").html("");
	
	$("#"+f).html("");
	$("#"+s).html("");
	$("#"+t).html("");
	$("#"+a).load("included/included_all.php");
	$("#deptName").html(a);
}

function chat(id){
	$("#modalChat").modal();
	$("#cname").html((id.split("♀"))[0]);
	$("#cont").data('receiver',(id.split("♀"))[1]);
	$("#message").val(""); 
}

function showDownload(id){
	var arr = id.split("↕");
	$("#filen").html(arr[1]);
	$("#modalDownload").modal();
	$( "#modal_body").load(window.location.href + " #modal" );
	$("#body_modal").html("<a class=\"btn btn-success btn-lg\" href=\"..//FILE//Files//File_Original//"+arr[1]+"\" download> Download Original</a>");
	if (arr[2] == '1') {
		$("#body_modal").html($("#body_modal").html()+"&nbsp;&nbsp;<a class=\"btn btn-danger btn-lg\" href=\"..//FILE//Files//File_Update//"+arr[1]+"\" download> Download Update</a>");
	}else{
		$("#body_modal").html($("#body_modal").html()+"&nbsp;&nbsp;<a class=\"btn btn-danger btn-lg\" disabled> Download Update</a>");
	}
}


function prepareUpload(event){
	files = event.target.files;
	uploadFiles(event);
}

function uploadFiles(event)	{
	event.stopPropagation();
    event.preventDefault();
    var data = new FormData();
    $.each(files, function(key, value)
    {
    	data.append(key, value);
    });
    console.log(data);
    $.ajax({
    	url: 'php/submit.php?files&deptId='+deptId,
    	type: 'POST',
    	data: data,
    	cache: false,
    	dataType: 'json',
        processData: false, // Don't process the files
        contentType: false, // Set content type to false as jQuery will tell the server its a query string request
        success: function(data, textStatus, jqXHR){
        	if(typeof data.error === 'undefined'){
        		loadAvailableFile(deptId);
        	}else{
        		// Handle errors here
        		console.log('ERRORS: ' + data.error);
        	}
        },
        error: function(jqXHR, textStatus, errorThrown){
        	console.log('ERRORS: ' + textStatus);
        }
    });
}

function setYesNo(){
	if($("#chkDead").val()=="0"){
		$("#groupElements").css("display","block");
		$("#chkDead").val("1");
	}else{
		$("#groupElements").css("display","none");
		$("#chkDead").val("0");
	}
}

function saveDeadline(){
	var e = this.empId;
	var d = this.deptId;
	if($("#dead_time").val()!=""){
		$.ajax({
			type:'POST',
			data:"dMonth="+$("#dead_month").val()+"&dDay="+$("#dead_day").val()+"&dYear="+$("#dead_year").val()+"&dTime="+$("#dead_time").val()+"&fileId="+$("#dname").data('fid')+"&empId="+e[0],
			url:'php/php_deadline.php',
			success: function(data){
				$("#modalDeadline .close").click();
				alertify.success("File successfully transferred!");
				loadFiles(e[0]+"►"+e[1]);
				loadAvailableFile(d);
				checkapply();
			}
		});
	}else{
		alert("set deadline time please!");
	}
}

function searchFiles(key){
	if(this.empId!=""){
		$.ajax({
			data:'empId='+(this.empId)[0]+"&key="+key,
			type:'POST',
			url:'php/php_search.php',
			dataType:'JSON',
			success: function(data){
				console.log(data);
				$("table#empFile tbody").html(data["files"]);
				$("#fileNum").html(data["num"]);
				$("#fname").html((this.empId)[1]);
			}
		});
	}
}

/*function getDeadline(){
	$.ajax({
		type:'POST',
		data:'deptId='+this.deptId,
		url:'php/php_getdead.php',
		success: function(data){
			$("#deadline_full").html(data);
		}
	});
}*/