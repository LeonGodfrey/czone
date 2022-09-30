<?php
	include 'includes/session.php';

	if(isset($_POST['save'])){
				
        $id = $_POST['id'];	

    
			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE pOrder SET status=:status WHERE orderId=:id");
				$stmt->execute(['status'=>'delivered', 'id'=>$id]);

				$_SESSION['success'] = 'Product delivered successfully';
				header('location: delivered.php');
                exit();
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

			$pdo->close();
			
        }
	header('location: inroute.php');

?>