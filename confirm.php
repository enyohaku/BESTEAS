<?php
session_start();

// Get the form data from the session
$form_data = $_SESSION['form_data'] ?? null;

if ($form_data) {
  // Display the form data
  echo "渋み: " . $form_data["astringency"]. "<br>";
  echo "甘味: " . $form_data["sweetness"]. "<br>";
  echo "香り: " . $form_data["aroma"]. "<br>";
  echo "苦味: " . $form_data["bitterness"]. "<br>";
  echo "希少性: " . $form_data["rarity"]. "<br>";
  echo "お気に入り度: " . $form_data["favorite_rating"]. "<br>";
  echo ": " . $form_data["comments"]. "<br>";

  // Provide options to save or modify the data
  echo '<a href="save.php">保存</a><br>';
  echo '<a href="tastingjournal.html">修正する</a><br>';
} else {
  echo "No data to confirm";
}

// Add a link to go back to the main page
echo '<a href="mainpage.html">店検索に戻る</a>';
?>