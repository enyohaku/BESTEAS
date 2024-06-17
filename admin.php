<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

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

    // Check if the email already exists
    $check_email = $conn->prepare("SELECT * FROM kanri WHERE email = ?");
    $check_email->bind_param("s", $email);
    $check_email->execute();
    $check_email_result = $check_email->get_result();

    if ($check_email_result->num_rows > 0) {
        // The email already exists
        echo "エラー: そのメールアドレスは既に使用されています。";
    } else {
        // The email does not exist, proceed with the registration
        $stmt = $conn->prepare("INSERT INTO kanri (store_name, admin_name, email, password, phone) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $store_name, $admin_name, $email, $password, $phone);

        if ($stmt->execute()) {
            // If the registration was successful, redirect to adminscreen.html
            header("Location: adminscreen.html");
            exit; // Ensure no further processing is done
        } else {
            echo "エラー: " . $stmt->error;
        }
        $stmt->close();
    }
}

$conn->close();
?>