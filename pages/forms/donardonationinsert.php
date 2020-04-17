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

$Ck_Personid = $_POST['CkPersonid'];


$Donar_Type = $_POST['DonarType'];
$Donation_Type = $_POST['DonationType'];
$D_oD = date('m/d/y', strtotime($_POST['DoD']));
$D_A = $_POST['DA'];



$isql1="INSERT INTO Donar(Person_Id,Type_of_Donar,Donation_Type,Date_of_Donation,Donation_Amount) VALUES('$Ck_Personid','$Donar_Type','$Donation_Type',to_date('".$D_oD."','MM/DD/YY'),'$D_A')";


$stmt1 = oci_parse($connection, $isql1);



$rc1 = oci_execute($stmt1);


	if(!$rc1 )
	{
		header('Location:http://localhost/test/DbProject/pages/examples/error.php');
		$e=oci_error($stmt);
		var_dump($e);
	}else{
		header('Location:http://localhost/test/DbProject/pages/examples/successful.php');
	}


	oci_commit($connection);

oci_free_statement($stmt);

//header('Location:http://localhost/test/DbProject/pages/forms/beneficiary_input.html');
?>

