<?php
	include 'includes/session.php';

	if(isset($_POST['save'])){
		
		$name = $_POST['name'];		
		$email = $_POST['email'];
		$phone = $_POST['phone'];
				
		$password = $_POST['password'];
		$oldPassword = $_POST['oldPassword'];
		
		$photo = $_FILES['photo']['name'];
	
			if(!empty($photo)){ //upload user photo
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$photo);
				$filename = $photo;	
			}
			else{
				$filename = $admin['photo'];
			}
			
			if($password == ""){
				$password = $admin['password'];
			}
			else{
				$password = password_hash($password, PASSWORD_DEFAULT);
			}

			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE user SET email=:email, password=:password, name=:name, photo=:photo, phone=:phone WHERE userId=:id");
				$stmt->execute(['email'=>$email, 'password'=>$password, 'name'=>$name, 'photo'=>$filename, 'phone'=>$phone, 'id'=>$admin['userId']]);

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