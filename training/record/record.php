<?php

session_start();

require_once dirname(__DIR__) . '/logic/read_result.php';
require_once dirname(__DIR__) . '/logic/read_sum_result.php';
require_once dirname(__DIR__) . '/logic/read_max_result.php';
require_once dirname(__DIR__) . '/logic/read_day_sum_result.php';

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
    <div class="record">
        <img class="image" src="../picture/record.PNG" alt="">
        <div class="record-Main">
            <h1 class="title">記録表</h1>
            <h2><?php echo date('m') ?>月</h2>
                <table class="table-border">
                    <tr>
                        <th>  </th>
                        <th>腕立て</th>
                        <th>腹筋</th>
                        <th>スクワット</th>
                    </tr>

                    <!-- 直近の記録 -->
                   
                        <tr>
                            <td class="event">直近の記録</td>
                            <td><?php echo $pushupResults['pushup_result']; ?>回</td>
                            <td><?php echo $situpResults['situp_result']; ?>回</td>
                            <td><?php echo $squatResults['squat_result']; ?>回</td>
                        </tr>
                    
                    <!-- 本日の合計記録 -->
                        <tr>
                            <td class="event">
                            <?php 
                                $day = new DateTime();
                                echo $day->format('d'.'日');
                            ?>の記録</td>
                            <?php {?>
                                <td><?php echo $day_sum_pushup["SUM(pushup_results.pushup_result)"]; ?>回</td>
                                <td><?php echo $day_sum_situp["SUM(situp_results.situp_result)"]; ?>回</td>
                                <td><?php echo $day_sum_squat["SUM(squat_results.squat_result)"]; ?>回</td>
                            <?php };?>
                        </tr>
                    <!-- 過去最高記録 -->
                        <tr>
                            <td class="event">過去最高記録</td>
                            <td><?php echo $month_max_pushup["MAX(pushup_result)"]; ?>回</td>
                            <td><?php echo $month_max_situp["MAX(situp_result)"] ; ?>回</td>
                            <td><?php echo $month_max_squat["MAX(squat_result)"] ; ?>回</td>
                        </tr>
                    <!-- 過去合計記録 -->
                        <tr>
                            <td class="event">過去合計記録</td>
                            <td><?php echo $full_sum_pushup["SUM(pushup_result)"]; ?>回</td>
                            <td><?php echo $full_sum_situp["SUM(situp_result)"]; ?>回</td>
                            <td><?php echo $full_sum_squat["SUM(squat_result)"]; ?>回</td>
                        </tr>
                </table>
            <p><a href="../view/result.php">次に進む</a></p>
            <p><a href="../view/menu.php">メニューに戻る</a></p>
        </div>
    </div>
</body>

</html>

