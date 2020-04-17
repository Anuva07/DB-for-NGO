<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Donar Data Print</title>
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

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print();">

<!--php code-->

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
    
    <!--php code-->

<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> NGO
          <small class="pull-right">
            Date:
            <?php
              echo date("d-m-y");
            ?>
            
          </small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <big><b>Donar general Information</b></big>
        <address>
                  <?php  
                    $E_Id = $_POST['CkPersonid'];
                    $GenVal1 = array("<b>Employee ID</b>", "<b>First Name</b>", "<b>First Name</b>", "<b>Date of Birth</b>", "<b>Gender</b>", "<b>Religion</b>", "<b>Nationality</b>");
                    $count1 = count($GenVal1);
                    $q = " SELECT Person_Id,F_Name,L_Name,DOB,Gender,Religion,Nationality FROM Person WHERE Person_Id='$E_Id'";
                    $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                      for ($i=0,$j=0; $i<7,$j<$count1; $i++,$j++) {
                        echo  $GenVal1[$j]. " : " .$row[$i] . "<br>";
                      }
                    }
                    oci_free_statement($stid);
                    
                  ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <big><b>DOnar Contact Information</b></big>
        <address>
          <?php  

                    $qq = "SELECT Phone FROM Phone WHERE Phone.Person_Id='$E_Id'";
                    $stid = oci_parse($connection,$qq);
                    oci_execute($stid);
                    while (($row1 = oci_fetch_array($stid, OCI_BOTH)) != false) {
                      echo "<b>Phone </b>: " .$row1[0]."<br>";
                    }
                    oci_free_statement($stid);
                    $GenVal11 = array("<b>Email ID</b>", "<b>House Number</b>", "<b>Road Name/Number</b>", "<b>City</b>", "<b>Country</b>", "<b>Postal Code</b>");
                    $count11 = count($GenVal11);
                    $q = "SELECT Email_Id,House,Road,City,Country,Postal_Code FROM Person WHERE Person.Person_Id='$E_Id'";
                    $stid = oci_parse($connection,$q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                      for ($i=0,$j=0; $i<7,$j<$count11; $i++,$j++) {
                        echo  $GenVal11[$j]. " : " .$row[$i] . "<br>";
                      }
                    }
                    oci_free_statement($stid);
                    
          ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->


    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <big><b>Donar Identification Information</b></big>
        <address>
                  <?php  
                    $E_Id = $_POST['CkPersonid'];
                    $GenVal111 = array("<b>NID</b>", "<b>Driving License</b>", "<b>Passport Number</b>", "<b>TIN</b>", "<b>Birth Certificate Number</b>", "<b>Blood Group</b>", "<b>Height(inch)</b>", "<b>Weight(kg)</b>");
                    $count111 = count($GenVal111);
                    $q = " SELECT NID,Div_license,Passport,TIN,Birth_Certificate,Blood_gp,Height,Weight FROM Person WHERE Person_Id='$E_Id'";
                    $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                      for ($i=0,$j=0; $i<8,$j<$count111; $i++,$j++) {
                        echo  $GenVal111[$j]. " : " .$row[$i] . "<br>";
                      }
                    }
                    oci_free_statement($stid);
                    
                  ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <big><b>Family Information</b></big>
        <address>
          <?php  
                    $GenVal1111 = array("<b>Father Name</b>", "<b>Father Occupation</b>", "<b>Father Salary</b>", "<b>Mother Name</b>", "<b>Spouse Name</b>", "<b>Anniversary Date</b>", "<b>Spouse Profession</b>","<b>Number of Children</b>");
                    $count1111 = count($GenVal1111);
                    $q = "SELECT Father_Name,Father_Occu,Fathers_Salary,Mother_Name,Spouse,Anniversary,Spouse_Prof,ChildNum FROM Person  WHERE Person.Person_Id='$E_Id'";
                    $stid = oci_parse($connection,$q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                      for ($i=0,$j=0; $i<8,$j<$count1111; $i++,$j++) {
                        echo  $GenVal1111[$j]. " : " .$row[$i] . "<br>";
                      }
                    }
                    oci_free_statement($stid);
                    
          ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <big><b>Banking Information</b></big>
        <address>
          <?php  
                    $GenVal2 = array("<b>Bank Name</b>", "<b>Bank Account  Number</b>", "<b>Bank Address</b>");
                    $count12 = count($GenVal2);
                    $q = "SELECT Bank_Name,Bank_acct_no,Bank_address FROM Person WHERE Person.Person_Id='$E_Id'";
                    $stid = oci_parse($connection,$q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                      for ($i=0,$j=0; $i<3,$j<$count12; $i++,$j++) {
                        echo  $GenVal2[$j]. " : " .$row[$i] . "<br>";
                      }
                    }
                    oci_free_statement($stid);
                    
          ?>
        </address>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
