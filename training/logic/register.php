<?php

require dirname(__DIR__) . '/logic/dbconnection.php';

// フォームから渡されたデータを変数に代入
$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$password_Confirmation = $_POST['password_Confirmation'];

// バリデーション
if(empty($name)) {
    echo '名前を入力してください！';
    exit();
}

if(mb_strlen($name) > 20) {
    echo '名前は２０文字以内にしてください！';
    exit();
}

if(empty($email)) {
    echo 'メールアドレスを入力してください！';
    exit();
}

if(empty($password)) {
    echo 'パスワードを入力してください！';
    exit();
}

if(mb_strlen($password) < 8) {
    echo 'パスワードを８文字以上にしてください!！';
    exit();
}

if(empty($password_Confirmation)) {
    echo 'パスワード再確認を入力してください！';
    exit();
}

if($password !== $password_Confirmation) {
    echo 'パスワードが合っていません';
    exit();
}

// ハッシュ化（一方向関数）
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
$password_Confirmation = password_hash($_POST['password_Confirmation'], PASSWORD_DEFAULT);

// アドレス重複防止機能
$sql = "SELECT * FROM users WHERE email = :email";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->execute();
$user = $stmt->fetch();

if($user['email'] === $email) {
    echo 'そのメールアドレスは登録済みです！';
    exit();
}

// ユーザー新規登録機能
$sql = "INSERT INTO users(name, email, password, password_Confirmation) VALUES (:name, :email, :password ,:password_Confirmation)";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':name', $name);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':password', $password);
$stmt->bindValue('password_Confirmation', $password_Confirmation);
$stmt->execute();
$error = $stmt->errorInfo();

// エラーが発生している場合、配列のインデックスがNULLではないので、以下のように書く
if($error[2]) {
    echo $error[2];
} else {
    // ログインページに遷移
    header('Location:../view/login.php');
}

?>