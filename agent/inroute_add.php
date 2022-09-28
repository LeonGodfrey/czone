<?php
	include 'includes/session.php';

	if(isset($_POST['save'])){
				
        $id = $_POST['id'];	

    
			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE pOrder SET status=:status WHERE orderId=:id");
				$stmt->execute(['status'=>'inroute', 'id'=>$id]);

				$_SESSION['success'] = 'Order in route!';
				header('location: inroute.php');
                exit();
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

			$pdo->close();
			
        }
	header('location: placed.php');

?>