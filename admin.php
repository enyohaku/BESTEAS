<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "besteas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $store_name = $_POST['store-name'];
    $admin_name = $_POST['admin-name'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $phone = $_POST['phone'];

    $stmt = $conn->prepare("INSERT INTO kanri (store_name, admin_name, email, password, phone) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $store_name, $admin_name, $email, $password, $phone);

    if ($stmt->execute()) {
        echo "新規登録が成功しました";
    } else {
        echo "エラー: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>