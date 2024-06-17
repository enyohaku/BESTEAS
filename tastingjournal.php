<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $astringency = $_POST['astringency'];
    $sweetness = $_POST['sweetness'];
    $aroma = $_POST['aroma'];
    $bitterness = $_POST['bitterness'];
    $rarity = $_POST['rarity'];
    $favorite = $_POST['favorite'];

    // ここで試飲の評価をデータベースに保存する処理を追加

    echo "試飲の評価が送信されました。<br>";
    echo "渋み: " . $astringency . "<br>";
    echo "甘み: " . $sweetness . "<br>";
    echo "香り: " . $aroma . "<br>";
    echo "苦味: " . $bitterness . "<br>";
    echo "希少性: " . $rarity . "<br>";
    echo "お気に入り度: " . $favorite . "<br>";
} else {
    echo "エラー: フォームからのデータがありません。";
}
?>