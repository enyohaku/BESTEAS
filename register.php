<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // パスワードをハッシュ化

    // データベース接続
    $servername = "localhost";
    $username = "root"; // デフォルトのXAMPPユーザー名
    $db_password = ""; // デフォルトのXAMPPパスワードは空
    $dbname = "besteas"; // データベース名

    $conn = new mysqli($servername, $username, $db_password, $dbname);

    // 接続確認
    if ($conn->connect_error) {
        die("接続失敗: " . $conn->connect_error);
    }

    // メールアドレスの重複チェック
    $stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
    if ($stmt === false) {
        die("クエリ準備失敗: " . $conn->error);
    }
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // メールアドレスが既に存在する場合
        echo "このメールアドレスは既に登録されています。";
    } else {
        // メールアドレスが存在しない場合、ユーザーを登録
        $stmt = $conn->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        if ($stmt === false) {
            die("クエリ準備失敗: " . $conn->error);
        }
        $stmt->bind_param("sss", $name, $email, $password);

        if ($stmt->execute()) {
            echo "登録成功";
        } else {
            echo "登録失敗: " . $stmt->error;
        }
    }

    $stmt->close();
    $conn->close();
}
?>
