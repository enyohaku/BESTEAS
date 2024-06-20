<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "besteas"; 
// 1.  DB接続します
// include("funcs.php");
// $pdo = db_conn();
// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$store_name = $_GET['store_name']; // Get the store name from the search box
$sql = "SELECT * FROM store WHERE store_name LIKE '%$store_name%'"; // Use the LIKE operator for fuzzy search
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // If the store exists, redirect to event.php
  // Note: This will redirect to the first matching store
  $row = $result->fetch_assoc();
  $_SESSION['store_info'] = $row; // Save the store info in the session
  header("Location: event.php");
} else {  // If the store does not exist, display an error message
  echo "該当の店がありません";
}

$conn->close();
?>