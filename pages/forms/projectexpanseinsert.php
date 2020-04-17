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

$Ck_Personid1 = $_POST['CkPersonid1'];
$Beneficiary_DOB = date('m/d/y', strtotime($_POST['BeneficiaryDOB']));
$H_R = $_POST['HR'];
$el_ec = $_POST['elec'];
$w_at = $_POST['wat'];
$int_ernet = $_POST['internet'];
$o_th = $_POST['oth'];


$isql="	INSERT INTO Expenditure(ExpTrans_Id,Exp_date,House_Rent,Electricity,Water,Internet,Others) 
		VALUES(exptransid_sequence.nextval,to_date('".$Beneficiary_DOB."','MM/DD/YY'),'$H_R','$el_ec','$w_at','$int_ernet','$o_th')";

$isql1="INSERT INTO Project_Expenditure(P_Id,ExpTrans_Id) VALUES('$Ck_Personid1',exptransid_sequence.currval)";




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

//header('Location:http://localhost/test/DbProject/pages/forms/projectexpanse_input.html');
?>

