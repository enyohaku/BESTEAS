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

    // ユーザーの情報をデータベースから取得
    $stmt = $conn->prepare("SELECT name, password FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->bind_result($name, $hashed_password);

    if ($stmt->fetch()) {
        if (password_verify($password, $hashed_password)) {
            echo "ログイン成功";
            $_SESSION["name"] = $name;  // ユーザーの名前をセッションに保存
            header("Location: mainpage.html");  // tastingjournal.htmlにリダイレクト
            exit;
        } else {
            header("Location: login.html?error=パスワードが違います");
            exit;
        }
    } else {
        header("Location: login.html?error=メールアドレスが違います");
        exit;
    }

    $stmt->close();
    $conn->close();
}
?>