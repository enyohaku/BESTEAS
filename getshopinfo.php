<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "besteas"; // Replace with your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM store"; // Replace with your SQL query
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    echo "store_name: " . $row["store_name"]. "<br>"; // Replace with your column names
    echo "store_location: " . $row["store_location"]. "<br>";
    echo "product_name: " . $row["product_name"]. "<br>";
    echo "product_info: " . $row["product_info"]. "<br>";
    echo "product_photo: " . $row["product_photo"]. "<br>";
    
  }
} else {
  echo "No results";
}

$conn->close();
?>