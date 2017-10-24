<!DOCTYPE html>
<html>
<head>	
<style type="text/css">
	div {
		margin-top: 20px;
		margin-bottom: 20px;
	}

	table{
		border: 1px solid black;
	}

	td{
		border: 1px solid black;
		padding: 10px;
	}

	th {
		background: red;
		border: 1px solid black;
	}

    tr:nth-child(even){background-color: #f2f2f2}
    tr:hover {background-color: #FAF500;}
    

</style>


</head>
<body>


<?php 

//establish connection to server for part 4
$server = "localhost";
$username = "root";
$password = "root";
$db = "sakila";

$conn = mysqli_connect($server, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}



//received data
$counter = 1;
$arrTwo = ["first_name","last_name","email","address","city"];

echo "<table>";

//part 3/4

//for each loop and for loop cycle through data querying the database
//checking for matches in respected tables
//implemented through if else chain inside inner loop
//using POST array to access variables from previous form
// triple equals is used for NULL case in the if statements
foreach($arrTwo as $index){
	echo "<tr>";
	for($i = 0; $i<1; $i++){
		echo "<th>". $index ."</th>";
		echo "<td>". $_POST[$index] . "</td>";	
		if($counter == 1){
			$sql = "SELECT first_name
			from customer
			where first_name like '". $_POST[$index] ."'";

			$result = mysqli_query($conn, $sql);

			if($result->num_rows === 0){

				echo "<td>new</td>";	

			}else{

				echo "<td>exist</td>";
			}

		} elseif($counter == 2){

			$sql = "SELECT last_name
			from customer
			where last_name like '". $_POST[$index] ."'";

			$result = mysqli_query($conn, $sql);

			if($result->num_rows === 0){

				echo "<td>new</td>";	

			}else{

				echo "<td>exist</td>";
			}

		} elseif($counter == 3){

			$sql = "SELECT email
			from customer
			where email like '". $_POST[$index] ."'";

			$result = mysqli_query($conn, $sql);

			if($result->num_rows === 0){

				echo "<td>new</td>";	

			}else{

				echo "<td>exist</td>";
			}

		} elseif($counter == 4){

			$sql = "SELECT address
			from address
			where address like '". $_POST[$index] ."'";

			$result = mysqli_query($conn, $sql);

			if($result->num_rows === 0){

				echo "<td>new</td>";	

			}else{

				echo "<td>exist</td>";
			}

		} else {

			$sql = "SELECT city
			from city
			where first_name like '". $_POST[$index] ."'";

			$result = mysqli_query($conn, $sql);

			if($result->num_rows === 0){

				echo "<td>new</td>";	

			}else{

				echo "<td>exist</td>";
			}


		}

	}
	$counter++;
	echo "</tr>";
}

echo "</table>";

//Close the connection.
mysqli_close($conn);

?>



</body>
</html>