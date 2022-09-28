<?php
	include 'includes/session.php';
	
	if(isset($_POST['add'])){
		$name = $_POST['name'];	
		$farmer = $_POST['farmer'];
		$price = $_POST['price'];
		$description = $_POST['description'];
		$quantity = $_POST['quantity'];
		$filename = $_FILES['photo']['name'];
		$now = date('Y-m-d');

		$conn = $pdo->open();

		$stmt = $conn->prepare("SELECT *, COUNT(*) AS numrows FROM product WHERE pName=:name");
		$stmt->execute(['name'=>$name]);
		$row = $stmt->fetch();

		if($row['numrows'] > 0){
			$_SESSION['error'] = 'Product already exist';
		}
		else{
			if(!empty($filename)){
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$new_filename = $name.'dis'.$farmer.'.'.$ext;
				$new_filename = strtolower(str_replace(" ", "_", $new_filename));
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$new_filename);	
			}
			else{
				$new_filename = '';
			}

			try{
				$stmt = $conn->prepare("INSERT INTO product (userId, pName, pDesc, price, photo, quantity) VALUES (:farmer, :name, :description, :price, :photo, :quantity)");
				$stmt->execute(['farmer'=>$farmer, 'name'=>$name, 'description'=>$description, 'price'=>$price, 'photo'=>$new_filename, 'quantity'=>$quantity]);
				$_SESSION['success'] = 'Product added successfully';

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		}

		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up product form first';
	}

	header('location: products.php');

?>