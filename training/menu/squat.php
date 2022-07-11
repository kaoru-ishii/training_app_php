<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>トレーニング</title>

    <link rel="stylesheet" href="../assets/grobal.css">
</head>

<body>
    <div class="pushup-container">
        <img class="image" src="../picture/pushup.PNG" />
        <div class="pushup-main">
            <h1 class="pushup-title">スクワット</h1>
            <h2 class="pushup-title">Are you ready?</h2>
            <div>
                <input class="timer-cnt" id="sec-input" type="button" value="30" disabled>秒
            </div>
            <div class="timer">
                <input class="cnt-form" id="start-btn" type="button" value="スタート" onclick="startCount()">
                <input class="cnt-form" id="stop-btn" type="button" value="ストップ" onclick="stopCount()">
                <input class="cnt-form" id="reset-btn" type="button" value="リセット" onclick="resetCount()">
            </div>
            <form action="../logic/write_squat.php" method="POST">
                <input required class="number-form" name="squat_result" type="number" placeholder="回数" maxlength="2">
                <input class="result-btn" type="submit" value="記録する">
            </form>
            <script>
                //タイマーを格納する変数（タイマーID）の宣言
                var timer1;
                const secInput = document.getElementById("sec-input");
                const startBtn = document.getElementById("start-btn");
                const stopBtn = document.getElementById("stop-btn");
                const resetBtn = document.getElementById("reset-btn");

                //カウントダウン関数を1000ミリ秒毎に呼び出す関数
                function startCount(){
                    startBtn.disabled = true;
                    timer1 = setInterval("countDown()", 1000);
                }

                ///タイマー停止関数
                function stopCount(){
                    startBtn.disabled = false;
                    clearInterval(timer1);
                }

                //リセットボタン
                function resetCount(){
                    secInput.value = 30;
                }

                // クリックされた際にスタートボタンの色の変更
                document.getElementById('start-btn').addEventListener('click',{
                    handleEvent: function (event) {
                        event.target.style.backgroundColor = "#0ae1f5";
                    }}, false);

                // クリックされた際にストップボタンの色の変更
                document.getElementById('stop-btn').addEventListener('click',{
                handleEvent: function (event) {
                    event.target.style.backgroundColor = "#eb1111";
                }}, false);

                //カウントダウン関数
                function countDown(){
                    var sec = secInput.value;

                    if(sec == "") {
                        alert("時刻を設定して下さい！");
                        reSet();
                    } else {
                        if (sec == "") sec = 0;
                        sec = parseInt(sec);

                        tmWrite(sec - 1);
                    }
                }

                //残り時間を書き出す関数
                function tmWrite(int) {
                    int = parseInt(int);

                    if (int <=0) {
                        reSet();
                        alert("時間です！");
                    } else {
                        secInput.value = int % 60;
                    }
                }

                //フォームを初期状態に戻す(リセット)関数
                function reSet() {
                    secInput.value = "0";
                    startBtn.disabled = false;
                    clearInterval(timer1);
                }
            </script>
            <p class="menu-transition">
                <a href="../view/menu.php">メニューに戻る</a>
            </p>
        </div>
    </div>
</body>

</html>