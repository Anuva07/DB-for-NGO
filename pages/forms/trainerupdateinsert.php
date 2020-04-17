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


$Beneficiary_PhoneNumber = $_POST['BeneficiaryPhoneNumber'];
$Beneficiary_EmailID = $_POST['BeneficiaryEmailID'];
$Beneficiary_HouseNumber = $_POST['BeneficiaryHouseNumber'];
$Beneficiary_RoadNumber = $_POST['BeneficiaryRoadNumber'];

$Beneficiary_City = $_POST['BeneficiaryCity'];
$Beneficiary_Country = $_POST['BeneficiaryCountry'];
$Beneficiary_PostalCode = $_POST['BeneficiaryPostalCode'];



$Beneficiary_Weight = $_POST['BeneficiaryWeight'];
$Beneficiary_Height = $_POST['BeneficiaryHeight'];



$Beneficiary_FatherOccupation = $_POST['BeneficiaryFatherOccupation'];
$Beneficiary_FatherSalary = $_POST['BeneficiaryFatherSalary'];

$Beneficiary_SpouseName = $_POST['BeneficiarySpouseName'];
$Beneficiary_SpouseProf = $_POST['BeneficiarySpouseProf'];
$Beneficiary_Anniversary = date('m/d/y', strtotime($_POST['BeneficiaryAnniversary']));
$Beneficiary_ChildrenNumber = $_POST['BeneficiaryChildrenNumber'];

$Beneficiary_PhysicalLimitation = date('m/d/y', strtotime($_POST['BeneficiaryPhysicalLimitation']));





/*
$isql="	INSERT INTO Person(Person_Id,Road,House,City,Country,Email_Id,Postal_Code,Father_Occu,Fathers_Salary,Spouse,Anniversary,ChildNum,Spouse_Prof,Height,Weight) 
		VALUES('$Ck_Personid','$Beneficiary_RoadNumber','$Beneficiary_HouseNumber','$Beneficiary_City','$Beneficiary_Country','$Beneficiary_EmailID','$Beneficiary_PostalCode','$Beneficiary_FatherOccupation','$Beneficiary_FatherSalary','$Beneficiary_SpouseName',to_date('".$Beneficiary_Anniversary."','MM/DD/YY'),'$Beneficiary_ChildrenNumber','$Beneficiary_SpouseProf','$Beneficiary_Height','$Beneficiary_Weight')";
*/
$isql = "UPDATE Person SET Road='$Beneficiary_RoadNumber',House='$Beneficiary_HouseNumber' ,City='$Beneficiary_City',Country='$Beneficiary_Country',Email_Id='$Beneficiary_EmailID',Postal_Code='$Beneficiary_PostalCode',Father_Occu='$Beneficiary_FatherOccupation',Fathers_Salary='$Beneficiary_FatherSalary',Spouse='$Beneficiary_SpouseName',Anniversary=to_date('".$Beneficiary_Anniversary."','MM/DD/YY'),ChildNum='$Beneficiary_ChildrenNumber',Spouse_Prof='$Beneficiary_SpouseProf',Height='$Beneficiary_Height',Weight='$Beneficiary_Weight' WHERE Person_Id='$Beneficiary_IDNumber'";

/*
$isql1="INSERT INTO Beneficiaries(Person_Id,Limitations,Present_status,Blood_Pressure,Sugar_Level) VALUES('$Ck_Personid','$Beneficiary_PhysicalLimitation','$Beneficiary_PresentStatus','$Beneficiary_BloodPressure','$Beneficiary_SugarLevel')";
*/

$isql1="UPDATE Trainer SET End_date=to_date('".$Beneficiary_PhysicalLimitation."','MM/DD/YY') WHERE Person_Id='$Beneficiary_IDNumber'";

/*
$isql2="INSERT INTO Phone(Person_Id,Phone) VALUES('$Ck_Personid','$Beneficiary_PhoneNumber')";
*/

$isql2="UPDATE Phone SET Phone='$Beneficiary_PhoneNumber' WHERE Person_Id='$Beneficiary_IDNumber'";


$stmt = oci_parse($connection,$isql);
$stmt1 = oci_parse($connection, $isql1);
$stmt2 = oci_parse($connection, $isql2);

$rc=oci_execute($stmt);
$rc1 = oci_execute($stmt1);
$rc2 = oci_execute($stmt2);


	if(!$rc && !$rc1 && !$rc2)
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

