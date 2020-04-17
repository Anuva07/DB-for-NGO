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
//$Publication_ID = $_POST['PublicationID'];
$Publication_Name = $_POST['PublicationName'];
$Publisher_Name = $_POST['PublisherName'];
$Publication_Type = $_POST['PublicationType'];
$Publication_Date = date('m/d/y', strtotime($_POST['PublicationDate']));
$isql="INSERT INTO Publication(Pub_id,Pub_name,Publisher,Pub_date,Pub_type) VALUES(publicationid_sequence.nextval,'$Publication_Name','$Publisher_Name',to_date('".$Publication_Date."','MM/DD/YY'),'$Publication_Type')";
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

//header('Location:http://localhost/test/DbProject/pages/forms/publication_input.html');
?>

