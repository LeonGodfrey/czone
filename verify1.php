<?php
	include 'includes/session.php';
	$conn = $pdo->open();

	if(isset($_POST['login'])){
		
		$email = $_POST['email'];
		$password = $_POST['password'];

		try{

			$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows from user where email = :email;");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();			
			
			if($row['numrows'] > 0 ){
								
				
					if(password_verify($password, $row['password'])){
						if($row['type'] == 'farmer')
							$_SESSION['farmer'] = $row['userId'];

						if($row['type'] == 'customer')
							$_SESSION['user'] = $row['userId'];

						if($row['type'] == 'agent')
							$_SESSION['agent'] = $row['userId'];

						if($row['type'] == 'admin')
							$_SESSION['admin'] = $row['userId'];

						echo '<script>window.location.href = "index.php";</script>';
													
					}
					else{
						$_SESSION['error'] = 'Incorrect Password';
					}
				
			}
			else{
				$_SESSION['error'] = 'Email not found';
			}
		}
		catch(PDOException $e){
			echo "There is some problem in connection: " . $e->getMessage();
		}

	}
	else{
		$_SESSION['error'] = 'Input login credentails first';
	}

	$pdo->close();

	echo '<script>window.location.href = "login.php";</script>';

?>