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
include "../included/modal_message.php";
?>
<link rel="stylesheet" type="text/css" href="css/style.css">
<title>Inbox</title>
</head>
<body onload="loadMessage();">
  <!-- container section start -->
  <section id="container" class="">
    <!--header start-->
    <header class="header dark-bg">
      <div class="toggle-nav">
        <div class="icon-reorder tooltips" data-original-title="Toggle Navigation" data-placement="bottom"><i class="icon_menu"></i></div>
      </div>

      <!--logo start-->
      <a href="index.php" class="logo">DAR <span class="lite">Member</span></a>
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
          <li id="alert_notificatoin_bar" class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">

              <i class="fa fa-envelope"></i>
              <span class="badge bg-important newMessage">0</span>
            </a>
            <ul class="dropdown-menu extended notification">
              <div class="notify-arrow notify-arrow-blue"></div>
              <li>
                <p class="blue">You have <span class="newMessage">0</span> new messages</p>
              </li>
              <div id="newM">

              </div>                            
              <li>
                <a href="#">See all notifications</a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <span class="profile-ava">
                <img alt="" src="../img/avatar1_small.png">
              </span>
              <span class="username-test" id="empId" style="display:none;"><?php echo $_SESSION["emp_id"]; ?></span>
              <span class="username" id="empFname"><?php echo $_SESSION["emp_fname"]; ?></span>
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
            <a class="" href="index.php">
              <i class="icon_house_alt"></i>
              <span>Home</span>
            </a>
          </li>       
          <li class="active">
            <a class="" href="inbox.php">
              <i class="fa fa-inbox"></i>
              <span>Messages</span>&nbsp;&nbsp;
            </a>
          </li>
          <li class="">
            <a class="" href=history.php>
              <i class="fa fa-history"></i>
              <span>History</span>&nbsp;&nbsp;
            </a>
          </li>
        </ul>
      </div>
    </aside>
    <section id="main-content">
      <section class="wrapper">
        <div class="row">
          <div class="col-lg-12">
            <h3 class="page-header"><i class="fa fa fa-inbox"></i> MESSAGES</h3>

          </div>
        </div>
        <!-- page start-->
        <div class="row">
          <div class="col-md-8">
            <div class="panel panel-default">
              <div class="panel-body">
                <ul class="nav nav-tabs">
                  <li class="active"><a data-toggle="tab" href="#home">Inbox&nbsp;&nbsp;<span id="inb" class="label label-success" style="border-radius: 20px;">0</span></a></li>
                  <li><a data-toggle="tab" href="#menu1">Sent items&nbsp;&nbsp;<span id="sent" class="label label-success" style="border-radius: 20px;">0</span></a></li>
                </ul>

                <div class="tab-content">
                  <div id="home" class="tab-pane fade in active">
                    <br>
                    <div class="panel panel-default">
                      <div id="messageContent" class="panel-body" style="height:400px; overflow:auto;">
                        
                      </div>
                    </div>
                    <button class="btn btn-primary pull-right">Clear all</button>
                  </div>
                  <div id="menu1" class="tab-pane fade">
                    <br>
                    <div class="panel panel-default">
                      <div class="panel-body" style="height:400px;">
                        
                      </div>
                    </div>
                    <button class="btn btn-primary pull-right">Clear all</button>
                  </div>
                </div>
              </div> 
            </div>
          </div>
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-body">
                
              </div>
            </div>
          </div>  
        </div>
    </section>
  </section>
</section>
<script src="../js/date.js"></script>
<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/jquery.scrollTo.min.js"></script>
<script src="../js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
<script src="../js/scripts.js"></script>
<script src="js/functions.js"></script>

</body>
</html>