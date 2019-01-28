<?php include('editData.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>SmartBuilding - Data Manager</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-datepicker/css/datepicker.css" />
  <link rel="stylesheet" type="text/css" href="lib/bootstrap-daterangepicker/daterangepicker.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">

  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>Smart<span>Building</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        <ul class="nav top-menu"></ul>
          
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="login.html">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          
          <li class="mt">
            <a href="index.html">
              <i class="fa fa-dashboard"></i>
              <span>Dashboard</span>
              </a>
          </li>
         
          <li class="sub-menu">
            <a class="active" href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Data Manager</span>
              </a>
            <ul class="sub">
              <li class="active"><a href="form_component.php">Edit Data<!--Form Components--></a></li>
              <li><a href="form_component_view.php">View Data</a></li>
              <li><a href="form_component_smartnode.php">SmartNode Data</a></li>
              <li><a href="form_component_cluster.php">Cluster Data</a></li>
             
            </ul>
          </li>
          
          
         
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
    <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> Edit Data</h3>
        
        </div>
        
        <!-- INPUT MESSAGES -->
        <div class="row mt">
          <div class="col-lg-12">
            <div class="form-panel">
              <h4 class="mb"><i class="fa fa-angle-right"></i> Please fill out all the blanks to edit sensor data.</h4>
              <form class="form-horizontal tasi-form" method="post" action = "form_component.php">
                <div class="form-group has-success">
                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Date</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputSuccess" name = "date">
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Building</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputSuccess" name = "building">
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Cluster ID</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputSuccess" name = "cluster">
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">SmartNode ID</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputSuccess" name = "smartnode">
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Sensor ID</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputSuccess" name = "sensor">
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Reading</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputSuccess" name = "reading">
                  </div>
                </div>
                <div class="form-group has-success">
                  <label class="col-sm-2 control-label col-lg-2" for="inputSuccess">Sensor Type</label>
                  <div class="col-lg-10">
                    <input type="text" class="form-control" id="inputSuccess" name = "sensor_type">
                    <br />
                    <span class="help-block"><?php include('errors.php'); ?></span>
                  </div>

                </div>
                <div class="form-group">
                    <div class="col-lg-offset-2 col-lg-10">
                      <button class="btn btn-theme" type="submit" name = "add">Add</button>
                      <button class="btn btn-theme04" type="submit" name= "delete">Delete</button>
                    </div>

                </div>
              </form>
            </div>
            <!-- /form-panel -->
          </div>
          <!-- /col-lg-12 -->
        </div>

        
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script src="lib/jquery-ui-1.9.2.custom.min.js"></script>
  <!--custom switch-->
  <script src="lib/bootstrap-switch.js"></script>
  <!--custom tagsinput-->
  <script src="lib/jquery.tagsinput.js"></script>
  <!--custom checkbox & radio-->
  <script type="text/javascript" src="lib/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/date.js"></script>
  <script type="text/javascript" src="lib/bootstrap-daterangepicker/daterangepicker.js"></script>
  <script type="text/javascript" src="lib/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
  <script src="lib/form-component.js"></script>

</body>

</html>
