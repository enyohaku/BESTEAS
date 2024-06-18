<?php
session_start(); // Start the session

// Get the store info from the session
$store_info = $_SESSION['store_info'] ?? null;
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Page</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #FFF9E3; /* 薄い黄色 */
            font-family: 'Comic Sans MS', cursive, sans-serif; /* 柔らかい感じのフォント */
        }
    </style>
</head>
<body class="flex flex-col items-center justify-center min-h-screen">
    <img src="img/スクリーンショット 2024-06-13 12.09.21.png" alt="クマのロゴ" class="w-full max-w-xs mx-auto mb-4">
    <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
        <?php
        if ($store_info) {
            // Display the shop info
            echo "<h2 class='text-2xl font-bold mb-4 text-center'>試飲茶情報</h2>";
            echo "<p>店舗名: " . $store_info["store_name"]. "</p>";
            echo "<p>所在地: " . $store_info["store_location"]. "</p>";
            echo "<p>試飲茶: " . $store_info["product_name"]. "</p>";
            echo "<p>試飲茶の情報: " . $store_info["product_info"]. "</p>";
            // echo "<p>p" . $store_info["product_photo"]. "</p>";
            // Add more columns as needed
        } else {
            echo "<p>No results</p>";
        }
        ?>

        <!-- Include your tasting journal form here -->
        <?php include 'tastingjournal.html'; ?>
    </div>
</body>
</html>