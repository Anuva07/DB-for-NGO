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




$Ck_Personid = $_POST['CkPersonid'];


	$isql="DELETE  FROM Publication WHERE Pub_id='$Ck_Personid'";




$stmt = oci_parse($connection,$isql);
$rc=oci_execute($stmt);
	if(!$rc)
	{
		header('Location:http://localhost/test/DbProject/pages/examples/error.php');
	$e=oci_error($stmt);
	var_dump($e);
	}else{
		header('Location:http://localhost/test/DbProject/pages/examples/successful.php');
	}

	oci_commit($connection);

oci_free_statement($stmt);

//header('Location:http://localhost/test/DbProject/pages/forms/microcredit_delete.html');
?>

