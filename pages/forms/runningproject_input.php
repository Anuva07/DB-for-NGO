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
  <title>Running Projects</title>
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
      <span class="logo-mini"><b>Admin</b></span>
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
        
        
        
        
      </ul>
        
    <!-- /.sidebar -->
  </aside>

  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Running Project
        <small>Preview</small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      

      


      <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <?php  

                    $q = "SELECT COUNT(W_Micro_Credit.P_Id) FROM W_Micro_Credit,Project WHERE Project.End_Date=to_date('01/01/2070','dd/mm/yyyy') AND Project.P_Id=W_Micro_Credit.P_Id";
                    $stid2 = oci_parse($connection, $q);
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
            <a href="../tables/wmicrocreditrunningdata.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <?php  
                    $q="SELECT COUNT(Women_Emp_Seminar.P_Id) FROM Women_Emp_Seminar,Project WHERE Project.End_Date=to_date('01/01/2070','dd/mm/yyyy') AND Project.P_Id=Women_Emp_Seminar.P_Id";
                    $stid2 = oci_parse($connection,$q);
                    oci_execute($stid2);
                    while (($row2 = oci_fetch_array($stid2, OCI_BOTH)) != false) {


                    echo "<h3>" . $row2['0'] . "</h3>";

                    }
                    oci_free_statement($stid2);
                    
                    ?>

              <p>Total Seminar Projects</p>
            </div>
            <div class="icon">
              <i class="ion ion-people"></i>
            </div>
            <a href="../tables/seminarrunningdata.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <?php  
                    $q="SELECT COUNT(Proj_Training.P_Id) FROM Proj_Training,Project WHERE Project.End_Date=to_date('01/01/2070','dd/mm/yyyy') AND Project.P_Id=Proj_Training.P_Id";
                    $stid2 = oci_parse($connection,$q);
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
            <a href="../tables/trainingprojectrunningdata.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">

              <?php  
                    $q="SELECT COUNT(Health_Proj.P_Id) FROM Health_Proj,Project WHERE Project.End_Date=to_date('01/01/2070','dd/mm/yyyy') AND Project.P_Id=Health_Proj.P_Id";
                    $stid2 = oci_parse($connection,$q);
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
            <a href="../tables/healthprojectrunningdata.php" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
          

          <!-- solid sales graph -->
         



          <!-- Calendar -->
          
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
