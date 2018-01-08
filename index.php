<?php
  session_start();
  
  if(isset($_SESSION["emp_id"]) && $_SESSION["role"]=="Admin"){
    echo "<script type='text/javascript'> document.location='section_admin/index.php';</script>";
  }
  if(isset($_SESSION["emp_id"]) && $_SESSION["role"]=="Member"){
    echo "<script type='text/javascript'> document.location='section_member/index.php';</script>";
  }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />
    <script src="js/jquery.js"></script>
    <script src="js/functions.js"></script>
</head>
  <body class="login-img3-body">
    <div class="container">
      <form class="login-form">        
        <div class="login-wrap">
            <p class="login-img"><i class="icon_lock_alt"></i></p>
            <div class="input-group">
              <span class="input-group-addon"><i class="icon_profile"></i></span>
              <input id="emp_id" type="text" class="form-control" placeholder="Employee ID" required="required" autofocus>
            </div>
            <div class="input-group">
                <span class="input-group-addon"><i class="icon_key_alt"></i></span>
                <input id="password" type="password" class="form-control" placeholder="Password" required="required">
            </div>
            <label class="checkbox">
                <input type="checkbox" value="Admin" id="chkRole"> <span style="color:black;">Login as Admin</span>
                <span class="pull-right"> <a href="#"> Forgot Password?</a></span>
            </label>
            <button class="btn btn-primary btn-lg btn-block" type="submit">Login</button>
            
        </div>
      </form>
    <div class="text-right">
            <div class="credits">
                <!-- 
                    All the links in the footer should remain intact. 
                    You can delete the links only if you purchased the pro version.
                    Licensing information: https://bootstrapmade.com/license/
                    Purchase the pro version form: https://bootstrapmade.com/buy/?theme=NiceAdmin
                -->
            </div>
        </div>
    </div>


  </body>
</html>
