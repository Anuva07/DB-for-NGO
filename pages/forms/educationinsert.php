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


$Beneficiary_NID = $_POST['BeneficiaryNID'];
$Beneficiary_BirthCertificate = date('m/d/y', strtotime($_POST['BeneficiaryBirthCertificate']));
$Beneficiary_DrivingLicense = $_POST['BeneficiaryDrivingLicense'];
$Beneficiary_Passport = $_POST['BeneficiaryPassport'];
$Beneficiary_TIN = $_POST['BeneficiaryTIN'];
$Beneficiary_Weight = $_POST['BeneficiaryWeight'];
$Beneficiary_Height = $_POST['BeneficiaryHeight'];




$isql="	INSERT INTO Education_qual(Person_Id,Exam_Name,Passing_yr,ExamResult,ExamGroup,Board_University,Inst_University,ExamSession) 
		VALUES('$Ck_Personid','$Beneficiary_NID',to_date('".$Beneficiary_BirthCertificate."','MM/DD/YY'),'$Beneficiary_DrivingLicense','$Beneficiary_Passport','$Beneficiary_TIN','$Beneficiary_Weight','$Beneficiary_Height')";






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

//header('Location:http://localhost/test/DbProject/pages/forms/education_input.php');
?>

