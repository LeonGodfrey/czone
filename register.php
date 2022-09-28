<?php
	include 'includes/session.php';
	if(isset($_POST['signup'])){
		$name = $_POST['name'];		
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$location = $_POST['location'];			
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		$description = $_POST['description'];
		$type = "farmer";
		//set sessions
		$_SESSION['name'] = $name;		
		$_SESSION['email'] = $email;
		$_SESSION['phone'] = $phone;
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
				header('location: signup.php');
			}
			else{
				
				$password = password_hash($password, PASSWORD_DEFAULT);
				try{
					$stmt = $conn->prepare("INSERT INTO user (email, password, name, location, phone, type, description) VALUES (:email, :password, :name, :location, :phone, :type, :description)");
					$stmt->execute(['email'=>$email, 'password'=>$password, 'name'=>$name, 'location'=>$location, 'phone'=>$phone, 'type'=>$type, 'description'=>$description ]);

					$userid = $conn->lastInsertId();

					
					header('location: login.php');
	
				}
				catch(PDOException $e){
					$_SESSION['error'] = $e->getMessage();
					header('location: signup.php');
				}		
			

				$pdo->close();

			}

		}

	}
	else{
		$_SESSION['error'] = 'Fill up signup form first';
		header('location: signup.php');
	}
