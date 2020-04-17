
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>



    <?php

    $link = mysqli_connect("localhost", "root", "harekrishna", "NGO");

     

    // Check connection

    if($link === false){

        die("ERROR: Could not connect. " . mysqli_connect_error());

    }

     

    // Escape user inputs for security

    $first_name = mysqli_real_escape_string($link, $_REQUEST['inputEname']);

    $last_name = mysqli_real_escape_string($link, $_REQUEST['inputEaddr']);


    $sql = "INSERT INTO EmployeeTable (EmployeeName, EmployeeAddr) VALUES ('$first_name', '$last_name')";

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


</body>
</html>