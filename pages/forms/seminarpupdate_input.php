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
                  
                 $Ck_Personid = $_POST['CkPersonid'];
                    ?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Seminar Project Data Update</title>
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
              <span class="hidden-xs">Mr. XYZ</span>
            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <li class="user-header">
                <img src="../../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                <p>
                  Mr. XYZ - DB Admin
                  
                </p>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                
                <div class="pull-right">
                  <a href="http://localhost/DbProject/pages/examples/login.html" class="btn btn-default btn-flat">Sign out</a>
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
        Seminar Project Data Update
        <small>Preview</small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <form role="form" action="seminarpupdateinsert.php" method="post">
      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">General Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Project ID</label>
                  <?php
                    
                  $q="SELECT P_Id FROM Women_Emp_Seminar WHERE P_Id='$Ck_Personid'";
                  $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {

                        echo "<input type='text' class='form-control' name='BeneficiaryIDNumber' id='BeneficiaryIDNumber'  value='".$row[0]. "'>"; 

                    }
                    oci_free_statement($stid);
                    ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">End Date</label>
                  <?php
                    
                  $q="SELECT End_Date FROM Project WHERE P_Id='$Ck_Personid'";
                  $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {

                        echo "<input type='date' class='form-control' name='BeneficiaryAnniversary' id='BeneficiaryAnniversary' placeholder='Enter End Date' value='".$row[0]. "'>"; 

                    }
                    oci_free_statement($stid);
                    ?>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Project Coordinator</label>
                  <?php
                    
                  $q="SELECT Proj_Coord FROM Project WHERE P_Id='$Ck_Personid'";
                  $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    $i=0;
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {

                       
                        echo "<input type='text' class='form-control' name='BeneficiaryFatherOccupation' id='BeneficiaryFatherOccupation' placeholder='Enter Father Occupation'  value='".$row[0]. "'>"; 
                     

                    }
                    oci_free_statement($stid);
                    ?>
              <!--    <input type="text" class="form-control" name="BeneficiaryFatherOccupation" id="BeneficiaryFatherOccupation" placeholder="Enter Father's Occupation">-->
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Project Budget</label>
                  <?php
                    
                  $q="SELECT Budget FROM Project WHERE P_Id='$Ck_Personid'";
                  $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {

                        echo "<input type='Number' class='form-control' name='BeneficiaryFatherSalary' id='BeneficiaryFatherSalary' placeholder='Enter Project Budget' value='".$row[0]. "'>"; 

                    }
                    oci_free_statement($stid);
                    ?>
            <!--      <input type="Number" class="form-control" name="BeneficiaryFatherSalary" id="BeneficiaryFatherSalary" placeholder="Enter Father's Monthly Salary">-->
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Project Fund</label>
                  <?php
                    
                  $q="SELECT P_Fund FROM Project WHERE P_Id='$Ck_Personid'";
                  $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {

                        echo "<input type='number' class='form-control' name='BeneficiarySpouseName' id='BeneficiarySpouseName' placeholder='Enter Project Fund' value='".$row[0]. "'>"; 

                    }
                    oci_free_statement($stid);
                    ?>
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
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Project Location</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">House Number</label>
                  <?php
                    
                  $q="SELECT House FROM Project WHERE P_Id='$Ck_Personid'";
                  $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {

                        echo "<input type='text' class='form-control' name='BeneficiaryHouseNumber' id='BeneficiaryHouseNumber' placeholder='Enter House Number' value='".$row[0]. "'>"; 

                    }
                    oci_free_statement($stid);
                    ?>
            <!--      <input type="text" class="form-control" name="BeneficiaryHouseNumber" id="BeneficiaryHouseNumber" placeholder="Enter House Number">-->
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Road Number/Name</label>
                  <?php
                    
                  $q="SELECT Road FROM Project WHERE P_Id='$Ck_Personid'";
                  $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {

                        echo "<input type='text' class='form-control' name='BeneficiaryRoadNumber' id='BeneficiaryRoadNumber' placeholder='Enter Number of Children' value='".$row[0]. "'>"; 

                    }
                    oci_free_statement($stid);
                    ?>
            <!--      <input type="text" class="form-control" name="BeneficiaryRoadNumber" id="BeneficiaryRoadNumber" placeholder="Enter Road Number/Name">-->
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">City</label>
                  <?php
                    
                  $q="SELECT City FROM Project WHERE P_Id='$Ck_Personid'";
                  $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {

                        echo "<input type='text' class='form-control' name='BeneficiaryCity' id='BeneficiaryCity' placeholder='Enter City' value='".$row[0]. "'>"; 

                    }
                    oci_free_statement($stid);
                    ?>
            <!--      <input type="text" class="form-control" name="BeneficiaryCity" id="BeneficiaryCity" placeholder="Enter City">-->
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Country</label>
                  <?php
                    
                  $q="SELECT Country FROM Project WHERE P_Id='$Ck_Personid'";
                  $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {

                        echo "<input type='text' class='form-control' name='BeneficiaryCountry' id='BeneficiaryCountry' placeholder='Enter Country' value='".$row[0]. "'>"; 

                    }
                    oci_free_statement($stid);
                    ?>
            <!--      <input type="text" class="form-control" name="BeneficiaryCountry" id="BeneficiaryCountry" placeholder="Enter Country">-->
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Postal Code</label>
                  <?php
                    
                  $q="SELECT Postal_Code FROM Project WHERE P_Id='$Ck_Personid'";
                  $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {

                        echo "<input type='text' class='form-control' name='BeneficiaryPostalCode' id='BeneficiaryPostalCode' placeholder='Enter Postal Code' value='".$row[0]. "'>"; 

                    }
                    oci_free_statement($stid);
                    ?>
            <!--      <input type="text" class="form-control" name="BeneficiaryPostalCode" id="BeneficiaryPostalCode" placeholder="Enter Postal Code">-->
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


        <!--/.col (right) -->
      </div>
      <!-- /.row -->


      <div class="row">
        <!-- left column -->
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Project Extra Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
          
              <div class="box-body">
                
                <div class="form-group">
                  <label for="exampleInputEmail1">Seminar Subject</label>
                  <?php
                    
                  $q="SELECT Seminar_Subj FROM Women_Emp_Seminar WHERE P_Id='$Ck_Personid'";
                  $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {

                        echo "<input type='text' class='form-control' name='BeneficiaryWeight' id='BeneficiaryWeight' placeholder='Enter Given Service' value='".$row[0]. "'>"; 

                    }
                    oci_free_statement($stid);
                    ?>
            <!--      <input type="text" class="form-control" name="BeneficiaryWeight" id="BeneficiaryWeight" placeholder="Enter Weight in KG">-->
                </div>                
                <div class="form-group">
                  <label for="exampleInputEmail1">Chief Guest</label>
                  <?php
                    
                  $q="SELECT Chief_Guest FROM Women_Emp_Seminar WHERE P_Id='$Ck_Personid'";
                  $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {

                        echo "<input type='text' class='form-control' name='BeneficiaryHeight' id='BeneficiaryHeight' placeholder='Enter Height' value='".$row[0]. "'>"; 

                    }
                    oci_free_statement($stid);
                    ?>
            <!--      <input type="text" class="form-control" name="BeneficiaryHeight" id="BeneficiaryHeight" placeholder="Enter height in Inches">-->
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Special Guest</label>
                  <?php
                    
                  $q="SELECT Special_Guest FROM Women_Emp_Seminar WHERE P_Id='$Ck_Personid'";
                  $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {

                        echo "<input type='text' class='form-control' name='BeneficiaryHeight1' id='BeneficiaryHeight1' placeholder='Enter Amount' value='".$row[0]. "'>"; 

                    }
                    oci_free_statement($stid);
                    ?>
            <!--      <input type="text" class="form-control" name="BeneficiaryHeight" id="BeneficiaryHeight" placeholder="Enter height in Inches">-->
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
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Update and Submission</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Update</button>
              </div>
           
            
            
          </div>
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
