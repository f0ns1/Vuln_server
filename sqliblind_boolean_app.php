<html> <h1> SQL injection  </h1> </html> 
<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

?>
<html> 
<body> 
<form action="/sqliblind_boolean_app.php" method="get">
  <label for="fname">data for user:</label>
  <input type="text" id="user" name="user"><br><br>
  <input type="submit" value="Submit">
</form>

</body>

</html>
<?php
echo "<br><br>";
if(isset($_GET["user"])){
	$input =  $_GET["user"];
	echo "Get application data for user : $input <br>";
	$sql = "SELECT * FROM application.data where title = '".$input."'";
	echo "<br> vulnerable Query: ".$sql;
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
  		echo "<br> Results found for first query! <br>";
  		$sql = "SELECT email FROM application.users where name = 'admin'";
  		echo "<br>Second query not vulnerable : $sql";
  		$result2 = $conn->query($sql);
  		while($row = $result2->fetch_assoc()) {
  			echo  "<br> Email for user admin: ";
  			echo  "<br>".implode(",", $row);
  			echo  "<br>";	
  		}
  	} else {
  		echo "<br>0 results";
	}
}
?>
