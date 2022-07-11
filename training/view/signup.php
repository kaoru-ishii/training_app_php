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
            <form action="../logic/register.php" method="POST">
                <h1 class="title">トレーニング日記</h1>
                <h2 class="title">新規会員登録</h2>
                <input class="input-form" required type="name" name="name" placeholder="ユーザー名" maxlength="25">
                <input class="input-form" required type="email" name="email" placeholder="メールアドレス">
                <input class="input-form" required type="password" name="password" placeholder="パスワード" minlength="8">
                <input class="input-form" required type="password" name="password_Confirmation" placeholder="パスワード再確認" minlength="8">
                <input class="method-btn" type="submit" value="新規登録">
            </form>
            <p>既に登録済みの方は<a href="./login.php">こちら</a>からログインしてください</p>
        </div>
    </div>
</body>

</html>
