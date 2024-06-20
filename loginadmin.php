<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "besteas";
// 1.  DB接続します
// include("funcs.php");
// $pdo = db_conn();
$conn = new mysqli($servername, $username, $password, $dbname);

$message = "";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT password FROM kanri WHERE email = ?");
    $stmt->bind_param("s", $email);

    if ($stmt->execute()) {
        $stmt->bind_result($hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $message = "ログイン成功";
            // ログイン成功時の処理をここに書く
        } else {
            $message = "パスワードが違います";
        }
    } else {
        $message = "エラー: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理者ログイン</title>
    <style>
        /* ここにCSSを追加 */
    </style>
</head>
<body>
    <h1>管理者ログイン</h1>
    <?php if (!empty($message)) { echo "<p>$message</p>"; } ?>
    <form id="admin-login-form" action="loginadmin.php" method="POST">
        <label for="email">メールアドレス:</label>
        <input type="email" id="email" name="email" required>

        <label for="password">パスワード:</label>
        <input type="password" id="password" name="password" required>

        <input type="submit" value="ログイン">
    </form>
</body>
</html>