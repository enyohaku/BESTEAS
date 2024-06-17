<?php
session_start();

// Get the form data from the session
$form_data = $_SESSION['form_data'] ?? null;
?>

<!DOCTYPE html>
<html>
<head>
  <style>
    .folder {
      display: none;
      margin-left: 20px;
    }
  </style>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $(".folder-icon").click(function(){
        $(this).next(".folder").toggle();
      });
    });
  </script>
</head>
<body>

<?php
if ($form_data) {
  // Display the form data in a hidden div
  echo '<img src="folder_icon.png" class="folder-icon" alt="Folder Icon">';
  echo '<div class="folder">';
  echo "astringency: " . $form_data["astringency"]. "<br>";
  echo "sweetness: " . $form_data["sweetness"]. "<br>";
  echo "aroma: " . $form_data["aroma"]. "<br>";
  echo "bitterness: " . $form_data["bitterness"]. "<br>";
  echo "rarity: " . $form_data["rarity"]. "<br>";
  echo "favorite_rating: " . $form_data["favorite_rating"]. "<br>";
  echo "comments: " . $form_data["comments"]. "<br>";
  echo '</div>';

  // Provide options to save or modify the data
  echo '<a href="save.php">Save</a><br>';
  echo '<a href="tastingjournal.html">Modify</a>';
} else {
  echo "No data to confirm";
}

// Add a link to go back to the main page
echo '<a href="mainpage.html">店検索に戻る</a>';
?>

</body>
</html>