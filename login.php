<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

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

    // SQLクエリの準備と実行
    $stmt = $conn->prepare("SELECT password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION['email'] = $email;
            echo "ログイン成功";
        } else {
            echo "パスワードが違います";
        }
    } else {
        echo "ユーザーが見つかりません";
    }

    $stmt->close();
    $conn->close();
}
?>
