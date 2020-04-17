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

//$HealthProject_Id = $_POST['HealthProjectId'];
$MicrocreditProject_Name = $_POST['MicrocreditProjectName'];
$MicrocreditProject_StartDate = date('m/d/y', strtotime($_POST['MicrocreditProjectStartDate']));
$MicrocreditProject_EndDate = date('m/d/y', strtotime($_POST['MicrocreditProjectEndDate']));
$MicrocreditProject_Coordinator = $_POST['MicrocreditProjectCoordinator'];
$MicrocreditProject_Budget = $_POST['MicrocreditProjectBudget'];
$MicrocreditProject_Fund = $_POST['MicrocreditProjectFund'];


$MicrocreditProject_House = $_POST['MicrocreditProjectHouse'];
$MicrocreditProject_Road = $_POST['MicrocreditProjectRoad'];
$MicrocreditProject_City = $_POST['MicrocreditProjectCity'];
$MicrocreditProject_Country = $_POST['MicrocreditProjectCountry'];
$MicrocreditProject_PostalCode = $_POST['MicrocreditProjectPostalCode'];


$MicrocreditProject_CreditRate = $_POST['MicrocreditProjectCreditRate'];
$MicrocreditProject_InstallmentNumber = $_POST['MicrocreditProjectInstallmentNumber'];
$MicrocreditProject_CreditDuration = $_POST['MicrocreditProjectCreditDuration'];
$MicrocreditProject_TotalCredit = $_POST['MicrocreditProjectTotalCredit'];



$isql="INSERT INTO Project(P_Id,P_name,Start_Date,End_Date,Road,House,City,Country,Postal_Code,Budget,Proj_Coord,P_Fund)
	 VALUES(projectid_sequence.nextval,'$MicrocreditProject_Name',to_date('".$MicrocreditProject_StartDate."','MM/DD/YY'),to_date('".$MicrocreditProject_EndDate."','MM/DD/YY'),'$MicrocreditProject_Road','$MicrocreditProject_House','$MicrocreditProject_City','$MicrocreditProject_Country','$MicrocreditProject_PostalCode','$MicrocreditProject_Budget','$MicrocreditProject_Coordinator','$MicrocreditProject_Fund')";

$isql1="INSERT INTO W_Micro_Credit(P_Id,Num_Installment,Duration,Rate,Amount)
	 VALUES(projectid_sequence.currval,'$MicrocreditProject_InstallmentNumber','$MicrocreditProject_CreditDuration','$MicrocreditProject_CreditRate','$MicrocreditProject_TotalCredit')";



$stmt = oci_parse($connection,$isql);
$stmt1 = oci_parse($connection, $isql1);

$rc=oci_execute($stmt);
$rc1 = oci_execute($stmt1);

	if(!$rc && !$rc1)
	{
		header('Location:http://localhost/test/DbProject/pages/examples/error.php');
		$e=oci_error($stmt);
		var_dump($e);
	}else{
		header('Location:http://localhost/test/DbProject/pages/examples/successful.php');
	}
	

	oci_commit($connection);



oci_free_statement($stmt);
oci_free_statement($stmt1);

//header('Location:http://localhost/test/DbProject/pages/forms/healthproject_input.html');
?>

