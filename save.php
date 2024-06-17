<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "besteas";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Get the form data from the session
$form_data = $_SESSION['form_data'] ?? null;

if ($form_data) {
  // Save the form data in the database
  $astringency = $form_data['astringency'];
  $sweetness = $form_data['sweetness'];
  $aroma = $form_data['aroma'];
  $bitterness = $form_data['bitterness'];
  $rarity = $form_data['rarity'];
  $favorite_rating = $form_data['favorite_rating'];
  $comments = $form_data['comments'];

  $sql = "INSERT INTO kiroku ( astringency, sweetness, aroma, bitterness, rarity, favorite_rating, comments)
  VALUES ( '$astringency', '$sweetness', '$aroma', '$bitterness', '$rarity', '$favorite_rating', '$comments')";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  $conn->close();
} else {
  echo "エラー: フォームからのデータがありません。";
}
?>