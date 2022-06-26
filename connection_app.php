
<html> <h1> Connection test class retrive all data </h1> </html> 
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
echo "Connected successfully : $username host: $servername credentials: $password";

echo "<br><br>";
echo "Get application users : <br>";
$sql = "SELECT * FROM application.users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["user_id"]. " - Name: " . $row["name"]. " - Password " . $row["password"]. " - Email " . $row["email"] . "<br>";
  }
} else {
  echo "0 results";
}

echo "<br><br>";
echo "Get application data : <br>";
$sql = "SELECT * FROM application.data";
$result2 = $conn->query($sql);

if ($result2->num_rows > 0) {
  // output data of each row
  while($row = $result2->fetch_assoc()) {
    echo "id: " . $row["data_id"]. " - Name: " . $row["name"]. " - tittle " . $row["title"]. " - description " . $row["description"] . "<br>";
  }
} else {
  echo "0 results";
}

$conn->close();


?>
