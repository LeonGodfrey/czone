<?php
	include 'includes/session.php';

	if(isset($_POST['save'])){
		
		$name = $_POST['name'];		
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		$location = $_POST['location'];			
		$password = $_POST['password'];
		$oldPassword = $_POST['oldPassword'];
		$description = $_POST['description'];
		$photo = $_FILES['photo']['name'];
	
			if(!empty($photo)){ //upload user photo
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $farmer['photo'];
			}
			
			if($password == ""){
				$password = $farmer['password'];
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE user SET email=:email, password=:password, name=:name, photo=:photo, phone=:phone, location=:location, description=:description  WHERE userId=:id");
				$stmt->execute(['email'=>$email, 'password'=>$password, 'name'=>$name, 'photo'=>$filename, 'phone'=>$phone, 'location'=>$location, 'description'=>$description,'id'=>$farmer['userId']]);

				$_SESSION['success'] = 'Account updated successfully';
				header('location: home.php');
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

			$pdo->close();
			
		
	}
	else{
		$_SESSION['error'] = 'Fill up required details first';
	}

	header('location: profile.php');

?>