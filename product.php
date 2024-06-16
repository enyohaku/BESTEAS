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
    $store_location = $_POST['store-location'];
    $product_name = $_POST['product-name'];
    $product_info = $_POST['product-info'];

    // 商品写真のアップロード処理
    $product_photo = $_FILES['product-photo'];
    $upload_dir = 'upload2s/';
    $uploaded_file = $upload_dir . basename($product_photo['name']);

    if (move_uploaded_file($product_photo['tmp_name'], $uploaded_file)) {
        $stmt = $conn->prepare("INSERT INTO store (store_name, store_location, product_name, product_info, product_photo) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssss", $store_name, $store_location, $product_name, $product_info, $uploaded_file);

        if ($stmt->execute()) {
            echo "情報が成功的に保存されました";
        } else {
            echo "エラー: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "ファイルのアップロードに失敗しました";
    }
}

$conn->close();
?>