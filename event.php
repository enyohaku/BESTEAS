<?php
session_start(); // Start the session

// Get the store info from the session
$store_info = $_SESSION['store_info'] ?? null;

if ($store_info) {
  // Display the shop info
  echo "store_name: " . $store_info["store_name"]. "<br>";
  echo "store_location: " . $store_info["store_location"]. "<br>";
  echo "product_name: " . $store_info["product_name"]. "<br>";
  echo "product_info: " . $store_info["product_info"]. "<br>";
  echo "product_photo: " . $store_info["product_photo"]. "<br>";
  // Add more columns as needed
} else {
  echo "No results";
}

// Include your tasting journal form here
include 'tastingjournal.html';
?>