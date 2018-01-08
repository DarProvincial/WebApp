$(document).ready(function(){
	$('form').on('submit', function(event) {
        var id = $("#emp_id").val();
        var pass = $("#password").val();
        var role = $('#chkRole').is(':checked'); 
        if(role){
            role = "Admin";
        }else{
            role = "Member";
        }
        //alert(id+" / "+pass+" / "+role);
        
        $.ajax({
            type:'POST',
            data:'emp_id='+id+'&password='+pass+'&role='+role,
            url:'php/php_login.php',
            success: function(data){
                if(data=="1"){
                    document.location = 'section_'+role+'/index.php';
                }else{
                    alert(data);
                }
            }
        });
    });
});