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
$Beneficiary_LastName = $_POST['BeneficiaryLastName'];
$Beneficiary_DOB = date('m/d/y', strtotime($_POST['BeneficiaryDOB']));
$Beneficiary_Nationality = $_POST['BeneficiaryNationality'];
$Beneficiary_Gender = $_POST['BeneficiaryGender'];
$Beneficiary_Religion = $_POST['BeneficiaryReligion'];
//image


$Beneficiary_PhoneNumber = $_POST['BeneficiaryPhoneNumber'];
$Beneficiary_EmailID = $_POST['BeneficiaryEmailID'];
$Beneficiary_HouseNumber = $_POST['BeneficiaryHouseNumber'];
$Beneficiary_RoadNumber = $_POST['BeneficiaryRoadNumber'];
$Beneficiary_City = $_POST['BeneficiaryCity'];
$Beneficiary_Country = $_POST['BeneficiaryCountry'];
$Beneficiary_PostalCode = $_POST['BeneficiaryPostalCode'];


$Beneficiary_NID = $_POST['BeneficiaryNID'];
$Beneficiary_BirthCertificate = $_POST['BeneficiaryBirthCertificate'];
$Beneficiary_DrivingLicense = $_POST['BeneficiaryDrivingLicense'];
$Beneficiary_Passport = $_POST['BeneficiaryPassport'];
$Beneficiary_TIN = $_POST['BeneficiaryTIN'];
$Beneficiary_Weight = $_POST['BeneficiaryWeight'];
$Beneficiary_Height = $_POST['BeneficiaryHeight'];
$Beneficiary_BloodGrp = $_POST['BeneficiaryBloodGrp'];


$Beneficiary_FatherName = $_POST['BeneficiaryFatherName'];
$Beneficiary_FatherOccupation = $_POST['BeneficiaryFatherOccupation'];
$Beneficiary_FatherSalary = $_POST['BeneficiaryFatherSalary'];
$Beneficiary_MotherName = $_POST['BeneficiaryMotherName'];
$Beneficiary_SpouseName = $_POST['BeneficiarySpouseName'];
$Beneficiary_SpouseProf = $_POST['BeneficiarySpouseProf'];
$Beneficiary_Anniversary = date('m/d/y', strtotime($_POST['BeneficiaryAnniversary']));
$Beneficiary_ChildrenNumber = $_POST['BeneficiaryChildrenNumber'];


$Beneficiary_BankName = $_POST['BeneficiaryBankName'];
$Beneficiary_BankAddress = $_POST['BeneficiaryBankAddress'];
$Beneficiary_Account = $_POST['BeneficiaryAccount'];


$Employee_JoinDate = date('m/d/y', strtotime($_POST['EmployeeJoinDate']));
$Employee_RetireDate = date('m/d/y', strtotime($_POST['EmployeeRetireDate'])); 
$Employee_Rank = $_POST['EmployeeRank'];



$isql="	INSERT INTO Person(Person_Id,F_Name,L_Name,DOB,Road,House,City,Country,NID,Div_license,Passport,TIN,Gender,Email_Id,Religion,Nationality,Birth_Certificate,Postal_Code,Bank_acct_no,Bank_address,Father_Name,Mother_Name,Father_Occu,Fathers_Salary,Spouse,Anniversary,ChildNum,Spouse_Prof,Blood_gp,Height,Weight) 
		VALUES(personid_sequence.nextval,'$Beneficiary_FirstName','$Beneficiary_LastName',to_date('".$Beneficiary_DOB."','MM/DD/YY'),'$Beneficiary_RoadNumber','$Beneficiary_HouseNumber','$Beneficiary_City','$Beneficiary_Country','$Beneficiary_NID','$Beneficiary_DrivingLicense','$Beneficiary_Passport','$Beneficiary_TIN','$Beneficiary_Gender','$Beneficiary_EmailID','$Beneficiary_Religion','$Beneficiary_Nationality','$Beneficiary_BirthCertificate','$Beneficiary_PostalCode','$Beneficiary_Account','$Beneficiary_BankAddress','$Beneficiary_FatherName','$Beneficiary_MotherName','$Beneficiary_FatherOccupation','$Beneficiary_FatherSalary','$Beneficiary_SpouseName',to_date('".$Beneficiary_Anniversary."','MM/DD/YY'),'$Beneficiary_ChildrenNumber','$Beneficiary_SpouseProf','$Beneficiary_BloodGrp','$Beneficiary_Height','$Beneficiary_Weight')";

$isql1="INSERT INTO Employee(Person_Id,Position_rank,Join_date,End_Date) VALUES(personid_sequence.currval,'$Employee_Rank',to_date('".$Employee_JoinDate."','MM/DD/YY'),to_date('".$Employee_RetireDate."','MM/DD/YY'))";

$isql2="INSERT INTO Phone(Person_Id,Phone) VALUES(personid_sequence.currval,'$Beneficiary_PhoneNumber')";


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

