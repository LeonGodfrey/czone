<?php
	include 'includes/session.php';

	if(isset($_POST['save'])){
		
		$agent = $_POST['agent'];
        $id = $_POST['id'];	

    
			$conn = $pdo->open();

			try{
				$stmt = $conn->prepare("UPDATE pOrder SET userIdD=:agent WHERE orderId=:id");
				$stmt->execute(['agent'=>$agent, 'id'=>$id]);

				$_SESSION['success'] = 'Asigned agent successfully';
				header('location: Placed.php');
			}
			catch(PDOException $e){
				$_SESSION['error'] = $e->getMessage();
			}

			$pdo->close();
			
        }
	header('location: placed.php');

?>