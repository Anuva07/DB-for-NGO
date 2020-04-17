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
  <title>Data Tables</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css">
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
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="../../index.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Dashboard</b></span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
     

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
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
    <!-- /.sidebar -->
  </aside>

   


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <?php
        $Beneficiary_DOB = $_POST['BeneficiaryDOB'];
        $Beneficiary_Religion = $_POST['BeneficiaryReligion'];
      ?>
      <h1>
        Data Tables
        <small>
          <?php
            echo "Salary Query of " .$Beneficiary_Religion. " th month of year " .$Beneficiary_DOB. " ";
          ?>
        </small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          
          

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">General Information</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
      
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Total Bonus</th>
                  <th>Total Basic Pay</th>
                  <th>Total House Alliance</th>
                  <th>Total Utshob Alliance</th>
                  <th>Total Medical Alliance</th>

                </tr>
                </thead>
                <tbody>
                    <?php  
                    
                    $salq = "SELECT SUM(Bonus_Amount),SUM(Basic_Pay),SUM(House_Alice),SUM(Utsob_Alice),SUM(Med_Alice) from salary where EXTRACT(MONTH FROM B_DATE)='$Beneficiary_Religion' AND EXTRACT(YEAR FROM B_DATE)='$Beneficiary_DOB'";
                    $stid = oci_parse($connection, $salq);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {

                    echo "<tr>";
                    echo "<td>" . $row['0'] . "</td>";
                    echo "<td>" . $row['1'] . "</td>";
                    echo "<td>" . $row['2'] . "</td>";
                    echo "<td>" . $row['3'] . "</td>";
                    echo "<td>" . $row['4'] . "</td>";
                    echo "</tr>";

                    }
                    oci_free_statement($stid);
                    oci_close($connection);
                    ?>
                
                </tbody>
               
                
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      
    </div>
    <strong></strong> All rights
    reserved.
  </footer>

  
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="../../bower_components/jquery/dist/jquery.min.js"></script>
<!-- Bootstrap 3.3.7 -->
<script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../../bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="../../bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
</body>
</html>
