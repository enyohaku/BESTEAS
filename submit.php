<?php
// データベース接続
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "BESTEAS";

$conn = new mysqli($servername, $username, $password, $dbname);

// 接続確認
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $user_id = $_POST['user_id'];
    $tea_name = $_POST['tea_name'];
    $astringency = $_POST['astringency'];
    $sweetness = $_POST['sweetness'];
    $aroma = $_POST['aroma'];
    $bitterness = $_POST['bitterness'];
    $rarity = $_POST['rarity'];
    $favorite_rating = $_POST['favorite_rating'];
    $comments = $_POST['comments'];

    // プリペアードステートメントの準備とバインド
    $stmt = $conn->prepare("INSERT INTO tea_tasting_records (user_id, tea_name, astringency, sweetness, aroma, bitterness, rarity, favorite_rating, comments) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("isiiiiiis", $user_id, $tea_name, $astringency, $sweetness, $aroma, $bitterness, $rarity, $favorite_rating, $comments);

    // ステートメントの実行
    if ($stmt->execute()) {
        echo "試飲記録が成功しました";
    } else {
        echo "エラー: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
