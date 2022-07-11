<?php

session_start();
// サーバ側に保存しているセッションファイルから、「name」を取り出す！
$username = $_SESSION['name'];

if(isset($_SESSION['id'])) { // サーバ側に保存しているセッションファイルに、「id」の値があればログイン状態をみなす！
    $msg = $username . 'さん';
} else { //サーバ側に保存しているセッションファイルに、「id」の値が無ければ非ログイン状態
    header('Location:./login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トレーニング</title>

    <link rel="stylesheet" href="../assets/grobal.css">
</head>

<body>
    <div class="container">
        <img class="image" src="../picture/stretch.jpg" >
        <div class="main">
            <h1 class="title">トレーニング日記</h1>
            <h2><?php echo $msg; ?></h2>
            <h4 class="title">大変よく頑張りました！！<br>継続して続けましょう！！</h4>
            <form action="../view/menu.php">
                <input class="input-form" type="submit" value="メニューに戻る" size=50 style="font-size:20px;">
            </form>
            <a href="./logout.php">ログアウト</a>
        </div>
    </div>
</body>

</html>