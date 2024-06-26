<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "besteas";
// 1.  DB接続します
// include("funcs.php");
// $pdo = db_conn();
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $store_name = $_POST['store_name'];
    $store_location = $_POST['store_location'];
    $product_name = $_POST['product_name'];
    $product_info = $_POST['product_info'];

    // 商品写真のアップロード処理
    if (isset($_FILES["product_photo"]) && $_FILES["product_photo"]["error"] == 0 ) {
        $file_name = $_FILES["product_photo"]["name"];
        $tmp_path  = $_FILES["product_photo"]["tmp_name"];

        // ユニークファイル名作成
        $extension = pathinfo($file_name, PATHINFO_EXTENSION);
        $file_name = date("YmdHis").md5(session_id()) . "." . $extension;

        $upload_dir = 'upload2s/';
        $uploaded_file = $upload_dir . $file_name;

        if (is_uploaded_file($tmp_path)) {
            if (move_uploaded_file($tmp_path, $uploaded_file)) {
                chmod($uploaded_file, 0644);
                $stmt = $conn->prepare("INSERT INTO store (store_name, store_location, product_name, product_info, product_photo) VALUES (?, ?, ?, ?, ?)");
                $stmt->bind_param("sssss", $store_name, $store_location, $product_name, $product_info, $uploaded_file);

                if ($stmt->execute()) {
                    echo "情報が成功的に保存されました<br>";
                    echo "店舗名: " . $store_name . "<br>";
                    echo "店舗所在地: " . $store_location . "<br>";
                    echo "商品名: " . $product_name . "<br>";
                    echo "商品の情報: " . $product_info . "<br>";
                    echo "商品写真: <br>";
                    echo "<img src='" . $uploaded_file . "' alt='商品写真'><br>";
 // 保存ボタンと修正ボタンを表示
 echo "<form action='adminscreen.html' method='post'>";
 echo "<input type='submit' value='保存'>";
 echo "</form>";

 echo "<form action='kanriedit.php' method='post'>";
 echo "<input type='submit' value='修正'>";
 echo "</form>";
} else {
 echo "エラー: " . $stmt->error;
}

$stmt->close();
} else {
echo "Error:アップロードできませんでした。";
}
}
} else {
echo "Error:画像が送信されていません";
}
} else {
echo "エラー: " . $stmt->error;
}
$conn->close();
 
 
?>