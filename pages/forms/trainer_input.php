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
  <title>Trainer Input</title>
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
        Trainer Data Insertion
        <small>Preview</small>
      </h1>

    </section>

    <!-- Main content -->
    <section class="content">
      <form role="form" action="trainerinsert.php" method="post">
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
                  <label for="exampleInputEmail1">First Name</label>
                  <input type="text" class="form-control" name="BeneficiaryFirstName" id="BeneficiaryFirstName" placeholder="Enter First Name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Last Name</label>
                  <input type="text" class="form-control" name="BeneficiaryLastName" id="BeneficiaryLastName" placeholder="Enter Last Name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Date of Birth</label>
                  <input type="Date" class="form-control" name="BeneficiaryDOB" id="BeneficiaryDOB" placeholder="Enter Date of Bith" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Nationality</label>
                  <input type="text" class="form-control" name="BeneficiaryNationality" id="BeneficiaryNationality" placeholder="Enter Nationality" required>
                </div>
               <b>Gender</b>
                <div class="radio">
                    <label>
                      <input type="radio" name="BeneficiaryGender" id="optionsRadios2" value="Male" required>
                      Male
                    </label>
                </div>
                <div class="radio">
                    <label>
                      <input type="radio" name="BeneficiaryGender" id="optionsRadios2" value="Female" required>
                      Female
                    </label>
                </div>
                <div class="form-group">
                  <label>Religion</label>
                  <select class="form-control" name="BeneficiaryReligion" id="BeneficiaryReligion" required>
                    <option value="NOT SELECTED">(--select--)</option>
                    <option value="Islam">Islam</option>
                    <option value="Hinduism">Hinduism</option>
                    <option value="Christian">Christian</option>
                    <option value="Buddhism">Buddhism</option>
                    <option value="Others">Others</option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="exampleInputFile">Add Image</label>
                  <input type="file" name="BeneficiaryImage" id="BeneficiaryImage">
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
              <h3 class="box-title">Contact Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputName">Phone Number</label>
                  <input type="text" class="form-control" name="BeneficiaryPhoneNumber" id="BeneficiaryPhoneNumber" placeholder="Enter Phone Number">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Email ID</label>
                  <input type="Email" class="form-control" name="BeneficiaryEmailID" id="BeneficiaryEmailID" placeholder="Enter Email ID">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">House Number</label>
                  <input type="text" class="form-control" name="BeneficiaryHouseNumber" id="BeneficiaryHouseNumber" placeholder="Enter House Number" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Road Number/Name</label>
                  <input type="text" class="form-control" name="BeneficiaryRoadNumber" id="BeneficiaryRoadNumber" placeholder="Enter Road Number/Name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">City</label>
                  <input type="text" class="form-control" name="BeneficiaryCity" id="BeneficiaryCity" placeholder="Enter City" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Country</label>
                  <input type="text" class="form-control" name="BeneficiaryCountry" id="BeneficiaryCountry" placeholder="Enter Country" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Postal Code</label>
                  <input type="text" class="form-control" name="BeneficiaryPostalCode" id="BeneficiaryPostalCode" placeholder="Enter Postal Code" required>
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
              <h3 class="box-title">Identification Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputName">NID Number</label>
                  <input type="text" class="form-control" name="BeneficiaryNID" id="BeneficiaryNID" placeholder="Enter NID">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Birth Certificate Number</label>
                  <input type="text" class="form-control" name="BeneficiaryBirthCertificate" id="BeneficiaryBirthCertificate" placeholder="Enter Birth Certificate Number" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Driving License</label>
                  <input type="text" class="form-control" name="BeneficiaryDrivingLicense" id="BeneficiaryDrivingLicense" placeholder="Enter Driving License Number">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Passport</label>
                  <input type="text" class="form-control" name="BeneficiaryPassport" id="BeneficiaryPassport" placeholder="Enter Passport Number">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">TIN</label>
                  <input type="text" class="form-control" name="BeneficiaryTIN" id="BeneficiaryTIN" placeholder="Enter Tax Identification Number">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Weight</label>
                  <input type="text" class="form-control" name="BeneficiaryWeight" id="BeneficiaryWeight" placeholder="Enter Weight in KG" required>
                </div>                
                <div class="form-group">
                  <label for="exampleInputEmail1">Height</label>
                  <input type="text" class="form-control" name="BeneficiaryHeight" id="BeneficiaryHeight" placeholder="Enter height in Inches" required>
                </div>  
                <div class="form-group">
                  <label>Blood Group</label>
                  <select class="form-control" name="BeneficiaryBloodGrp" id="BeneficiaryBloodGrp" required>
                    <option>(--select--)</option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B">B-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
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
        <div class="col-md-6">
          <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Parental Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputName">Father Name</label>
                  <input type="text" class="form-control" name="BeneficiaryFatherName" id="BeneficiaryFatherName" placeholder="Enter Father Name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Father's Occupation</label>
                  <input type="text" class="form-control" name="BeneficiaryFatherOccupation" id="BeneficiaryFatherOccupation" placeholder="Enter Father's Occupation">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Father's Monthly Salary</label>
                  <input type="Number" class="form-control" name="BeneficiaryFatherSalary" id="BeneficiaryFatherSalary" placeholder="Enter Father's Monthly Salary">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Mother Name</label>
                  <input type="text" class="form-control" name="BeneficiaryMotherName" id="BeneficiaryMotherName" placeholder="Enter Mother Name" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Spouse Name</label>
                  <input type="text" class="form-control" name="BeneficiarySpouseName" id="BeneficiarySpouseName" placeholder="Enter Spouse Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Spouse Profession</label>
                  <input type="text" class="form-control" name="BeneficiarySpouseProf" id="BeneficiarySpouseProf" placeholder="Enter Spouse Profession">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Anniversary</label>
                  <input type="date" class="form-control" name="BeneficiaryAnniversary" id="BeneficiaryAnniversary" placeholder="Enter Anniversary">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Number of Children</label>
                  <input type="number" class="form-control" name="BeneficiaryChildrenNumber" id="BeneficiaryChildrenNumber" placeholder="Enter Number of Children">
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
              <h3 class="box-title">Banking Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputName">Bank Name</label>
                  <input type="text" class="form-control" name="BeneficiaryBankName" id="BeneficiaryBankName" placeholder="Enter Bank Name">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Bank Address</label>
                  <input type="text" class="form-control" name="BeneficiaryBankAddress" id="BeneficiaryBankAddress" placeholder="Enter Bank Address">
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Bank Account Number</label>
                  <input type="text" class="form-control" name="BeneficiaryAccount" id="BeneficiaryAccount" placeholder="Enter Bank Account Number">
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
              <h3 class="box-title">Trainer Information</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
           
              <div class="box-body">
                <div class="form-group">
                  <label for="exampleInputEmail1">Joining Date</label>
                  <input type="Date" class="form-control" name="EmployeeJoinDate" id="EmployeeJoinDate" placeholder="Enter Date of Join" required>
                </div>
                <div class="form-group">
                  <label for="exampleInputEmail1">Retirement Date</label>
                  <input type="Date" class="form-control" name="EmployeeRetireDate" id="EmployeeRetireDate" placeholder="Enter Date of Retirement">
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
