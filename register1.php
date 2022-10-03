<?php
	include 'includes/session.php';
	if(isset($_POST['signup'])){
		$name = $_POST['name'];		
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$location = $_POST['location'];			
		$password = $_POST['password'];
		$repassword = $_POST['repassword'];
		// $description = $_POST['description'];
		$type = "customer";
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
				//header('location: signup.php');
				echo'<script> window.location.href = "signup.php";</script>';
			}
			else{
				
				$password = password_hash($password, PASSWORD_DEFAULT);
				try{
					$stmt = $conn->prepare("INSERT INTO user (email, password, name, location, phone, type, description) VALUES (:email, :password, :name, :location, :phone, :type, :description)");
					$stmt->execute(['email'=>$email, 'password'=>$password, 'name'=>$name, 'location'=>$location, 'phone'=>$phone, 'type'=>$type, 'description'=>$description ]);

					$userid = $conn->lastInsertId();
					$_SESSION['success'] = 'Account created Log in!';

					 //send a message to the user
					 $message = "Welcome  $name , your account has been created successfully as a $type on Chicken Zone Marketing and Delivery Application . Thank you.";

					 //send message
					 $curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://sms.thinkxsoftware.com/smsdashboard/views/api/send_message.php?message='.urlencode($message).'&sender_id=kayondo&phone_number='.$phone.'&api_key=b86d0f23e195ac0daace2ebd88a6c5984e9d3e7edb7ec399ca6f45015b26f431',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
));

$response = curl_exec($curl);

curl_close($curl);
					
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
