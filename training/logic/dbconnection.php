<?php

//  DB接続情報
$dsn = "mysql:host=localhost; dbname=training; chraset=utf8;";
$db_username = "root";
$db_password = "root";

// DBに接続する
try{
    // 例外が発生する恐れのあるコード
    $dbh = new PDO($dsn, $db_username, $db_password);
} catch (PDOException $err) {
    // 例外発生時の処理
    $msg = $err->getMessage();
    print('接続失敗：' . $msg);
    exit();
}

?>