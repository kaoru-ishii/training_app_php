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
    <img class="image" src="../picture/top.PNG" >
        <div class="main">
            <h1 class="title">トレーニング日記</h1>
            <h2 class="title">ログイン</h2>
            <form action="../logic/login.php" method="POST">
                <input class="input-form" required type="email" name="email" placeholder="メールアドレス">
                <input class="input-form" required type="password" name="password" placeholder="パスワード" minlength="8">
                <input class="method-btn" type="submit" value="ログイン">
            </form>
            <p>登録がまだの方は<a href="./signup.php">こちら</a>から新規登録してください</p>
        </div>
    </div>
</body>

</html>