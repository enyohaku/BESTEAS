<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>保存結果</title>
</head>
<body style="padding: 1em; background-color: #fcf3d7; display: flex; flex-direction: column; align-items: center; justify-content: center;">
    <img src="img/スクリーンショット 2024-06-13 12.09.21.png" alt="Bear Logo" style="margin: auto; display: block; width: 30%;">

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
        echo "<p style='font-size: 2em;' >保存しました。ありがとうございます。</p>";
      } else {
        echo "<p style='font-size: 2em;'>Error: " . $sql . "<br>" . $conn->error . "</p>";
      }

      $conn->close();
    } else {
      echo "<p style='font-size: 2em;'>エラー: フォームからのデータがありません。</p>";
    }
    ?>

    <a href="mainpage.html" style="display: inline-block; text-align: center; padding: 0.5em 1em; background-color: #6c757d; color: white; border-radius: 0.25em; margin-top: 0.5em; width: 150px; font-size: 2em; text-decoration: none;">店舗検索に戻る</a><br>
    <a href="mydata.php" style="display: inline-block; text-align: center; padding: 0.5em 1em; background-color: #6c757d; color: white; border-radius: 0.25em; margin-top: 0.5em; width: 150px; font-size: 2em; text-decoration: none;">記録一覧</a>
</body>
</html>