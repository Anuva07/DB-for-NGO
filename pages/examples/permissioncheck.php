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

    if($loginval==2){
      header('Location:http://localhost/test/DbProject/pages/examples/nopermission.php');
    }

    ?>