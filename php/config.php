<?php 
	$localhost = "127.0.0.1"; 
	$username = "root"; 
	$password = "password"; 
	$dbname = "creditmanagement"; 
	 
	// create connection 
	$connect = new mysqli($localhost, $username, $password, $dbname); 
	 
	// check connection 
	if($connect->connect_error) {
	    die("connection failed : " . $connect->connect_error);
	}

	// $result = mysqli_query($connect, "SELECT * FROM userDetails");

	// echo "<table border='1'>
	// <tr>
	// <th>Name</th>
	// <th>Country</th>
	// <th>Credit</th>
	// </tr>";

	// while($row = mysqli_fetch_array($result))
	// {
	// echo "<button onclick='showDetails()''><tr>"
	// ;
	// echo "<td>" . $row['userName'] . "</td>";
	// echo "<td>" . $row['userCountry'] . "</td>";
	// echo "<td>" . $row['userCredit'] . "</td>";
	// echo "</tr></button>";
	// }
	// echo "</table>";

	// mysqli_close($connect);

 ?>