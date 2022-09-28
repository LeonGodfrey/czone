<?php
	include 'includes/conn.php';
	session_start();

	if(isset($_SESSION['admin'])){		
		echo '<script>window.location.href = "admin/home.php";</script>';
	}
	if(isset($_SESSION['farmer'])){
		echo '<script>window.location.href = "farmer/home.php";</script>';
	}

	if(isset($_SESSION['agent'])){
		echo '<script>window.location.href = "agent/home.php";</script>';
	}

	if(isset($_SESSION['user'])){
		$conn = $pdo->open();

		try{
			$stmt = $conn->prepare("SELECT * FROM user WHERE userId=:id");
			$stmt->execute(['id'=>$_SESSION['user']]);
			$user = $stmt->fetch();			
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

		$pdo->close();
	}
?>