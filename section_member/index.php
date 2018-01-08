<?php
session_start();
if(!isset($_SESSION["emp_id"])){
  echo "<script>
  document.location = '../index.php';
  </script>";
}
?>
<?php
include "../included/modal_message.php";
include "../included/modal_downloadMember.php";
include "../included/assets.php";
?>

<title>Home</title>

<head>
  <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body onload="loadContent()">
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
      </div>

      <div class="top-nav notification-row">                
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
                <a href="inbox.php">See all messages</a>
              </li>
            </ul>
          </li>
          <li class="dropdown">
            <a data-toggle="dropdown" class="dropdown-toggle" href="#">
              <span class="profile-ava">
                <img alt="" src="../img/avatar1_small.png">
              </span>
              <span class="username-test" id="empId" data-dept="<?php echo $_SESSION["deptId"]; ?>" style="display:none;"><?php echo $_SESSION["emp_id"]; ?></span>
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
    <aside>
      <div id="sidebar"  class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu">                
          <li class="active">
            <a class="" href="index.php">
              <i class="icon_house_alt"></i>
              <span>Home</span>
            </a>
          </li>       
          <li>
            <a class="" href="inbox.php">
              <i class="fa fa-inbox"></i>
              <span>Inbox</span>
            </a>
          </li>
          <li class="">
            <a class="" href="history.php">
              <i class="fa fa-history"></i>
              <span>History</span>&nbsp;&nbsp;
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
            <h2><i class="fa fa-1x fa-home" aria-hidden="true"></i> HOME</h2>
          </div>
        </div>
        <!-- page start-->
        <br>
        <div class="row">
          <div class="col-lg-7">
            <div class="panel panel-default">
              <div class="panel-heading"></div>
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-6">
                    <h4 style="color:black;">Today</h4>
                    <div class="panel panel-info">
                      <div class="panel-heading"><h3 id="date" class="date"></h3></div>
                      <div class="panel-body"><h3 id="time" class="time"></h3></div>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <h4 style="color:black;">Deadline</h4>
                    <div class="panel panel-danger">
                      <div class="panel-heading"><h3 id="deadline_date" class="date"></h3></div>
                      <div class="panel-body"><h3 id="deadline_full" ></h3></div>
                    </div>
                  </div>
                </div>

                <div class="panel panel-success">
                  <div class="panel-heading"></div>
                  <div class="panel-body" style="height:280px; overflow: auto;">
                    <table class="table table-bordered" id="empFile">
                      <thead>
                        <tr>
                          <th><center>Files</center></th>
                          <th><center>Actions</center></th>
                          <th><center>Status</center></th>
                        </tr>
                      </thead>
                      <tbody>

                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-5">
            <div class="panel panel-default">
              <div class="panel-heading"><i class="fa fa-info"></i> Employee Info</div>
              <div class="panel-body" style="height:565px; overflow: auto;">
                
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-lg-6"
          <!-- Nav tabs --><div class="card">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#agenda" aria-controls="home" role="tab" data-toggle="tab">Agenda</a></li>
              <li role="presentation"><a href="#chat" aria-controls="profile" role="tab" data-toggle="tab">Chat</a></li>
              <li role="presentation"><a href="#notice" aria-controls="profile" role="tab" data-toggle="tab">Notice</a></li>
            </ul>

            <!-- Tab panes -->
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="agenda">
                <!--agenda content-->
                <div class="agenda">
                  <div class="panel panel-default">
                    <div class="panel-body" style="height:400px; overflow: auto;">
                      <div class="table-responsive">
                        <table class="table table-condensed table-bordered">
                          <thead>
                            <tr>
                              <th>Date</th>
                              <th>Time</th>
                              <th>Event</th>
                            </tr>
                          </thead>
                          <tbody>
                            
                          </tbody>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- chatbox -->
              <div role="tabpanel" class="tab-pane" id="chat">
                <div class = "chatbox-wrap">
                  <?php 
                  $colours = array('007AFF','FF7000','FF7000','15E25F','CFC700','CFC700','CF1100','CF00BE','F00');
                  $user_colour = array_rand($colours);
                  ?>

                  <script src="../js/jquery-3.2.1.js"></script>
                  <script language="javascript" type="text/javascript">  
                    $(document).ready(function(){
                                  //create a new WebSocket object.
                                  var wsUri = "ws://192.168.1.3:9000/DAR_PROVINCIAL/section_Member/server.php";   
                                  websocket = new WebSocket(wsUri); 
                                  
                                  websocket.onopen = function(ev) { // connection is open 
                                    $('#message_box').append("<div class=\"system_msg\">Connected!</div>"); //notify user
                                  }

                                  $('#send-btn').click(function(){ //use clicks message send button 
                                    var mymessage = $('#message').val(); //get message text
                                    var myname = "<?php echo $_SESSION["emp_fname"]; ?>"; //get user name
                                    
                                    //if(myname == ""){ //empty name?
                                      //alert("Enter your Name please!");
                                      //return;
                                    //}
                                    if(mymessage == ""){ //emtpy message?
                                      alert("Enter Some message Please!");
                                      return;
                                    }
                                    //document.getElementById("name").style.visibility = "hidden";
                                    
                                    var objDiv = document.getElementById("message_box");
                                    objDiv.scrollTop = objDiv.scrollHeight;
                                    //prepare json data
                                    var msg = {
                                      message: mymessage,
                                      name: myname,
                                      color : '<?php echo $colours[$user_colour]; ?>'
                                    };
                                    //convert and send data to server
                                    websocket.send(JSON.stringify(msg));
                                    $('#message').val(''); //reset text
                                  });
                                  
                                  //#### Message received from server?
                                  websocket.onmessage = function(ev) {
                                    var msg = JSON.parse(ev.data); //PHP sends Json data
                                    var type = msg.type; //message type
                                    var umsg = msg.message; //message text
                                    var uname = msg.name; //user name
                                    var ucolor = msg.color; //color

                                    if(type == 'usermsg') 
                                    {
                                      $('#message_box').append("<div><span class=\"user_name\" style=\"color:#"+ucolor+"\">"+uname+"</span> : <span class=\"user_message\">"+umsg+"</span></div>");
                                    }
                                    if(type == 'system')
                                    {
                                      $('#message_box').append("<div class=\"system_msg\">"+umsg+"</div>");
                                    }
                                    
                                    //$('#message').val(''); //reset text
                                    
                                    var objDiv = document.getElementById("message_box");
                                    objDiv.scrollTop = objDiv.scrollHeight;
                                  };
                                  
                                  websocket.onerror = function(ev){$('#message_box').append("<div class=\"system_error\">Error Occurred - "+ev.data+"</div>");}; 
                                  websocket.onclose   = function(ev){$('#message_box').append("<div class=\"system_msg\">Connection Closed</div>");}; 
                                });

                              </script>
                              <div class="chat_wrapper">
                                <div class="message_box" id="message_box"></div>
                                <div class="panel">
                                  <!--  <input type="text" name="name" id="name" placeholder="Your Name" maxlength="15" /> -->

                                  <input type="text" name="message" id="message" placeholder="Message" maxlength="80" 
                                  onkeydown = "if (event.keyCode == 13)document.getElementById('send-btn').click()"  />
                                </div>

                                <button id="send-btn" class="button">Send</button>

                              </div>
                              <?php 
                              $colours = array('007AFF','FF7000','FF7000','15E25F','CFC700','CFC700','CF1100','CF00BE','F00');
                              $user_colour = array_rand($colours);
                              ?>
                            </div>
                          </div>

                          <div role="tabpanel" class="tab-pane" id="notice">
                            <div class="notice-container">
                              <div id="notice-content" class="col-sm-12"> 
                                
                              </div>
                            </div> 
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-lg-12">
                      <section class="panel">
                        <div id="c-slide" class="carousel slide auto panel-body">
                          <ol class="carousel-indicators out">
                            <li class="active" data-slide-to="0" data-target="#c-slide"></li>
                            <li class="" data-slide-to="1" data-target="#c-slide"></li>
                            <li class="" data-slide-to="2" data-target="#c-slide"></li>
                          </ol>
                          <div class="carousel-inner">
                            <div class="item text-center active">
                              <h3>Creative is new model of Admin</h3>
                              <small class="">Based on Bootstrap 3</small>
                            </div>
                            <div class="item text-center">
                              <h3>Massive UI Elements</h3>
                              <small class="">Fully Responsive</small>
                            </div>
                            <div class="item text-center">
                              <h3>Well Documentation</h3>
                              <small class="">Easy to Use</small>
                            </div>
                          </div>
                          <a data-slide="prev" href="#c-slide" class="left carousel-control">
                            <i class="arrow_carrot-left_alt2"></i>
                          </a>
                          <a data-slide="next" href="#c-slide" class="right carousel-control">
                            <i class="arrow_carrot-right_alt2"></i>
                          </a>
                        </div>
                      </section>
                    </div>
                  </div>

                </section>
              </section>
            </section>

            <script src="../js/date.js"></script>
            <script src="../js/jquery.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <!-- nice scroll -->
            <script src="../js/jquery.scrollTo.min.js"></script>
            <script src="../js/jquery.nicescroll.js" type="text/javascript"></script><!--custome script for all page-->
            <script src="../js/scripts.js"></script>
            <script src="js/functions.js"></script>

          </body>
          </html>