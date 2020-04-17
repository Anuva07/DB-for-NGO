<?php

$username = 'AKASHPODDAR';
$password = 'akash';
$connection_string = 'localhost/XE';
$connection = oci_connect($username,$password,$connection_string);


if($connection)
  echo "Connection succeeded";
else
{
  echo "Connection failed";
        $err = oci_error();
  trigger_error(htmlentities($err['message'], ENT_QUOTES), E_USER_ERROR); 
}

$isql="UPDATE Login_Index SET Login_Index=0";
                        $stmt = oci_parse($connection,$isql);
                        $rc=oci_execute($stmt);
                        if (oci_execute($stmt)){
                            header('Location:http://localhost/test/DbProject/pages/examples/login.php');
                        }
                          if(!$rc)
                          {
                          $e=oci_error($stmt);
                          var_dump($e);
                          }

                          oci_commit($connection);


//header('Location:http://localhost/test/DbProject/pages/examples/login.php');
?>



