<?php include('smData.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
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
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  <link href="css/table-responsive.css" rel="stylesheet">

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
        <!--  notification end -->
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
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Data Manager</span>
              </a>
            <ul class="sub">
              <li><a href="form_component.php">Edit Data</a></li>
              <li><a href="form_component_view.php">View Data</a></li>
              <li class="active"><a href="form_component_smartnode.php">SmartNode Data</a></li>
              <li><a href="form_component_cluster.php">Cluster Data</a></li>
            </ul>
          </li>
          
          
          <!--<li class="sub-menu">
            <a href="javascript:;">
              <i class=" fa fa-bar-chart-o"></i>
              <span>Charts</span>
              </a>
            <ul class="sub">
              <li><a href="morris.html">Morris</a></li>
              <li><a href="chartjs.html">Chartjs</a></li>
              <li><a href="flot_chart.html">Flot Charts</a></li>
              <li><a href="xchart.html">xChart</a></li>
            </ul>
          </li>-->
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
        <h3><i class="fa fa-angle-right"></i><a href="form_component_smartnode.php" style="color:inherit"> Back to SmartNode Data</a></h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <h4><i class="fa fa-angle-right"></i> SmarNode Reading</h4>
              <section id="unseen">
                <table class="table table-bordered table-striped table-condensed">
                  <thead>
                    <tr>
                      <th class="numeric">Date</th>
                      <th class="numeric">Cluster ID</th>
                      <th class="numeric">SmartNode ID</th>
                      <th class="numeric">Sensor ID</th>
                      <th class="numeric">Reading</th>
                      <th>Sensor Type</th>
                    </tr>
                  </thead>
                  <tbody>
                      
                      <?php
                       
                       
                        foreach ($array_smartnode as &$value) {
//{"date":"2018-12-01 10:48:30","cluster":"1","smartnode":"1","sensor":"111","sensor_reading":"27","sensor_type":"AC","id":"7"}
                          if($value != ""){
    
                            echo "
                            <tr><td class='numeric'>$value[date]</td>
                            <td class='numeric'>$value[cluster]</td>
                            <td class='numeric'>$value[smartnode]</td>
                            <td class='numeric'>$value[sensor]</td>
                            <td class='numeric'>$value[sensor_reading]</td>
                            <td class='numeric'>$value[sensor_type]</td></tr>";

                          }
                        }
                      ?>
                    
                    
                  </tbody>
                </table>
                <?php include('errors.php'); ?>
              </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-4 -->
        </div>
        <!-- /row -->
        
        <!-- /row -->
      </section>
      <!-- /wrapper -->
        <div class="col-lg-6">
              <div class="content-panel">
                <h4><i class="fa fa-angle-right"></i>SmartNode Data Chart</h4>
                <div class="panel-body text-center">
                  <canvas id="line" height="300" width="400"></canvas>
                  <Script type="text/javascript">
                    let myLineChart = document.getElementById('line').getContext('2d');
                    let LineChart = new Chart(myLineChart, {
                        type: 'line',
                        data: {
                        labels : <?=json_encode($timestamp[0]);?>,
                        datasets : [
                              {
                                  fillColor : "rgba(220,220,220,0.5)",
                                  strokeColor : "rgba(220,220,220,1)",
                                  pointColor : "rgba(220,220,220,1)",
                                  pointStrokeColor : "#fff",
                                  data : <?=json_encode($temperature[0]); ?>,
                                  label: "AC Sensor",
                                  borderColor: "#3e95cd"
                              },

                          ]
                      },
                      options: {
                          title: {
                            display: true,
                            text: 'Daily AC Temperature Line Chart'
                          }
                          
                        }

                    });

                  </Script>
                </div>
              </div>
            </div>
    </section>
    <!-- /MAIN CONTENT -->
    <!--main content end-->
    <!--footer start-->
    
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
</body>

</html>
