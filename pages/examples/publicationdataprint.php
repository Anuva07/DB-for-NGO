<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Publication Data Print</title>
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
        <big><b>Publication general Information</b></big>
        <address>
                  <?php  
                    $E_Id = $_POST['CkPersonid'];
                    $GenVal1 = array("<b>Publication ID</b>", "<b>Publication Name</b>", "<b>Publisher Name</b>", "<b>Publication Date</b>", "<b>Publication Type</b>");
                    $count1 = count($GenVal1);
                    $q = " SELECT Pub_id,Pub_name,Publisher,Pub_date,Pub_type FROM Publication WHERE Pub_id='$E_Id'";
                    $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                      for ($i=0,$j=0; $i<5,$j<$count1; $i++,$j++) {
                        echo  $GenVal1[$j]. " : " .$row[$i] . "<br>";
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
