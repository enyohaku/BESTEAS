<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>確認画面</title>
</head>
<body style="padding: 1em; background-color: #f0f0f0; display: flex; flex-direction: column; align-items: center; justify-content: center; background-color: #fcf3d7;">
 <img src="img/スクリーンショット 2024-06-13 12.09.21.png" alt="" style="margin: auto; display: block; width: 30%;">
    <?php
    session_start();

    // Get the form data from the session
    $form_data = $_SESSION['form_data'] ?? null;

    if ($form_data): ?>
        <p style="font-size: 2em;">渋み: <?= $form_data["astringency"] ?></p>
        <p style="font-size: 2em;">甘味: <?= $form_data["sweetness"] ?></p>
        <p style="font-size: 2em;">香り: <?= $form_data["aroma"] ?></p>
        <p style="font-size: 2em;">苦味: <?= $form_data["bitterness"] ?></p>
        <p style="font-size: 2em;">希少性: <?= $form_data["rarity"] ?></p>
        <p style="font-size: 2em;">お気に入り度: <?= $form_data["favorite_rating"] ?></p>
        <p style="font-size: 2em;">感想: <?= $form_data["comments"] ?></p>
    
        <a href="save.php" style="display: inline-block; text-align: center; padding: 0.5em 1em; background-color: #007bff; color: white; border-radius: 0.25em; margin-top: 0.5em; width: 150px; font-size: 2em; text-decoration: none;">保存</a>
    <a href="tastingjournal.html" style="display: inline-block; text-align: center; padding: 0.5em 1em; background-color: #28a745; color: white; border-radius: 0.25em; margin-top: 0.5em; width: 150px; font-size: 2em; text-decoration: none;">修正する</a>
<?php else: ?>
    <p style="font-size: 2em;">No data to confirm</p>
<?php endif; ?>

<a href="mainpage.html" style="display: inline-block; text-align: center; padding: 0.5em 1em; background-color: #6c757d; color: white; border-radius: 0.25em; margin-top: 0.5em; width: 150px; font-size: 2em; text-decoration: none;">店検索に戻る</a></html>