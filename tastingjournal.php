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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // $id = $_POST['id'];
    // $user_id = $_POST['user_id'];
    $astringency = $_POST['astringency'];
    $sweetness = $_POST['sweetness'];
    $aroma = $_POST['aroma'];
    $bitterness = $_POST['bitterness'];
    $rarity = $_POST['rarity'];
    $favorite_rating = $_POST['favorite_rating'];
    $comments = $_POST['comments'];


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