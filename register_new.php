<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $gender = $_POST['gender'];
    $history = $_POST['history'];

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

    // メールアドレスがすでに存在するか確認
    $stmt = $conn->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        // メールアドレスがすでに存在する場合はエラーメッセージを表示
        echo "このメールアドレスはすでに使用されています。";
        $stmt->close();
    } else {
        $stmt->close();

        // メールアドレスが存在しない場合は新規登録を行う
        $stmt = $conn->prepare("INSERT INTO users (name, email, password, gender, history) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $name, $email, $hashed_password, $gender, $history);

        if ($stmt->execute()) {
            echo "新規登録が成功しました";
            $_SESSION["name"] = $name;  // ユーザーの名前をセッションに保存
            header("Location: mainpage.html");  // mainpage.htmlにリダイレクト
            exit;
        } else {
            echo "エラー: " . $stmt->error;
        }

        $stmt->close();
    }

    $conn->close();
}
?>