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
  <title>DBMS | Dashboard</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

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
    <a href="index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Adm</b></span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Dashboard</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- Messages: style can be found in dropdown.less-->
          
          <!-- Notifications: style can be found in dropdown.less -->
          
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
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
                <img src="dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

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
                  <small></small>
                </p>
              </li>
              <!-- Menu Body -->
              <li class="user-body">
                
                <!-- /.row -->
              </li>
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
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      
      <!-- search form -->
      
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            
          </a>
          
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
                <li><a href="pages/forms/beneficiary_input.php"><i class="fa fa-circle-o"></i> Beneficiary</a></li>
                <li><a href="pages/forms/employee_input.php"><i class="fa fa-circle-o"></i> Employee</a></li>
                <li><a href="pages/forms/donar_input.php"><i class="fa fa-circle-o"></i> Donar</a></li>
                <li><a href="pages/forms/volunteer_input.php"><i class="fa fa-circle-o"></i> Volunteer</a></li>
                <li><a href="pages/forms/trainer_input.php"><i class="fa fa-circle-o"></i> Trainer</a></li>
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
                <li><a href="pages/forms/healthproject_input.php"><i class="fa fa-circle-o"></i> Health</a></li>
                <li><a href="pages/forms/microcreditproject_input.php"><i class="fa fa-circle-o"></i> Microcredit</a></li>
                <li><a href="pages/forms/seminarproject_input.php"><i class="fa fa-circle-o"></i> Seminar</a></li>
                <li><a href="pages/forms/trainingproject_input.php"><i class="fa fa-circle-o"></i> Training</a></li>
              </ul>
            </li>            
            <li><a href="pages/forms/publication_input.php"><i class="fa fa-circle-o"></i> Publication</a>
            </li>
            <li><a href="pages/forms/salary_input.php"><i class="fa fa-circle-o"></i> Salary</a>
            </li>
            <li><a href="pages/forms/donardonation_input.php"><i class="fa fa-circle-o"></i> Donation</a>
            </li>
            <li><a href="pages/forms/refrel_input.php"><i class="fa fa-circle-o"></i> Reference</a>
            </li>
            <li><a href="pages/forms/education_input.php"><i class="fa fa-circle-o"></i> Education</a>
            </li>
            <li><a href="pages/forms/training_input.php"><i class="fa fa-circle-o"></i> Training</a>
            </li>
            <li><a href="pages/forms/branch_input.html"><i class="fa fa-circle-o"></i> Branch</a>
            </li>
            <li><a href="pages/forms/asset_input.php"><i class="fa fa-circle-o"></i> Asset</a>
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
                <li><a href="pages/forms/personbranch_input.php"><i class="fa fa-circle-o"></i> Employee Branch</a></li>
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
                <li><a href="pages/forms/beneficiaryupdateoption.php"><i class="fa fa-circle-o"></i> Beneficiary</a></li>
                <li><a href="pages/forms/employeeupdateoption.php"><i class="fa fa-circle-o"></i> Employee</a></li>
                <li><a href="pages/forms/donarupdateoption.php"><i class="fa fa-circle-o"></i> Donar</a></li>
                <li><a href="pages/forms/volunteerupdateoption.php"><i class="fa fa-circle-o"></i> Volunteer</a></li>
                <li><a href="pages/forms/trainerupdateoption.php"><i class="fa fa-circle-o"></i> Trainer</a></li>
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
                <li><a href="pages/forms/healthpupdateoption.php"><i class="fa fa-circle-o"></i> Health</a></li>
                <li><a href="pages/forms/microcreditpupdateoption.php"><i class="fa fa-circle-o"></i> Microcredit</a></li>
                <li><a href="pages/forms/seminarpupdateoption.php"><i class="fa fa-circle-o"></i> Seminar</a></li>
                <li><a href="pages/forms/trainingpupdateoption.php"><i class="fa fa-circle-o"></i> Training</a></li>
              </ul>
            </li>
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
            <li><a href="pages/tables/branchdata.php"><i class="fa fa-circle-o"></i> Branch</a></li>
            <li><a href="pages/tables/personprojectassignment.php"><i class="fa fa-circle-o"></i> Person Project</a></li>
            <li><a href="pages/tables/referencedata.php"><i class="fa fa-circle-o"></i> Reference</a></li>
            <li><a href="pages/tables/salarydata.php"><i class="fa fa-circle-o"></i> Salary</a></li>
            <li><a href="pages/tables/donationdata.php"><i class="fa fa-circle-o"></i> Donation</a></li>
            <li><a href="pages/tables/educationdata.php"><i class="fa fa-circle-o"></i> Education</a></li>
            <li><a href="pages/tables/trainingdata.php"><i class="fa fa-circle-o"></i> Training</a></li>
            <li><a href="pages/tables/employeebranchdata.php"><i class="fa fa-circle-o"></i> Employee Branch</a></li>
            <li><a href="pages/tables/branchprojectdata.php"><i class="fa fa-circle-o"></i> Branch Project</a></li>
            <li><a href="pages/tables/benefeciarycurrentjobdata.php"><i class="fa fa-circle-o"></i> Beneficiary Current Job</a></li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-square"></i> <span>Asset</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="pages/tables/branchassetdata.php"><i class="fa fa-circle-o"></i> Branch</a></li>
                <li><a href="pages/tables/projectassetdata.php"><i class="fa fa-circle-o"></i> Project</a></li>
              </ul>
            </li>
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
            <li><a href="pages/forms/reference_delete.php"><i class="fa fa-circle-o"></i> Reference</a></li>
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
                <li><a href="pages/examples/healthpprintoption.php"><i class="fa fa-circle-o"></i> Health</a></li>
                <li><a href="pages/examples/microcreditpprintoption.php"><i class="fa fa-circle-o"></i> Microcredit</a></li>
                <li><a href="pages/examples/seminarpprintoption.php"><i class="fa fa-circle-o"></i> Seminar</a></li>
                <li><a href="pages/examples/trainingpprintoption.php"><i class="fa fa-circle-o"></i> Training</a></li>
              </ul>
            </li>            
            <li><a href="pages/examples/publicationprintoption.php"><i class="fa fa-circle-o"></i> Publication</a></li>

          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-search"></i> <span>Query</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                        
            <li><a href="pages/forms/salaryquery_input.php"><i class="fa fa-circle-o"></i> Salary</a></li>
            <li><a href="pages/forms/runningproject_input.php"><i class="fa fa-circle-o"></i> Running Projects</a></li>
            <li><a href="pages/tables/projectexpansedata.php"><i class="fa fa-circle-o"></i> Project Expanse</a></li>


            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-eye"></i> <span>View</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
                       
            
            <li><a href="pages/tables/projectexpansedata.php"><i class="fa fa-circle-o"></i> Project Expanse</a></li>
            <li><a href="pages/tables/branchexpansedata.php"><i class="fa fa-circle-o"></i> Branch Expanse</a></li>
          


            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-i-cursor"></i> <span>Cursor</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/donardonationcursordata.php"><i class="fa fa-circle-o"></i> Donar Donation</a></li>
            
          </ul>
        </li>
        
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Control panel</small>
      </h1>
      
    </section>

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
    ?>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
                    <?php  

                    $stid2 = oci_parse($connection, 'SELECT COUNT(*) FROM Beneficiaries');
                    oci_execute($stid2);
                    while (($row2 = oci_fetch_array($stid2, OCI_BOTH)) != false) {


                    echo "<h3>" . $row2['0'] . "</h3>";

                    }
                    oci_free_statement($stid2);
                    
                    ?>

              <p>Total Beneficiaries</p>
            </div>
            <div class="icon">
              <i class="ion-woman"></i>
            </div>
            <a href="pages/tables/beneficiarydata.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php  

                    $stid2 = oci_parse($connection, 'SELECT COUNT(*) FROM Branch');
                    oci_execute($stid2);
                    while (($row2 = oci_fetch_array($stid2, OCI_BOTH)) != false) {


                    echo "<h3>" . $row2['0'] . "</h3>";

                    }
                    oci_free_statement($stid2);
                    
                    ?>

              <p>Total Branch</p>
            </div>
            <div class="icon">
              <i class="ion-ios-home"></i>
            </div>
            <a href="pages/tables/branchdata.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php  

                    $stid2 = oci_parse($connection, 'SELECT COUNT(*) FROM Employee');
                    oci_execute($stid2);
                    while (($row2 = oci_fetch_array($stid2, OCI_BOTH)) != false) {


                    echo "<h3>" . $row2['0'] . "</h3>";

                    }
                    oci_free_statement($stid2);
                    
                    ?>              

              <p>Total Employees</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-person"></i>
            </div>
            <a href="pages/tables/employeedata.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php  

                    $stid2 = oci_parse($connection, 'SELECT COUNT(*) FROM Trainer');
                    oci_execute($stid2);
                    while (($row2 = oci_fetch_array($stid2, OCI_BOTH)) != false) {


                    echo "<h3>" . $row2['0'] . "</h3>";

                    }
                    oci_free_statement($stid2);
                    
                    ?>

              <p>Total Trainers</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="pages/tables/trainerdata.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php  

                    $stid2 = oci_parse($connection, 'SELECT COUNT(*) FROM Volunteer');
                    oci_execute($stid2);
                    while (($row2 = oci_fetch_array($stid2, OCI_BOTH)) != false) {


                    echo "<h3>" . $row2['0'] . "</h3>";

                    }
                    oci_free_statement($stid2);
                    
                    ?>

              <p>Total Volunteers</p>
            </div>
            <div class="icon">
              <i class="ion ion-person-add"></i>
            </div>
            <a href="pages/tables/volunteerdata.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php  

                    $stid2 = oci_parse($connection, 'SELECT SUM(Donation_Amount) FROM Donar');
                    oci_execute($stid2);
                    while (($row2 = oci_fetch_array($stid2, OCI_BOTH)) != false) {


                    echo "<h3>" . $row2['0'] . "</h3>";

                    }
                    oci_free_statement($stid2);
                    
                    ?>

              <p>Total Donation</p>
            </div>
            <div class="icon">
              <i class="ion ion-social-usd"></i>
            </div>
            <a href="pages/tables/donationdata.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <?php  

                    $stid2 = oci_parse($connection, 'SELECT COUNT(*) FROM Donar');
                    oci_execute($stid2);
                    while (($row2 = oci_fetch_array($stid2, OCI_BOTH)) != false) {


                    echo "<h3>" . $row2['0'] . "</h3>";

                    }
                    oci_free_statement($stid2);
                    
                    ?>

              <p>Total Donars</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="pages/tables/donardata.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">

              <?php  

                    $stid2 = oci_parse($connection, 'SELECT COUNT(*) FROM Health_Proj');
                    oci_execute($stid2);
                    while (($row2 = oci_fetch_array($stid2, OCI_BOTH)) != false) {


                    echo "<h3>" . $row2['0'] . "</h3>";

                    }
                    oci_free_statement($stid2);
                    
                    ?>
              

              <p>Total Health Project</p>
            </div>
            <div class="icon">
              <i class="ion-ios-medkit"></i>
            </div>
            <a href="pages/tables/healthprojectdata.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->


      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php  

                    $stid2 = oci_parse($connection, 'SELECT COUNT(*) FROM W_Micro_Credit');
                    oci_execute($stid2);
                    while (($row2 = oci_fetch_array($stid2, OCI_BOTH)) != false) {


                    echo "<h3>" . $row2['0'] . "</h3>";

                    }
                    oci_free_statement($stid2);
                    
                    ?>

              <p>Total Microcredit Projects</p>
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="pages/tables/wmicrocreditdata.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php  

                    $stid2 = oci_parse($connection, 'SELECT COUNT(*) FROM Women_Emp_Seminar');
                    oci_execute($stid2);
                    while (($row2 = oci_fetch_array($stid2, OCI_BOTH)) != false) {


                    echo "<h3>" . $row2['0'] . "</h3>";

                    }
                    oci_free_statement($stid2);
                    
                    ?>

              <p>Total Seminar Projects</p>
            </div>
            <div class="icon">
              <i class="ion ion-microphone"></i>
            </div>
            <a href="pages/tables/seminardata.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php  

                    $stid2 = oci_parse($connection, 'SELECT COUNT(*) FROM Proj_Training');
                    oci_execute($stid2);
                    while (($row2 = oci_fetch_array($stid2, OCI_BOTH)) != false) {


                    echo "<h3>" . $row2['0'] . "</h3>";

                    }
                    oci_free_statement($stid2);
                    
                    ?>

              <p>Total Training Projects</p>
            </div>
            <div class="icon">
              <i class="ion ion-person"></i>
            </div>
            <a href="pages/tables/trainingprojectdata.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">

              <?php  

                    $stid2 = oci_parse($connection, 'SELECT COUNT(*) FROM Publication');
                    oci_execute($stid2);
                    while (($row2 = oci_fetch_array($stid2, OCI_BOTH)) != false) {


                    echo "<h3>" . $row2['0'] . "</h3>";

                    }
                    oci_free_statement($stid2);
                    oci_close($connection);
                    ?>
              

              <p>Total Publications</p>
            </div>
            <div class="icon">
              <i class="ion-ios-paper"></i>
            </div>
            <a href="pages/tables/publicationdata.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
      </div>
      <!-- /.row -->      

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
       
        <!-- /.Left col -->
        <!-- right col (We are only adding the ID to make the widgets sortable)-->
        <section class="col-lg-5 connectedSortable">

          <!-- Map box -->
          <div class="box box-solid bg-light-blue-gradient">
            <div class="box-header">
              <!-- tools box -->
              <div class="pull-right box-tools">

              </div>
              <!-- /. tools -->

              <i class="fa fa-map-marker"></i>

              <h3 class="box-title">
                Project Area
              </h3>
            </div>
            <div class="box-body">
              <div id="world-map" style="height: 250px; width: 100%;"></div>
            </div>
            <!-- /.box-body-->
            
          </div>
          <!-- /.box -->

          <!-- solid sales graph -->
         



          <!-- Calendar -->
          <div class="box box-solid bg-green-gradient">
            <div class="box-header">
              <i class="fa fa-calendar"></i>

              <h3 class="box-title">Calendar</h3>
              <!-- tools box -->
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                
              </div>
              <!-- /. tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
            <!-- /.box-body -->
            
          </div>
          <!-- /.box -->

        </section>
        <!-- right col -->
      </div>
      <!-- /.row (main row) -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong>Copyright &copy; 2018.</strong> All rights
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
<script src="bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="bower_components/raphael/raphael.min.js"></script>
<script src="bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="bower_components/moment/min/moment.min.js"></script>
<script src="bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
