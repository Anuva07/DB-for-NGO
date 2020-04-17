<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Seminar Project Data Print</title>
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
        <big><b>Seminar Project general Information</b></big>
        <address>
                  <?php  
                    $E_Id = $_POST['CkPersonid'];
                    $GenVal1 = array("<b>Project ID</b>", "<b>Project Name</b>", "<b>Start Date</b>", "<b>Project Coordinator</b>", "<b>Budget</b>", "<b>Fund</b>");
                    $count1 = count($GenVal1);
                    $q = " SELECT P_Id,P_name,Start_Date,Proj_Coord,Budget,P_Fund FROM Project WHERE P_Id='$E_Id'";
                    $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                      for ($i=0,$j=0; $i<6,$j<$count1; $i++,$j++) {
                        echo  $GenVal1[$j]. " : " .$row[$i] . "<br>";
                      }
                    }
                    oci_free_statement($stid);
                    
                  ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <big><b>Contact Information</b></big>
        <address>
          <?php  

                    $qq = "SELECT Phone FROM Phone WHERE Phone.Person_Id='$E_Id'";
                    $stid = oci_parse($connection,$qq);
                    oci_execute($stid);
                    while (($row1 = oci_fetch_array($stid, OCI_BOTH)) != false) {
                      echo "<b>Phone </b>: " .$row1[0]."<br>";
                    }
                    oci_free_statement($stid);
                    $GenVal11 = array("<b>House Number</b>", "<b>Road Name/Number</b>", "<b>City</b>", "<b>Country</b>", "<b>Postal Code</b>");
                    $count11 = count($GenVal11);
                    $q = "SELECT House,Road,City,Country,Postal_Code FROM Project WHERE Project.P_Id='$E_Id'";
                    $stid = oci_parse($connection,$q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                      for ($i=0,$j=0; $i<6,$j<$count11; $i++,$j++) {
                        echo  $GenVal11[$j]. " : " .$row[$i] . "<br>";
                      }
                    }
                    oci_free_statement($stid);
                    
          ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <big><b>Extra Information</b></big>
        <address>
                  <?php  
                    $E_Id = $_POST['CkPersonid'];
                    $GenVal111 = array("<b>Seminar Subject</b>", "<b>Chief Guest</b>", "<b>Special Guest</b>");
                    $count111 = count($GenVal111);
                    $q = " SELECT Seminar_Subj,Chief_Guest,Special_Guest FROM Women_Emp_Seminar WHERE P_Id='$E_Id'";
                    $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                      for ($i=0,$j=0; $i<3,$j<$count111; $i++,$j++) {
                        echo  $GenVal111[$j]. " : " .$row[$i] . "<br>";
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
