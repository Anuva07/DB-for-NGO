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
$Deletion_Type = $_POST['DeletionType'];
$Deletion_Name = $_POST['DeletionName'];


if ($Deletion_Type == 'Publication') {
	$isql="DELETE  FROM Publication WHERE Pub_id='$Deletion_Name'";
}elseif ($Deletion_Type == 'HealthProject') {
    
}


//$isql="DELETE  FROM Publication WHERE PublisherName='$Deletion_Name'";
$stmt = oci_parse($connection,$isql);
$rc=oci_execute($stmt);
	if (!$rc) {
    $e = oci_error($stmt);  // For oci_execute errors pass the statement handle
    var_dump($e);
}

	oci_commit($connection);

oci_free_statement($stmt);

//header('Location:http://localhost/test/DbProject/pages/forms/data_delete.html');
?>

