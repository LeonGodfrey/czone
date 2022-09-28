<?php
	include '../includes/conn.php';
	session_start();

	if(!isset($_SESSION['user']) || trim($_SESSION['user']) == ''){
		header('location: ../index.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM user WHERE userId=:id");
	$stmt->execute(['id'=>$_SESSION['user']]);
	$user = $stmt->fetch();

	$pdo->close();

?>