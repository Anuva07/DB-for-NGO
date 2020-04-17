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

$Beneficiary_IDNumber = $_POST['BeneficiaryIDNumber'];



$Beneficiary_HouseNumber = $_POST['BeneficiaryHouseNumber'];
$Beneficiary_RoadNumber = $_POST['BeneficiaryRoadNumber'];

$Beneficiary_City = $_POST['BeneficiaryCity'];
$Beneficiary_Country = $_POST['BeneficiaryCountry'];
$Beneficiary_PostalCode = $_POST['BeneficiaryPostalCode'];

$Beneficiary_Weight = $_POST['BeneficiaryWeight'];
$Beneficiary_Height = $_POST['BeneficiaryHeight'];
$Beneficiary_Height1 = $_POST['BeneficiaryHeight1'];


$Beneficiary_FatherOccupation = $_POST['BeneficiaryFatherOccupation'];
$Beneficiary_FatherSalary = $_POST['BeneficiaryFatherSalary'];

$Beneficiary_SpouseName = $_POST['BeneficiarySpouseName'];
$Beneficiary_Anniversary = date('m/d/y', strtotime($_POST['BeneficiaryAnniversary']));






/*
$isql="	INSERT INTO Person(Person_Id,Road,House,City,Country,Email_Id,Postal_Code,Father_Occu,Fathers_Salary,Spouse,Anniversary,ChildNum,Spouse_Prof,Height,Weight) 
		VALUES('$Ck_Personid','$Beneficiary_RoadNumber','$Beneficiary_HouseNumber','$Beneficiary_City','$Beneficiary_Country','$Beneficiary_EmailID','$Beneficiary_PostalCode','$Beneficiary_FatherOccupation','$Beneficiary_FatherSalary','$Beneficiary_SpouseName',to_date('".$Beneficiary_Anniversary."','MM/DD/YY'),'$Beneficiary_ChildrenNumber','$Beneficiary_SpouseProf','$Beneficiary_Height','$Beneficiary_Weight')";
*/
$isql = "UPDATE Project SET Road='$Beneficiary_RoadNumber',House='$Beneficiary_HouseNumber' ,City='$Beneficiary_City',Country='$Beneficiary_Country',Postal_Code='$Beneficiary_PostalCode',End_Date=to_date('".$Beneficiary_Anniversary."','MM/DD/YY'),Proj_Coord='$Beneficiary_FatherOccupation',Budget='$Beneficiary_FatherSalary',P_Fund='$Beneficiary_SpouseName' WHERE P_Id='$Beneficiary_IDNumber'";

/*
$isql1="INSERT INTO Beneficiaries(Person_Id,Limitations,Present_status,Blood_Pressure,Sugar_Level) VALUES('$Ck_Personid','$Beneficiary_PhysicalLimitation','$Beneficiary_PresentStatus','$Beneficiary_BloodPressure','$Beneficiary_SugarLevel')";
*/

$isql1="UPDATE Health_Proj SET Given_service='$Beneficiary_Weight',Donated_mat='$Beneficiary_Height',Amount_mat='$Beneficiary_Height1' WHERE P_Id='$Beneficiary_IDNumber'";

/*
$isql2="INSERT INTO Phone(Person_Id,Phone) VALUES('$Ck_Personid','$Beneficiary_PhoneNumber')";
*/



$stmt = oci_parse($connection,$isql);

$stmt2 = oci_parse($connection, $isql1);

$rc=oci_execute($stmt);

$rc2 = oci_execute($stmt2);


	if(!$rc && !$rc2)
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

