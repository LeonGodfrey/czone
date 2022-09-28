<?php
	include 'includes/session.php';
	
	//--------------
	
	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$name = $_POST['name'];			
		$price = $_POST['price'];
		$description = $_POST['description'];
		$quantity = $_POST['quantity'];		
		$filename = $_FILES['photo']['name'];
		

		$conn = $pdo->open();

			if(!empty($filename)){
				$ext = pathinfo($filename, PATHINFO_EXTENSION);
				$new_filename = $name.'dis'.$farmer.'.'.$ext;
				$new_filename = strtolower(str_replace(" ", "_", $new_filename));
				move_uploaded_file($_FILES['photo']['tmp_name'], '../images/'.$new_filename);	
			}
			else{
				
				$stmt = $conn->prepare("SELECT * FROM product where pId= :id");
                $stmt->execute(['id'=>$id]);
				$row = $stmt->fetch();
				$new_filename = $row['photo'];


			}
			try{
				$stmt = $conn->prepare("UPDATE product SET pName=:name, price=:price, quantity=:quantity, pDesc=:description, photo=:photo WHERE pId=:id");
				$stmt->execute(['name'=>$name, 'description'=>$description, 'quantity'=>$quantity, 'price'=>$price, 'photo'=>$new_filename, 'id'=>$id]);
				$_SESSION['success'] = 'Product updated successfully';
				header('location: products.php');

			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}
		$pdo->close();
	}
	else{
		$_SESSION['error'] = 'Fill up edit product form first';
	}

	header('location: products.php');

?>

