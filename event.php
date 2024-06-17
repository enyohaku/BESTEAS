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

$store_name = $_GET['store_name']; // Get the store name from the GET request

// Prepare a parameterized SQL query
$stmt = $conn->prepare("SELECT * FROM store WHERE name = ?");
$stmt->bind_param("s", $store_name);

$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows > 0) {
  // Output data of each row
  while($row = $result->fetch_assoc()) {
    // Display the shop info
    echo "store_name: " . $row["store_name"]. "<br>";
    echo "store_location: " . $row["store_location"]. "<br>";
    echo "product_name: " . $row["product_name"]. "<br>";
    echo "product_info: " . $row["product_info"]. "<br>";
    echo "product_photo: " . $row["product_photo"]. "<br>";
    // Add more columns as needed
  }
} else {
  echo "No results";
}

$stmt->close();
$conn->close();
?>

<!-- Include your tasting journal form here -->
<?php include 'tastingjournal.html'; ?>