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

<title>Add Member</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
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
          <li class = ""> 
            <a class="" href="notice.php">
              <i class="fa fa-bullhorn"></i>
              <span>Notice</span>
            </a>
          </li>
          <li class = "active"> 
            <a class="" href="register.php">
              <i class="fa fa-plus"></i>
              <span>Add Member</span>
            </a>
          </li>              
          <li class = "">
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

        </div>
        <!-- page start-->
        <div class="container">
          <div class="row">
            <div class="col-lg-6">
              <div class="panel panel-primary">
                <div class="panel-body">
                  <form method="POST" action="#" role="form">
                    <div class="form-group">
                      <h3 class="page-header"><i class="fa fa fa-user-plus"></i> <b>Add New Member</b></h3>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="empid">Employee ID</label>
                      <input id="empid" type="number" maxlength="50" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="fname">First name</label>
                      <input id="fname" type="text" maxlength="50" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="mname">Middle name</label>
                      <input id="mname" type="text" maxlength="50" class="form-control">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="lname">Last name</label>
                      <input id="lname" type="text" maxlength="50" class="form-control">
                    </div>
                    <div class="form-inline">
                      <label class="control-label" for="gender">Gender</label>
                      <div class="controls">
                        <label class="radio inline" for="gender-0">
                          <input name="gender" id="gender-0" value="Male" checked="checked" type="radio">
                          Male
                        </label>
                        <label class="radio inline" for="gender-1">
                          <input name="gender" id="gender-1" value="Female" type="radio">
                          Female
                        </label>
                      </div>
                    </div>
                    <br>
                    <div class="form-group">
                      <label class="control-label" for="Address">Address</label>
                      <div class="controls">                     
                        <textarea id="address" name="Address" placeholder="Address"></textarea>
                      </div>
                    </div>
                    <br>
                    <select name = "division" id = "division" class="form-control">
                          <option value="0" selected disabled>- - - Select Division - - -</option>
                          <option value="1">STOD</option>
                          <option value="2">LTI</option>
                          <option value="3">PBBD</option>
                          <option value="4">Legal</option>
                    </select>
                    <br>
                    <div class="form-group">
                      <label class="control-label" for="designation">Designation</label>
                      <input id="designation" type="text" maxlength="50" class="form-control">
                    </div>

                    <button id="signupSubmit" type="button" class="btn btn-primary pull-right">Add</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- page end -->
    </section>
  </section>
</section>

<script src="../js/jquery.js"></script>
<script src="../js/bootstrap.min.js"></script>

<script src="../js/jquery.scrollTo.min.js"></script>
<script src="../js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
<script src="../js/scripts.js"></script>

<script src="js/functions.js"></script>
<script type="text/javascript">
  //loadContent('11111','LTI','PBBD','Legal','STOD');
</script>


</body>
</html>