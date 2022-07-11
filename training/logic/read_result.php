<?php

session_start();

require_once dirname(__DIR__) . '/logic/dbconnection.php';

// 直近の記録

// 腕立て
$sql = "SELECT * FROM pushup_results WHERE pushup_results.user_id = :user_id ORDER BY actived_at DESC LIMIT 1";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $_SESSION['id']);
$stmt->execute();
$pushupResults = $stmt->fetch();

// 腹筋
$sql = "SELECT * FROM situp_results WHERE situp_results.user_id = :user_id ORDER BY actived_at DESC LIMIT 1";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $_SESSION['id']);
$stmt->execute();
$situpResults = $stmt->fetch();

// スクワット
$sql = "SELECT * FROM squat_results WHERE squat_results.user_id = :user_id ORDER BY actived_at DESC LIMIT 1";
$stmt = $dbh->prepare($sql);
$stmt->bindValue(':user_id', $_SESSION['id']);
$stmt->execute();
$squatResults = $stmt->fetch();

?>

