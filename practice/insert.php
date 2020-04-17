
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



    <?php

    
    //for oracle connection
    //$link = oci_connect("username","password","localhost/orcl");

    session_start();
    require 'connection.php';


     

    // Check connection

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

     

    // Escape user inputs for security

    $first_name = mysqli_real_escape_string($link, $_REQUEST['first_name']);


    $last_name = mysqli_real_escape_string($link, $_REQUEST['last_name']);


    $sql = "INSERT INTO EmployeeTable (EmployeeName, EmployeeAddr) VALUES ('$first_name', '$last_name')";
    //here I have created a table named EmployeeTable with two columns. columns are EmployeeName and EmployeeAddr

if(mysqli_query($link, $sql)){

   

} else{

    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);

}

?>

<?php
$sql = "SELECT * FROM EmployeeTable";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
        	
            echo "<table border=3>";
                echo "<tr>";
                    echo "<th>EmployeeName</th>";
                    echo "<th>EmployeeAddr</th>";
                echo "</tr>";
            while($row = mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>" . $row['EmployeeName'] . "</td>";
                    echo "<td>" . $row['EmployeeAddr'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else{
            echo "No records matching your query were found.";
        }
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
    }


 

// close connection

mysqli_close($link);

    ?>

    <form action="index.php">
        <button>Add more data</button>
    </form>

</body>
</html>