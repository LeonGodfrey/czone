<?php
	include 'includes/session.php';
	if(isset($_POST['signup'])){
		$name = $_POST['name'];		
		$email = $_POST['email'];
		$phone = $_POST['phone'];
        $nin = $_POST['nin'];
        $tpMeans = $_POST['tpMeans'];
		$location = $_POST['location'];			
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$description = $_POST['description'];
		$type = "agent";
		//set sessions
		$_SESSION['name'] = $name;		
		$_SESSION['email'] = $email;
		$_SESSION['phone'] = $phone;
        $_SESSION['nin'] = $nin;
        $_SESSION['tpMeans'] = $tpMeans;
		$_SESSION['location'] = $location;
		$_SESSION['description'] = $description;	

		if($password != $repassword){
			$_SESSION['error'] = 'Passwords did not match';
			header('location: signup.php');
		}
		else{
			//check if email already exists
			
			$conn = $pdo->open();

			$stmt = $conn->prepare("SELECT COUNT(*) AS numrows FROM user WHERE email = :email");
			$stmt->execute(['email'=>$email]);
			$row = $stmt->fetch();
							

			if($row['numrows'] > 0){
				$_SESSION['error'] = 'Email already taken';
				//header('location: signup.php');
				echo'<script> window.location.href = "signup.php";</script>';
			}
			else{
				
				$password = password_hash($password, PASSWORD_DEFAULT);
				try{
					$stmt = $conn->prepare("INSERT INTO user (email, password, name, location, phone, type, description, nin, tpMeans) VALUES (:email, :password, :name, :location, :phone, :type, :description, :nin, :tpMeans)");
					$stmt->execute(['email'=>$email, 'password'=>$password, 'name'=>$name, 'location'=>$location, 'phone'=>$phone, 'type'=>$type, 'description'=>$description, 'nin'=>$nin, 'tpMeans'=>$tpMeans ]);

					$userid = $conn->lastInsertId();
					$_SESSION['success'] = 'Account created Log in!';
					
					//header('location: login.php');
					echo'<script> window.location.href = "login.php";</script>';
	
				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					//header('location: signup.php');
					echo'<script> window.location.href = "signup.php";</script>';
				}		
			

				$pdo->close();

			}

		}

	}
	else{
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: signup.php');
	}
