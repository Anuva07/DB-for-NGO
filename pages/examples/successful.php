<?php

    $username = 'AKASHPODDAR';
    $password = 'akash';
    $connection_string = 'localhost/XE';
    $connection = oci_connect($username,$password,$connection_string);


    if($connection){
      //echo "Connection succeeded";
    }
    else
    {
      echo "Connection failed";
            $err = oci_error();
      trigger_error(htmlentities($err['message'], ENT_QUOTES), E_USER_ERROR); 
    }

    $loginval=0;
    $stid = oci_parse($connection, 'SELECT LOGIN_INDEX FROM LOGIN_INDEX');
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                        $loginval=$row[0];
                        
                    }
                    oci_free_statement($stid);
    //echo $loginval;
    if($loginval==0){
      header('Location:http://localhost/test/DbProject/pages/examples/login.php');
    }
    
    ?>
    
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Successful Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini">Dashboard</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Dashboard</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php
                  if($loginval==1){
                    echo "Admin";
                  }elseif ($loginval==2) {
                    echo "Editor";
                  }else{
                    echo "Beneficiary";
                  }
                ?></span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  <?php
                  if($loginval==1){
                    echo "Admin";
                  }elseif ($loginval==2) {
                    echo "Editor";
                  }else{
                    echo "Beneficiary";
                  }
                ?>
                  
                </p>
              </li>
              <!-- Menu Body -->
              
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <form action="pages/examples/signoutdata.php" method="post">
                    <button type="submit" class="btn btn-default btn-flat">
                      Sign Out
                    </button>
                  </form>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
         
        </ul>
      </div>
    </nav>
  </header>

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="../../index.html"><i class="fa fa-circle-o"></i> Dashboard v1</a></li>
            <li><a href="../../index2.html"><i class="fa fa-circle-o"></i> Dashboard v2</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Data Input</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#">
                <i class="fa fa-square"></i> <span>Person</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/beneficiary_input.html"><i class="fa fa-circle-o"></i> Beneficiary</a></li>
                <li><a href="pages/forms/employee_input.html"><i class="fa fa-circle-o"></i> Employee</a></li>
                <li><a href="pages/forms/donar_input.html"><i class="fa fa-circle-o"></i> Donar</a></li>
                <li><a href="pages/forms/volunteer_input.html"><i class="fa fa-circle-o"></i> Volunteer</a></li>
                <li><a href="pages/forms/trainer_input.html"><i class="fa fa-circle-o"></i> Trainer</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-square"></i> <span>Project</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/healthproject_input.html"><i class="fa fa-circle-o"></i> Health</a></li>
                <li><a href="pages/forms/microcreditproject_input.html"><i class="fa fa-circle-o"></i> Microcredit</a></li>
                <li><a href="pages/forms/seminarproject_input.html"><i class="fa fa-circle-o"></i> Seminar</a></li>
                <li><a href="pages/forms/trainingproject_input.html"><i class="fa fa-circle-o"></i> Training</a></li>
              </ul>
            </li>            
            <li><a href="pages/forms/publication_input.html"><i class="fa fa-circle-o"></i> Publication</a>
            </li>
            <li><a href="pages/forms/salary_input.php"><i class="fa fa-circle-o"></i> Salary</a>
            </li>
            <li><a href="pages/forms/refrel_input.php"><i class="fa fa-circle-o"></i> Reference</a>
            </li>
            <li><a href="pages/forms/education_input.php"><i class="fa fa-circle-o"></i> Education</a>
            </li>
            <li><a href="pages/forms/training_input.php"><i class="fa fa-circle-o"></i> Training</a>
            </li>
            <li><a href="pages/forms/branch_input.html"><i class="fa fa-circle-o"></i> Branch</a>
            </li>
            <li><a href="pages/forms/asset_input.html"><i class="fa fa-circle-o"></i> Asset</a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-square"></i> <span>Assignment</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/personproject_input.php"><i class="fa fa-circle-o"></i> Person-Project</a></li>
                <li><a href="pages/forms/personpublication_input.php"><i class="fa fa-circle-o"></i> Person-Publication</a></li>
                <li><a href="pages/forms/branchproject_input.php"><i class="fa fa-circle-o"></i> Branch Project</a></li>
                <li><a href="pages/forms/branchasset_input.php"><i class="fa fa-circle-o"></i> Branch Asset</a></li>
                <li><a href="pages/forms/projectasset_input.php"><i class="fa fa-circle-o"></i> Project Asset</a></li>
                <li><a href="pages/forms/branchpublication_input.php"><i class="fa fa-circle-o"></i> Branch Publication</a></li>
                <li><a href="pages/forms/branchexpanse_input.php"><i class="fa fa-circle-o"></i> Branch Expanse</a></li>
                <li><a href="pages/forms/projectexpanse_input.php"><i class="fa fa-circle-o"></i> Project Expanse</a></li>
                <li><a href="pages/forms/benefcurjob_input.php"><i class="fa fa-circle-o"></i> Beneficiary Current Job</a></li>
              </ul>
            </li> 
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Data Update</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#">
                <i class="fa fa-square"></i> <span>Person</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/tables/beneficiarydata.php"><i class="fa fa-circle-o"></i> Beneficiary</a></li>
                <li><a href="pages/tables/employeedata.php"><i class="fa fa-circle-o"></i> Employee</a></li>
                <li><a href="pages/tables/donardata.php"><i class="fa fa-circle-o"></i> Donar</a></li>
                <li><a href="pages/tables/volunteerdata.php"><i class="fa fa-circle-o"></i> Volunteer</a></li>
                <li><a href="pages/tables/trainerdata.php"><i class="fa fa-circle-o"></i> Trainer</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-square"></i> <span>Project</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/tables/healthprojectdata.php"><i class="fa fa-circle-o"></i> Health</a></li>
                <li><a href="pages/tables/wmicrocreditdata.php"><i class="fa fa-circle-o"></i> Microcredit</a></li>
                <li><a href="pages/tables/seminardata.php"><i class="fa fa-circle-o"></i> Seminar</a></li>
                <li><a href="pages/tables/trainingprojectdata.php"><i class="fa fa-circle-o"></i> Training</a></li>
              </ul>
            </li>            
            <li><a href="pages/tables/publicationdata.php"><i class="fa fa-circle-o"></i> Publication</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Data View</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#">
                <i class="fa fa-square"></i> <span>Person</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/tables/beneficiarydata.php"><i class="fa fa-circle-o"></i> Beneficiary</a></li>
                <li><a href="pages/tables/employeedata.php"><i class="fa fa-circle-o"></i> Employee</a></li>
                <li><a href="pages/tables/donardata.php"><i class="fa fa-circle-o"></i> Donar</a></li>
                <li><a href="pages/tables/volunteerdata.php"><i class="fa fa-circle-o"></i> Volunteer</a></li>
                <li><a href="pages/tables/trainerdata.php"><i class="fa fa-circle-o"></i> Trainer</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-square"></i> <span>Project</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/tables/healthprojectdata.php"><i class="fa fa-circle-o"></i> Health</a></li>
                <li><a href="pages/tables/wmicrocreditdata.php"><i class="fa fa-circle-o"></i> Microcredit</a></li>
                <li><a href="pages/tables/seminardata.php"><i class="fa fa-circle-o"></i> Seminar</a></li>
                <li><a href="pages/tables/trainingprojectdata.php"><i class="fa fa-circle-o"></i> Training</a></li>
              </ul>
            </li>            
            <li><a href="pages/tables/publicationdata.php"><i class="fa fa-circle-o"></i> Publication</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-trash-o"></i> <span>Data Delete</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#">
                <i class="fa fa-square"></i> <span>Person</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/beneficiary_delete.php"><i class="fa fa-circle-o"></i> Beneficiary</a></li>
                <li><a href="pages/forms/employee_delete.php"><i class="fa fa-circle-o"></i> Employee</a></li>
                <li><a href="pages/forms/donar_delete.php"><i class="fa fa-circle-o"></i> Donar</a></li>
                <li><a href="pages/forms/volunteer_delete.php"><i class="fa fa-circle-o"></i> Volunteer</a></li>
                <li><a href="pages/forms/trainer_delete.php"><i class="fa fa-circle-o"></i> Trainer</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-square"></i> <span>Project</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/healthp_delete.php"><i class="fa fa-circle-o"></i> Health</a></li>
                <li><a href="pages/forms/microcredit_delete.php"><i class="fa fa-circle-o"></i> Microcredit</a></li>
                <li><a href="pages/forms/seminar_delete.php"><i class="fa fa-circle-o"></i> Seminar</a></li>
                <li><a href="pages/forms/trainingproj_delete.php"><i class="fa fa-circle-o"></i> Training</a></li>
              </ul>
            </li>            
            <li><a href="pages/forms/publication_delete.php"><i class="fa fa-circle-o"></i> Publication</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-print"></i> <span>Print/PDF</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="treeview">
              <a href="#">
                <i class="fa fa-square"></i> <span>Person</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/examples/beneficiaryprintoption.php"><i class="fa fa-circle-o"></i> Beneficiary</a></li>
                <li><a href="pages/examples/employeeprintoption.php"><i class="fa fa-circle-o"></i> Employee</a></li>
                <li><a href="pages/examples/donarprintoption.php"><i class="fa fa-circle-o"></i> Donar</a></li>
                <li><a href="pages/examples/volunteerprintoption.php"><i class="fa fa-circle-o"></i> Volunteer</a></li>
                <li><a href="pages/examples/trainerprintoption.php"><i class="fa fa-circle-o"></i> Trainer</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-square"></i> <span>Project</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/forms/healthp_delete.php"><i class="fa fa-circle-o"></i> Health</a></li>
                <li><a href="pages/forms/microcredit_delete.php"><i class="fa fa-circle-o"></i> Microcredit</a></li>
                <li><a href="pages/forms/seminar_delete.php"><i class="fa fa-circle-o"></i> Seminar</a></li>
                <li><a href="pages/forms/trainingproj_delete.php"><i class="fa fa-circle-o"></i> Training</a></li>
              </ul>
            </li>            
            <li><a href="pages/forms/publication_delete.php"><i class="fa fa-circle-o"></i> Publication</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Successful page
        
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box-body">
             <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-check"></i> Alert!</h4>
                Data Insertion Successful.
              </div>
              
      </div>
      <div class="box-body">
        <form role="form" action="http://localhost/test/DbProject/index.php">
          <button type="submit" class="btn btn-block btn-primary btn-lg"><i class="icon fa fa-home" style="width: 70px;" ></i>Go back to Dashboard</button>
        </form>
      </div>

      
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer">
    
    <strong>Copyright &copy; 2018 </strong> All rights
    reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Create the tabs -->
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
      <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="fa fa-home"></i></a></li>

      <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content">
      <!-- Home tab content -->
      <div class="tab-pane" id="control-sidebar-home-tab">
        <h3 class="control-sidebar-heading">Recent Activity</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-birthday-cake bg-red"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Langdon's Birthday</h4>

                <p>Will be 23 on April 24th</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-user bg-yellow"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Frodo Updated His Profile</h4>

                <p>New phone +1(800)555-1234</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-envelope-o bg-light-blue"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Nora Joined Mailing List</h4>

                <p>nora@example.com</p>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <i class="menu-icon fa fa-file-code-o bg-green"></i>

              <div class="menu-info">
                <h4 class="control-sidebar-subheading">Cron Job 254 Executed</h4>

                <p>Execution time 5 seconds</p>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

        <h3 class="control-sidebar-heading">Tasks Progress</h3>
        <ul class="control-sidebar-menu">
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Custom Template Design
                <span class="label label-danger pull-right">70%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-danger" style="width: 70%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Update Resume
                <span class="label label-success pull-right">95%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-success" style="width: 95%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Laravel Integration
                <span class="label label-warning pull-right">50%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-warning" style="width: 50%"></div>
              </div>
            </a>
          </li>
          <li>
            <a href="javascript:void(0)">
              <h4 class="control-sidebar-subheading">
                Back End Framework
                <span class="label label-primary pull-right">68%</span>
              </h4>

              <div class="progress progress-xxs">
                <div class="progress-bar progress-bar-primary" style="width: 68%"></div>
              </div>
            </a>
          </li>
        </ul>
        <!-- /.control-sidebar-menu -->

      </div>
      <!-- /.tab-pane -->
      <!-- Stats tab content -->
      <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
      <!-- /.tab-pane -->
      <!-- Settings tab content -->
      <div class="tab-pane" id="control-sidebar-settings-tab">
        <form method="post">
          <h3 class="control-sidebar-heading">General Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Report panel usage
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Some information about this general settings option
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Allow mail redirect
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Other sets of options are available
            </p>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Expose author name in posts
              <input type="checkbox" class="pull-right" checked>
            </label>

            <p>
              Allow the user to show his name in blog posts
            </p>
          </div>
          <!-- /.form-group -->

          <h3 class="control-sidebar-heading">Chat Settings</h3>

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Show me as online
              <input type="checkbox" class="pull-right" checked>
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Turn off notifications
              <input type="checkbox" class="pull-right">
            </label>
          </div>
          <!-- /.form-group -->

          <div class="form-group">
            <label class="control-sidebar-subheading">
              Delete chat history
              <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
            </label>
          </div>
          <!-- /.form-group -->
        </form>
      </div>
      <!-- /.tab-pane -->
    </div>
  </aside>
  <!-- /.control-sidebar -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<script>
  $(document).ready(function () {
    $('.sidebar-menu').tree()
  })
</script>
</body>
</html>
