<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Save the form data in the session
    $_SESSION['form_data'] = $_POST;

    // Redirect to the confirmation page
    header("Location: confirm.php");
    exit; // Ensure no further processing is done
} else {
    echo "エラー: フォームからのデータがありません。";
}
?>