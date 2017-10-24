<!DOCTYPE html>
<html>
<head>	
<style>
	div {
		margin-top: 20px;
		margin-bottom: 20px;
	}
</style>

<script>
function validateForm() {
    // you can write a code for validating your forms (if you want).
}
</script>

</head>
<body>

<?php 

$server = "localhost";
$username = "root";
$password = "root";
$db = "sakila";

$conn = mysqli_connect($server, $username, $password, $db);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
 

 //part 1 query
$sql = "SELECT first_name,last_name,email,address,city
from customer as c 
JOIN address as a on c.address_id = a.address_id 
JOIN city as t on t.city_id = a.city_id
ORDER BY c.last_name
LIMIT 1 OFFSET 9";


$result = mysqli_query($conn, $sql);

//results stored into associative array
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

//part 2
// Generating a form by making use of a loop
$arr = ["first name:", "last name:", "email:", "address:", "city:"];
$arrTwo = ["first_name","last_name","email","address","city"];

//form creation
echo "<form name='info' action='form_display.php' method='POST'>";

for($i = 0; $i< count($arr); $i++){

    echo "".$arr[$i]."<input type='text' name=". $arrTwo[$i] . " value='" .$row[$arrTwo[$i]]. "'><br>";

}

echo "<input type='submit' >";
echo "</form>";


//Close the connection.
mysqli_close($conn);
?>

</body>
</html>