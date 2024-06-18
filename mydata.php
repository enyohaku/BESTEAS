<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>データ確認</title>
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
<body style="padding: 1em; background-color: #fcf3d7; display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <img src="img/スクリーンショット 2024-06-13 12.09.21.png" alt="Bear Logo" style="margin: auto; display: block; width: 30%;">

    <?php
    session_start();

    // Get the form data from the session
    $form_data = $_SESSION['form_data'] ?? null;

    if ($form_data) {
        // Display the form data in a hidden div
        echo '<img src="img/mark-folder-001.png" class="folder-icon" alt="Folder Icon" style="cursor: pointer; width: 5%">';
        echo '<div class="folder" style="font-size: 2em;">';
        echo "お気に入り度: " . $form_data["favorite_rating"]. "<br>";
        echo "渋み: " . $form_data["astringency"]. "<br>";
        echo "甘味: " . $form_data["sweetness"]. "<br>";
        echo "香り: " . $form_data["aroma"]. "<br>";
        echo "苦味: " . $form_data["bitterness"]. "<br>";
        echo "希少性: " . $form_data["rarity"]. "<br>";
        echo "感想: " . $form_data["comments"]. "<br>";
        echo '</div>';
    } else {
        echo "<p style='font-size: 2em;'>No data to confirm</p>";
    }
    ?>

    <a href="mainpage.html" style="display: inline-block; text-align: center; padding: 0.5em 1em; background-color: #6c757d; color: white; border-radius: 0.25em; margin-top: 0.5em; width: 150px; font-size: 2em; text-decoration: none;">店検索に戻る</a>
</body>
</html>