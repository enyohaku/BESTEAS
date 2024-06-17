<?php
session_start();

error_reporting(E_ALL);
ini_set('display_errors', 1);

$store_name = $_SESSION['store_name'];
$store_location = $_SESSION['store_location'];
$product_name = $_SESSION['product_name'];
$product_info = $_SESSION['product_info'];
$uploaded_file = $_SESSION['uploaded_file'];
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>店舗情報確認</title>
</head>
<body>
    <h1>店舗情報確認</h1>

    <p>店舗名: <?php echo $store_name; ?></p>
    <p>店舗所在地: <?php echo $store_location; ?></p>
    <p>商品名: <?php echo $product_name; ?></p>
    <p>商品の情報: <?php echo $product_info; ?></p>
    <p>商品写真:</p>
    <img src="<?php echo $uploaded_file; ?>" alt="商品写真">

    <form action="kanriedit.html" method="post">
        <input type="submit" value="修正">
    </form>
</body>
</html>