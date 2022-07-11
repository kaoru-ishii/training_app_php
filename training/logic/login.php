<?php
session_start();

require_once dirname(__DIR__) . '/logic/dbconnection.php';

// フォームより
$email = $_POST['email'];
$password = $_POST['password'];

if(empty($email)) {
    echo 'メールアドレスを入力してください！';
    exit();
}

if(empty($password)) {
    echo 'パスワードを入力してください！';
    exit();
}

// メールアドレスを条件として、一致するレコードを取得する
$sql = "SELECT * FROM users WHERE email = :email";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->execute();
$user = $stmt->fetch();

// 入力されたパスワードとDBのハッシュ値がマッチしているかチェックする
if(password_verify($password, $user['password'])) {
    $_SESSION['id'] = $user['id'];
    $_SESSION['name'] = $user['name'];
    header('Location:../view/menu.php');
} else {
    echo 'メールアドレスもしくはパスワードが間違っています！';
}

?>