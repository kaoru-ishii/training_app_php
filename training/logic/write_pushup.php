<?php

session_start();

require_once dirname(__DIR__) . '/logic/dbconnection.php';

// フォームから渡されたデータを変数に代入
$pushupResult = $_POST['pushup_result'];

// 30秒での回数
$userId = $_SESSION['id'];

// 腕立て
$sql = "INSERT INTO pushup_results(user_id, pushup_result) VALUES (:user_id, :pushup_result)";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $userId);
$stmt->bindValue(':pushup_result' ,$pushupResult);
$stmt->execute();
$error = $stmt->errorInfo();

// エラーが発生している場合、配列のインデックスがNULLではないので、以下のように書く
if($error[2]) {
    echo $error[2];
}

// バリデーション
if(empty($pushupResult)) {
    echo '数を入力して下さい！';
} else {
    header('Location:../record/record.php');
    exit();
}

?>