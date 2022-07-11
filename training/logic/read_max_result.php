<?php

require_once dirname(__DIR__) . '/logic/dbconnection.php';

// 過去最高記録
// 腕立て
$sql = "SELECT user_id, MAX(pushup_result) FROM pushup_results WHERE user_id = :user_id GROUP BY user_id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $_SESSION['id']);
$stmt->execute();
$month_max_pushup = $stmt->fetch();

// 腹筋
$sql = "SELECT user_id, MAX(situp_result) FROM situp_results WHERE user_id = :user_id GROUP BY user_id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $_SESSION['id']);
$stmt->execute();
$month_max_situp = $stmt->fetch();

// スクワット
$sql = "SELECT user_id, MAX(squat_result) FROM squat_results WHERE user_id = :user_id GROUP BY user_id";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $_SESSION['id']);
$stmt->execute();
$month_max_squat = $stmt->fetch();

?>