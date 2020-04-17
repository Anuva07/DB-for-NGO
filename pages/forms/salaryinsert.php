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
$Beneficiary_FirstName = $_POST['BeneficiaryFirstName'];
$B_Date = date('m/d/y', strtotime($_POST['BDate']));
$B_Name = $_POST['BName'];
$B_Pay = $_POST['BPay'];
$H_A = $_POST['HA'];
$U_A = $_POST['UA'];
$t_ax = $_POST['tax'];
$m_a = $_POST['ma'];
$p_fc = $_POST['pfc'];

$isql="	INSERT INTO Salary(Account,Bonus_Amount,B_Date,Bonus_name,Basic_Pay,House_Alice,Utsob_Alice,Govt_Tax,Med_Alice,Prov_Fund_Cutting) 
		VALUES('$Ck_Personid','$Beneficiary_FirstName',to_date('".$B_Date."','MM/DD/YY'),'$B_Name','$B_Pay','$H_A','$U_A','$t_ax','$m_a','$p_fc')";


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

//header('Location:http://localhost/test/DbProject/pages/forms/salary_input.php');
?>

