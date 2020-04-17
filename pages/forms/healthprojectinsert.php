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
$HealthProject_Name = $_POST['HealthProjectName'];
$HealthProject_Name = $_POST['HealthProjectName'];
$HealthProject_StartDate = date('m/d/y', strtotime($_POST['HealthProjectStartDate']));
$HealthProject_EndDate = date('m/d/y', strtotime($_POST['HealthProjectEndDate']));
$HealthProject_Coordinator = $_POST['HealthProjectCoordinator'];
$HealthProject_Budget = $_POST['HealthProjectBudget'];
$HealthProject_Fund = $_POST['HealthProjectFund'];


$HealthProject_House = $_POST['HealthProjectHouse'];
$HealthProject_Road = $_POST['HealthProjectRoad'];
$HealthProject_City = $_POST['HealthProjectCity'];
$HealthProject_Country = $_POST['HealthProjectCountry'];
$HealthProject_PostalCode = $_POST['HealthProjectPostalCode'];


$HealthProject_Service = $_POST['HealthProjectService'];
$HealthProject_DonatedMat = $_POST['HealthProjectDonatedMat'];
$HealthProject_TotalMat = $_POST['HealthProjectTotalMat'];




$isql="INSERT INTO Project(P_Id,P_name,Start_Date,End_Date,Road,House,City,Country,Postal_Code,Budget,Proj_Coord,P_Fund)
	 VALUES(projectid_sequence.nextval,'$HealthProject_Name',to_date('".$HealthProject_StartDate."','MM/DD/YY'),to_date('".$HealthProject_EndDate."','MM/DD/YY'),'$HealthProject_Road','$HealthProject_House','$HealthProject_City','$HealthProject_Country','$HealthProject_PostalCode','$HealthProject_Budget','$HealthProject_Coordinator','$HealthProject_Fund')";

$isql1="INSERT INTO Health_Proj(P_Id,Given_service,Donated_mat,Amount_mat)
	 VALUES(projectid_sequence.currval,'$HealthProject_Service','$HealthProject_DonatedMat','$HealthProject_TotalMat')";



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

