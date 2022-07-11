<?php

session_start();

require_once dirname(__DIR__) . '/logic/dbconnection.php';

// 過去合計記録
// 腕立て
$sql = "SELECT user_id, SUM(pushup_result) FROM pushup_results WHERE user_id = :user_id GROUP BY user_id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $_SESSION['id']);
$stmt->execute();
$full_sum_pushup = $stmt->fetch();

// 腹筋
$sql = "SELECT user_id, SUM(situp_result) FROM situp_results WHERE user_id = :user_id GROUP BY user_id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $_SESSION['id']);
$stmt->execute();
$full_sum_situp = $stmt->fetch();

// スクワット
$sql = "SELECT user_id, SUM(squat_result) FROM squat_results WHERE user_id = :user_id GROUP BY user_id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $_SESSION['id']);
$stmt->execute();
$full_sum_squat = $stmt->fetch();

?>