<!DOCTYPE html>
<html>
<head>
	<title>fetch data</title>
</head>
<body>


	<?php
	$link = mysqli_connect("localhost", "root", "harekrishna", "NGO");
	$sql = "SELECT * FROM EmployeeTable";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
            echo "<table>";
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
    

    mysqli_close($link);
	?>



</body>
</html>