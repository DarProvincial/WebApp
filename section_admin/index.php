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
  include "../included/modal_download.php";
  include "../included/modal_deadline.php";
?>

<title>Divisions</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
  <section id="container" class="">
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>
      <!--logo start-->
      <a href="index.php" class="logo">DAR <span class="lite">ADMIN</span></a>
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
              <span id="user" data-user="<?php echo $_SESSION["emp_id"];?>" class="username"><?php echo $_SESSION["emp_fname"];?></span>
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
          <li class="active">
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
          <li class = ""> 
            <a class="" href="notice.php">
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
            <a class="" href="stats.php">
              <i class="fa fa-bar-chart-o"></i>
              <span>Statistics</span>
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
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-users"></i> <b>DEPARTMENTS</b></h3>
          </div>
        </div>
        <!-- page start-->
        <div class="row">
         <div class="col-lg-8">
          <div class="panel panel-default">
            <div class="panel-body">
              <h5>
              <ul class="nav nav-tabs">
                <li class="active"><a onclick="loadContent('11111','LTI','PBBD','Legal','STOD');" data-toggle="tab" href="#STOD">STOD</a></li>
                <li><a onclick="loadContent('22222','STOD','PBBD','Legal','LTI');" data-toggle="tab" href="#LTI">LTI</a></li>
                <li><a onclick="loadContent('33333','LTI','STOD','Legal','PBBD');" data-toggle="tab" href="#PBBD">PBBD</a></li>
                <li><a onclick="loadContent('44444','LTI','PBBD','STOD','Legal');" data-toggle="tab" href="#Legal">Legal</a></li>
              </ul>
            </h5>
              <div class="tab-content">
                <div id="STOD" class="tab-pane fade in active">
                
                </div>
                <div id="LTI" class="tab-pane fade">

                </div>
                <div id="PBBD" class="tab-pane fade">

                </div>
                <div id="Legal" class="tab-pane fade">

                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="panel panel-default">
            <div class="panel-body" ondrop="drop(event,1)" ondragover="allowDrop(event)">
              <h1> <i class="fa fa-file"></i> <span id="deptName"></span> documents <span class="label label-primary" style="border-radius: 20px;" id="numAvailable">0</span></span></h1>
              <hr class="bigHr">
              <form action="#" enctype="multipart/form-data" method="post">
                <input type="file" name="file_upload" id="file_upload" class="file" multiple>
                <div class="input-group col-xs-12">
                  <span class="input-group-addon"><i class="fa fa-file"></i></span>
                  <input type="text" class="form-control input-md" disabled placeholder="Upload File">
                  <span class="input-group-btn">
                    <button class="browse btn btn-primary input-md" type="button"><i class="fa fa-search"></i> Browse</button>
                  </span>
                </div>
              </form>
              <br>
              <div class="panel panel-default">
                <div class="panel-body" style="height:360px; overflow: auto;">
                  <ul class="list-group" id="fileAvailable">
                  </ul>
                </div>
              </div>
              <button onclick="saveAll()" id="btnSave" class="btn btn-info btn-sm pull-right"><i class="fa fa-save"></i> Save</button>
            </div>
          </div>
        </div>
      </div>
    </section>
  </section>
</section>
</body>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script src="../js/jquery.scrollTo.min.js"></script>
<script src="../js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
<script src="../js/scripts.js"></script>

<script src="js/functions.js"></script>
<script type="text/javascript">
  loadContent('11111','LTI','PBBD','Legal','STOD');
</script>


</body>
</html>