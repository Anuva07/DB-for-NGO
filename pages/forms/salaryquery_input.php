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
  <title>Salary Query</title>
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
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Dashboard</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Dashboard</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
                    <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
              <span class="hidden-xs">
                <?php
                  if($loginval==1){
                    echo "Admin";
                  }elseif ($loginval==2) {
                    echo "Editor";
                  }else{
                    echo "Beneficiary";
                  }
                ?>
              </span>
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
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <form action="../examples/signoutdata.php" method="post">
                    <button type="submit" class="btn btn-default btn-flat">
                      Sign Out
                    </button>
                  </form>
                </div>
              </li>
            </ul>
          </li>
          
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- u can put here something as side bar here-->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
          
        </li>
        
        <li class="active treeview">
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
                <li><a href="../forms/beneficiary_input.html"><i class="fa fa-circle-o"></i> Beneficiary</a></li>
                <li><a href="../forms/employee_input.html"><i class="fa fa-circle-o"></i> Employee</a></li>
                <li><a href="../forms/donar_input.html"><i class="fa fa-circle-o"></i> Donar</a></li>
                <li><a href="../forms/volunteer_input.html"><i class="fa fa-circle-o"></i> Volunteer</a></li>
                <li><a href="../forms/trainer_input.html"><i class="fa fa-circle-o"></i> Trainer</a></li>
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
                <li><a href="../forms/healthproject_input.html"><i class="fa fa-circle-o"></i> Health</a></li>
                <li><a href="../forms/microcreditproject_input.html"><i class="fa fa-circle-o"></i> Microcredit</a></li>
                <li><a href="../forms/seminarproject_input.html"><i class="fa fa-circle-o"></i> Seminar</a></li>
                <li><a href="../forms/trainingproject_input.html"><i class="fa fa-circle-o"></i> Training</a></li>
              </ul>
            </li>            
            <li><a href="../forms/publication_input.html"><i class="fa fa-circle-o"></i> Publication</a></li>
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
                <li><a href="../tables/beneficiary_input.html"><i class="fa fa-circle-o"></i> Beneficiary</a></li>
                <li><a href="../forms/employee_input.html"><i class="fa fa-circle-o"></i> Employee</a></li>
                <li><a href="../forms/donar_input.html"><i class="fa fa-circle-o"></i> Donar</a></li>
                <li><a href="../forms/volunteer_input.html"><i class="fa fa-circle-o"></i> Volunteer</a></li>
                <li><a href="../forms/trainer_input.html"><i class="fa fa-circle-o"></i> Trainer</a></li>
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
                <li><a href="../forms/healthproject_input.html"><i class="fa fa-circle-o"></i> Health</a></li>
                <li><a href="../forms/microcreditproject_input.html"><i class="fa fa-circle-o"></i> Microcredit</a></li>
                <li><a href="../forms/seminarproject_input.html"><i class="fa fa-circle-o"></i> Seminar</a></li>
              </ul>
            </li>            
            <li><a href="../tables/publicationdata.php"><i class="fa fa-circle-o"></i> Publication</a></li>
          </ul>
        </li>
        
        
      </ul>  
    <!-- /.sidebar -->
  </aside>

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Total salary of a month
        <small>Preview</small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <form role="form" action="salaryquerydata.php" method="post">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Selection</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Year</label>
                  <input type="text" class="form-control" name="BeneficiaryDOB" id="BeneficiaryDOB" placeholder="Enter Year(YYYY)" required>
                </div>
                <div class="form-group">
                  <label>Month</label>
                  <select class="form-control" name="BeneficiaryReligion" id="BeneficiaryReligion" required>
                    <option value="NOT SELECTED">(--select--)</option>
                    <option value="1">January</option>
                    <option value="2">February</option>
                    <option value="3">March</option>
                    <option value="4">April</option>
                    <option value="5">May</option>
                    <option value="6">June</option>
                    <option value="7">July</option>
                    <option value="8">August</option>
                    <option value="9">September</option>
                    <option value="10">October</option>
                    <option value="11">November</option>
                    <option value="12">December</option>
                  </select>
                </div>
                
                

              </div>
              <!-- /.box-body -->

        <!--      <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>-->
            
          </div>
          <!-- /.box -->



        </div>
        <!--/.col (left) -->
        <!-- right column -->

          <!-- left column -->
        


        <!--/.col (right) -->
      </div>
      <!-- /.row -->


      

      <div class="row">
        
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Submission</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
              
              <!-- /.box-body -->

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                
              </div>
           
          </div>
          <!-- /.box -->



        </div>
        <!--/.col (left) -->
        <!-- right column -->

          <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <!-- /.box -->



        </div>
        <!--/.col (left) -->


        <!--/.col (right) -->
      </div>
      <!-- /.row -->


    </form>

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    
    <strong>Copyright &copy; 2018 </strong> All rights
    reserved.
  </footer>

  
<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
</body>
</html>
