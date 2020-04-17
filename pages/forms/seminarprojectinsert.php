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
$SeminarProject_Name = $_POST['SeminarProjectName'];
$SeminarProject_StartDate = date('m/d/y', strtotime($_POST['SeminarProjectStartDate']));
$SeminarProject_EndDate = date('m/d/y', strtotime($_POST['SeminarProjectEndDate']));
$SeminarProject_Coordinator = $_POST['SeminarProjectCoordinator'];
$SeminarProject_Budget = $_POST['SeminarProjectBudget'];
$SeminarProject_Fund = $_POST['SeminarProjectFund'];


$SeminarProject_House = $_POST['SeminarProjectHouse'];
$SeminarProject_Road = $_POST['SeminarProjectRoad'];
$SeminarProject_City = $_POST['SeminarProjectCity'];
$SeminarProject_Country = $_POST['SeminarProjectCountry'];
$SeminarProject_PostalCode = $_POST['SeminarProjectPostalCode'];


$Seminar_Subject = $_POST['SeminarSubject'];
$Seminar_ChiefGuest = $_POST['SeminarChiefGuest'];
$Seminar_SpecialGuest = $_POST['SeminarSpecialGuest'];


$isql="INSERT INTO Project(P_Id,P_name,Start_Date,End_Date,Road,House,City,Country,Postal_Code,Budget,Proj_Coord,P_Fund)
	 VALUES(projectid_sequence.nextval,'$SeminarProject_Name',to_date('".$SeminarProject_StartDate."','MM/DD/YY'),to_date('".$SeminarProject_EndDate."','MM/DD/YY'),'$SeminarProject_Road','$SeminarProject_House','$SeminarProject_City','$SeminarProject_Country','$SeminarProject_PostalCode','$SeminarProject_Budget','$SeminarProject_Coordinator','$SeminarProject_Fund')";

$isql1="INSERT INTO Women_Emp_Seminar(P_Id,Seminar_Subj,Chief_Guest,Special_Guest)
	 VALUES(projectid_sequence.currval,'$Seminar_Subject','$Seminar_ChiefGuest','$Seminar_SpecialGuest')";



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

