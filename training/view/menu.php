<?php

session_start();
// サーバ側に保存しているセッションファイルから、「name」を取り出す！

if(isset($_SESSION['id'])) { // サーバ側に保存しているセッションファイルに、「id」の値があればログイン状態をみなす！
    $msg = 'こんにちは！' . $_SESSION['name'] . 'さん';
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
    <title>トレーニングメニュー</title>

    <link rel="stylesheet" href="../assets/grobal.css">
</head>

<body>
    <div class="container">
        <img class="image" src="../picture/menu.jpg" />
        <div class="main">
            <h1 class="title">トレーニング日記</h1>
                <?php echo htmlspecialchars($msg, ENT_QUOTES, 'UTF-8'); ?>
            <h2 class="title">メニュー</h2>
            <form action="../menu/pushup.php">
                <input class="input-form" type="submit" value="腕立て" size=50 style="font-size:20px;">
            </form>
            <form action="../menu/situp.php">
                <input class="input-form" type="submit" value="腹筋" size=50 style="font-size:20px;">
            </form> 
            <form action="../menu/squat.php">
                <input class="input-form" type="submit" value="スクワット" size=50 style="font-size:20px;">
            </form>
            <form action="../record/record.php">
                <input class="input-form" type="submit" value="総合記録" size=50 style="font-size:20px;">
            </form>
            <a href="./logout.php">ログアウト</a>
        </div>
    </div>
</body>

</html>