<?php

session_start();

require_once dirname(__DIR__) . '/logic/dbconnection.php';

// 本日の合計記録
// 腕立て
$sql = "SELECT pushup_results.user_id, SUM(pushup_results.pushup_result) 
        FROM pushup_results 
        WHERE DATE_FORMAT(actived_at, '%Y-%m-%d') = CURRENT_DATE
        AND user_id = :user_id
        GROUP BY user_id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $_SESSION['id']);
$stmt->execute();
$day_sum_pushup = $stmt->fetch();

// 腹筋
$sql = "SELECT situp_results.user_id, SUM(situp_results.situp_result)
        FROM situp_results
        WHERE DATE_FORMAT(actived_at, '%Y-%m-%d') = CURRENT_DATE
        AND user_id = :user_id
        GROUP BY user_id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $_SESSION['id']);
$stmt->execute();
$day_sum_situp = $stmt->fetch();

// スクワット
$sql = "SELECT squat_results.user_id, SUM(squat_results.squat_result)
        FROM squat_results
        WHERE DATE_FORMAT(actived_at, '%Y-%m-%d') = CURRENT_DATE
        AND user_id = :user_id
        GROUP BY user_id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $_SESSION['id']);
$stmt->execute();
$day_sum_squat = $stmt->fetch();

?>