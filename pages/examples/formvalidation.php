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
?>

<?php
$user_name = $_POST['username'];
$pass_word = $_POST['password'];

//$Start_Date = date('m/d/y HH24:MI:SS', strtotime('Current_Timestamp'));


                    $q = " SELECT password FROM Login WHERE username='$user_name'";
                    $stid = oci_parse($connection, $q);
                    oci_execute($stid);
                    while (($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                        $fp = $row[0];
                    }

                    if(strcasecmp('Admin', $user_name)==0 &&strcasecmp($fp, $pass_word)==0){
                       
                        $isql="UPDATE Login_Index SET Login_Index=1";
                        $stmt = oci_parse($connection,$isql);
                        $rc=oci_execute($stmt);
                        if (oci_execute($stmt)){
                            header('Location:http://localhost/test/DbProject');
                        }
                          if(!$rc)
                          {
                          $e=oci_error($stmt);
                          var_dump($e);
                          }

                          oci_commit($connection);
                        //header('Location:http://localhost/test/DbProject');
                        //echo "ok";    

                    }elseif (strcasecmp('Editor', $user_name)==0 &&strcasecmp($fp, $pass_word)==0) {
                        $isql="UPDATE Login_Index SET Login_Index=2";
                        $stmt = oci_parse($connection,$isql);
                        $rc=oci_execute($stmt);
                        if (oci_execute($stmt)){
                            header('Location:http://localhost/test/DbProject');
                        }
                          if(!$rc)
                          {
                          $e=oci_error($stmt);
                          var_dump($e);
                          }

                          oci_commit($connection);
                        //header('Location:http://localhost/test/DbProject/index.php');
                    }
                    elseif (strcasecmp('Beneficiary', $user_name)==0 &&strcasecmp($fp, $pass_word)==0) {
                        $isql="UPDATE Login_Index SET Login_Index=3";
                        $stmt = oci_parse($connection,$isql);
                        $rc=oci_execute($stmt);
                        if (oci_execute($stmt)){
                            header('Location:http://localhost/test/DbProject/bindex.php');
                        }
                          if(!$rc)
                          {
                          $e=oci_error($stmt);
                          var_dump($e);
                          }

                          oci_commit($connection);
                        //header('Location:http://localhost/test/DbProject/index.php');
                    }
                    else{
                        
                        header('Location:http://localhost/test/DbProject/pages/examples/login.php');
                    }

                    
                    
                    oci_close($connection);


//header('Location:http://localhost/test/DbProject/pages/forms/publication_input.html');
?>



