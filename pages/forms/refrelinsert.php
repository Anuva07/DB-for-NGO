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
$Beneficiary_FirstName = $_POST['BeneficiaryFirstName'];

$Beneficiary_PhoneNumber = $_POST['BeneficiaryPhoneNumber'];
$Beneficiary_EmailID = $_POST['BeneficiaryEmailID'];
$Beneficiary_HouseNumber = $_POST['BeneficiaryHouseNumber'];
$Beneficiary_RoadNumber = $_POST['BeneficiaryRoadNumber'];

$Beneficiary_City = $_POST['BeneficiaryCity'];
$Beneficiary_Country = $_POST['BeneficiaryCountry'];
$Beneficiary_PC = $_POST['BeneficiaryPC'];

$Ck_Personid = $_POST['CkPersonid'];



$isql="	INSERT INTO Ref_relation(Person_Id,Ref_id,Ref_name,Ref_email,Ref_Phone_No,RefAddress) 
		VALUES('$Ck_Personid',refid_sequence.nextval,'$Beneficiary_FirstName','$Beneficiary_EmailID','$Beneficiary_PhoneNumber',RefAddr('$Beneficiary_RoadNumber','$Beneficiary_HouseNumber','$Beneficiary_City','$Beneficiary_Country','$Beneficiary_PC'))";






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

//header('Location:http://localhost/test/DbProject/pages/forms/refrel_input.php');
?>

