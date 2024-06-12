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
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $gender = $_POST['gender'];
    $history = $_POST['history'];

    // プリペアードステートメントの準備とバインド
    $stmt = $conn->prepare("INSERT INTO users (name, email, password, gender, history) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $name, $email, $password, $gender, $history);

    // ステートメントの実行
    if ($stmt->execute()) {
        echo "新規登録が成功しました";
    } else {
        echo "エラー: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
