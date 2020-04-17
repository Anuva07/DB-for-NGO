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
$Beneficiary_Nationality = $_POST['BeneficiaryNationality'];
$Beneficiary_Nationality1 = $_POST['BeneficiaryNationality1'];



$Beneficiary_PhoneNumber = $_POST['BeneficiaryPhoneNumber'];
$Beneficiary_EmailID = $_POST['BeneficiaryEmailID'];
$Beneficiary_HouseNumber = $_POST['BeneficiaryHouseNumber'];
$Beneficiary_RoadNumber = $_POST['BeneficiaryRoadNumber'];
$Beneficiary_City = $_POST['BeneficiaryCity'];
$Beneficiary_Country = $_POST['BeneficiaryCountry'];
$Beneficiary_PostalCode = $_POST['BeneficiaryPostalCode'];




$isql="	INSERT INTO Branch(Br_Id,Br_Name,O_Fund,Br_Senior,Road,House,City,Country,Postal_Code,Email_Id,Phone) 
		VALUES(branchid_sequence.nextval,'$Beneficiary_FirstName','$Beneficiary_Nationality','$Beneficiary_Nationality1','$Beneficiary_RoadNumber','$Beneficiary_HouseNumber','$Beneficiary_City','$Beneficiary_Country','$Beneficiary_PostalCode','$Beneficiary_EmailID','$Beneficiary_PhoneNumber')";


$stmt = oci_parse($connection,$isql);
//$stmt1 = oci_parse($connection, $isql1);
//$stmt2 = oci_parse($connection, $isql2);

$rc=oci_execute($stmt);
//$rc1 = oci_execute($stmt1);
//$rc2 = oci_execute($stmt2);

	if(!$rc)
	{
		header('Location:http://localhost/test/DbProject/pages/examples/error.php');
		$e=oci_error($stmt);
		var_dump($e);
	}else{
		header('Location:http://localhost/test/DbProject/pages/examples/successful.php');
	}
	/*
	if(!$rc1)
	{
	$e1=oci_error($stmt1);
	var_dump($e1);
	}
	if(!$rc2)
	{
	$e2=oci_error($stmt2);
	var_dump($e2);
	}
	*/

	oci_commit($connection);

oci_free_statement($stmt);

//header('Location:http://localhost/test/DbProject/pages/forms/branchy_input.html');
?>

