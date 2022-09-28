<?php
	include '../includes/conn.php';
	session_start();

	if(!isset($_SESSION['farmer']) || trim($_SESSION['farmer']) == ''){
		header('location: ../index.php');
		exit();
	}

	$conn = $pdo->open();

	$stmt = $conn->prepare("SELECT * FROM user WHERE userId=:id");
	$stmt->execute(['id'=>$_SESSION['farmer']]);
	$farmer = $stmt->fetch();

	$pdo->close();

?>