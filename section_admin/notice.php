<?php
session_start();
if(!isset($_SESSION["emp_id"])){
  echo "<script>
  document.location = '../index.php';
  </script>";
}
?>
<?php
include "../included/assets.php";
include "../included/modal_chat.php";
?>

<title>Notice</title>
<head>
  <link rel="stylesheet" type="text/css" href="../css/bootstrap-datetimepicker.min.css">
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo">DAR <span class="lite">Admin</span></a>
      <!--logo end-->

      <div class="nav search-row" id="top_menu">
        <!--  search form start -->
        <ul class="nav top-menu">                    
          <li>
            <form class="navbar-form">
              <input class="form-control" placeholder="Search" type="text">
            </form>
          </li>                    
        </ul>
        <!--  search form end -->                
      </div>

      <div class="top-nav notification-row">                
        <!-- notificatoin dropdown start-->
        <ul class="nav pull-right top-menu">
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <span class="profile-ava">
                <img alt="" src="../img/avatar1_small.png">
              </span>
              <span class="username"><?php echo ($_SESSION["emp_fname"]); ?></span>
              <b class="caret"></b>
            </a>
            <ul class="dropdown-menu extended logout">
              <div class="log-arrow-up"></div>
              <li class="eborder-top">
                <a href="#"><i class="icon_profile"></i> My Profile</a>
              </li>
              <li>
                <a href="#"><i class="icon_mail_alt"></i> My Inbox</a>
              </li>
              <li>
                <a href="#"><i class="icon_clock_alt"></i> Timeline</a>
              </li>
              <li>
                <a href="#"><i class="icon_chat_alt"></i> Chats</a>
              </li>
              <li>
                <a href="../php/php_logout.php"><i class="icon_key_alt"></i> Log Out</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </header>      
    <!--header end-->

    <!--sidebar start-->
    <aside>
      <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">                
          <li class="">
            <a class="" href="#">
              <i class="icon_house_alt"></i>
              <span>Home</span>
            </a>
          </li>
          <li>
            <a class="" href="index.php">
              <i class="fa fa-users"></i>
              <span>Divisions</span>
            </a>
          </li>
          <li>
            <a class="" href="#">
              <i class="fa fa-calendar"></i>
              <span>Memos</span>
            </a>
          </li>
          <li class = "active"> 
            <a class="" href="#">
              <i class="fa fa-bullhorn"></i>
              <span>Notice</span>
            </a>
          </li>
          <li class = ""> 
            <a class="" href="register.php">
              <i class="fa fa-plus"></i>
              <span>Add Member</span>
            </a>
          </li>
          <li>
            <a class="" href="#">
              <i class="fa fa-info"></i>
              <span>About</span>
            </a>
          </li>
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->

    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-6">

          </div>
        </div>
        <!-- page start-->
        <div class="panel panel-default">
          <div class="panel-body">
            <div class="container">
              <div class="col-lg-6">
                <div class="notice-container">
                  <div id = "notice-content" class="col-sm-12"> 
                  </div>  
                </div> <!--notice end-->
              </div>
              <div class="col-lg-6"> <!--input-->
                <div class="container">
                  <div class="col-lg-12">
                    <div class="form-area">  
                      
                        <h3 style="margin-bottom: 25px; text-align: center;">Add Notice</h3>
                        <div class="form-group">
                          <input type="text" class="form-control" id="notice-title" name="notice-title" placeholder="Title" required>
                        </div>
                        <div class="form-group">
                          <textarea class="form-control" type="textarea" id="message-notice" placeholder="What" maxlength="140" rows="7"></textarea>
                          <span class="help-block"><p id="characterLeft" class="help-block ">You have reached the limit</p></span>                    
                        </div>
                        
                        <div class="form-group">
                          <div class='input-group date' id='datetimepicker'>
                            <input type='text' id="sc-date" class="form-control" placeholder="When" disabled/>
                            <span class="input-group-addon">
                              <span class="fa fa-calendar"></span>
                            </span>
                          </div>
                        </div>


                        
                        <div class="form-group">
                          <input type="text" class="form-control" id="place" name="place" placeholder="Where" required>
                        </div>
                        
                        <select name = "notice_type" id = "ntype" class="form-control"> 
                          <option value="0" selected disabled>- - - Select Type of Notice - - -</option>
                          <option value="1">Informational</option>
                          <option value="2">Important</option>
                          <option value="3">Natural</option>
                          <option value="4">Urgent</option>
                        </select>
                        <br>

                        <button type="button" id = "submit" class="btn btn-primary pull-right">Add</button>

                        
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>  
        <!-- page end-->
      </section>
    </section>
    <!--main content end-->
  </section>
  <!-- container section end -->
  <!-- javascripts -->
  <script src="../js/jquery.js"></script>
  <script src="../js/bootstrap.min.js"></script>
  <script src="../js/bootstrap-datetimepicker.min.js"></script>
  <!-- nice scroll -->
  <script src="../js/jquery.scrollTo.min.js"></script>
  <script src="../js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
  <script src="../js/scripts.js"></script>

  <script src="js/input.js"></script>
  <script src="js/functions.js"></script>
  <script type="text/javascript">
    loadContent('11111','LTI','PBBD','Legal','STOD');
  </script>
  <script type="text/javascript">
    $(function () {

      $('#datetimepicker').datetimepicker({format: 'MM dd,yyyy @ HH:iip'});

    });
  </script>
</body>
</html>